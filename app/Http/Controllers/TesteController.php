<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnderecoBase;

class TesteController extends Controller
{
    private $ender;
    public function __construct(EnderecoBase $enderecoBase)
    {
        $this->ender = $enderecoBase;
    }
    public function index(){
        $enderecos = new EnderecoBase;
        $enderecos = $enderecos->newQuery();
        $enderecos->where('NOME_LOGRA','LIKE',"%JULIO MOURAO");
        dd($enderecos->get());
    }
}
