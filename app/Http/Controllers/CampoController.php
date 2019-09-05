<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampoController extends Controller
{
    public function index(Request $request){
        if($request->has('logradouro')){
            $pontos = DB::table('qry_pontos_v2')
            ->where('logradouro','like','%'.$request->logradouro.'%')
            ->paginate(10);
        }else{
            $pontos = null;
        }
        
        return view('campo.index',compact('pontos'));
    }
}
