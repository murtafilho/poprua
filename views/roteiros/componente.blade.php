@extends('layouts.app')


@section('content')
@foreach($item as $i)
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">{{$i->Des_Item}}</h3>
    </div>
    <div class="panel-body">
      INSERIR TABELA DE COMPONENTE
    </div>
  </div>
  @endforeach



<table class="table table-responsive table-bordered" id="roteiros-table">
  <thead>
      <th>ID ITEM</th>
      <th>GRUPO</th> 
      <th>TEMA</th>
      <th>SUBGRUPO</th>
  </thead>
  <tbody>
  @foreach($roteiros as $roteiro)
      <tr>
      <td>{{$roteiro->Idn_Item}}</td>
      <td>{{$roteiro->Des_Grp}}</td>
      <td>{{$roteiro->Des_Tema}}</td>
      <td>{{$roteiro->Des_Subg_Item}}</td> 
      </tr>
  @endforeach
  </tbody>
</table>
@endsection

