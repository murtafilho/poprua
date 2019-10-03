@if($pontos)
<ul class="list-group">
@foreach ($pontos as $p )
    <a href="{{route('vistorias.create.detail',[$p->id])}}" class="list-group-item">
        <span class="badge">{{$p->contador}}</span>
        {!! 
        $p->logradouro.' '.$p->numero.' '.$p->regional.' '.$p->tipo.'<br>'.
        $p->caracteristica_abrigo.' - '.$p->complemento 
        !!}
    </a>    
@endforeach
</ul>
{!! $pontos->appends(Request::except('page'))->links() !!}
@endif