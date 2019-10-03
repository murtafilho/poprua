<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEnderecamentoRequest;
use App\Http\Requests\UpdateEnderecamentoRequest;
use App\Models\Geo;
use App\Models\Ponto;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use App\Models\EnderecoBase;
use Response;
use App\Http\Services\UTMtoLL;
use Illuminate\Support\Facades\DB;
use Route;


class GeoController extends AppBaseController
{

    private $ponto;
    private $converter;
    private $enderecoBase;

    public function __construct(Geo $geo,Ponto $ponto, UTMtoLL $converter, EnderecoBase $enderecoBase)
    {
        $this->ponto = $ponto;
        $this->converter = $converter;
        $this->enderecoBase = $enderecoBase;
    }


    public function index(Request $request)
    {
        $ponto_id = $request->ponto_id;
        $logradouro = $request->logradouro;
        $numero = $request->numero;
        $enderecamento = $this->buscar($logradouro,$numero);
        $ponto = DB::table('qry_pontos_v2')->where('id','=',$ponto_id)->first();

        return view('geo.index',compact('enderecamento','ponto_id','ponto','logradouro','numero'));
    }

    public function setSearch(Request $request){

        $ponto_id = $request->ponto_id;
        $ponto = DB::table('qry_pontos_v2')->where('id','=',$ponto_id)->first();
        $logradouro = $ponto->logradouro;
        $numero = $ponto->numero;
        $enderecamento = $this->buscar($logradouro,$numero);
        return view('geo.index',compact('enderecamento','ponto_id','ponto','logradouro','numero'));
    }

    public function converter(Request $request){
        $leste = $request->leste;
        $norte = $request->norte;
        $ll = $this->converter->convert($leste,$norte);
        return $ll[0].','.$ll[1];
    }

    public function buscar($logradouro,$numero){
        $tipo_busca = '0';
        
        $data = $this->enderecoBase->newQuery();
    
        if($logradouro){
			if($tipo_busca == '0'){
				$data->where('NOME_LOGRA','LIKE','%'.$logradouro.'%');
			}else{
				$data ->where('NOME_LOGRA','LIKE', $logradouro.'%');
			}	
		}

		if($numero){
			$data = $data ->where('NUMERO_IMO','=',$numero);
        }
        
        $data =  $data->orderBy('NUMERO_IMO','ASC')->paginate(5);
        
       
        return $data;
    }

    public function georreferenciar(Request $request){
        $lat = $request->lat;
        $lng = $request->lng;
        $id = $request->id;
        $update = DB::table('pontos')->where('id',$id)->update(['lat' => $lat,'lng' => $lng]);
        if ($update){
            return "200";
        }else{
            return "410";
        }
    }

    public function markers(){
        $markers = DB::table('pontos')->where('lat','<>','')->get();
        return $markers->toJson();
    }

 
}

