<?php

namespace App\Models;

use Eloquent as Model;


class Geo extends Model
{

    public $table = 'endereco_base';
    
    public function buscar($request){
		
		$logradouro = $request->logradouro;
		$numero = $request->numero;
		$tipo_busca = $request->tipo_busca;
		$enderecamentos = $this->select('*');
	
		if($logradouro){
			if($tipo_busca == '0'){
				$enderecamentos = $this->where('NOME_LOGRA','LIKE','%'.$logradouro.'%');
			}else{
				$enderecamentos = $this ->where('NOME_LOGRA','LIKE', $logradouro.'%');
			}	
		}

		if($numero){
			$enderecamentos = $this ->where('NUMERO_IMO','=',$request->numero);
		}
	
		return  $enderecamentos->orderBy('NUMERO_IMO','ASC')->paginate(5);
	}

    
}
