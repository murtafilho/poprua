<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEnderecamentoRequest;
use App\Http\Requests\UpdateEnderecamentoRequest;
use App\Models\Geo;
use App\Models\Ponto;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Http\Services\UTMtoLL;
use Illuminate\Support\Facades\DB;

class GeoController extends AppBaseController
{

    private $geo;
    private $ponto;
    private $converter;

    public function __construct(Geo $geo,Ponto $ponto, UTMtoLL $converter)
    {
        $this->geo = $geo;
        $this->ponto = $ponto;
        $this->converter = $converter;
    }


    public function index(Request $request)
    {
        $ponto_id = $request->ponto_id;
        $enderecamentos = $this->geo->buscar($request);
        $ponto = DB::table('qry_pontos_v2')->where('id','=',$ponto_id)->first();
        return view('geo.index',compact('enderecamentos','ponto_id','ponto'));
    }

    public function converter(Request $request){
        $leste = $request->leste;
        $norte = $request->norte;
        $ll = $this->converter->convert($leste,$norte);
        return $ll[0].','.$ll[1];
    }

 
}

