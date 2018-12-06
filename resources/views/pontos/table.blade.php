<table class="table table-responsive" id="pontos-table">
    <thead>
    <th></th>
    <th>Últ.Vist</th>
    <th>Tipo</th>
        <th>Logradouro</th>
    <th>Número</th>
    <th>Bairro</th>
        <th>Complemento</th>
    <th>Carcterística abrigo</th>
    <th>Resultado</th>
    <th>NC</th>
        <th colspan="3">Ação</th>
    </thead>
    <tbody>
    @foreach($pontos as $ponto)
        <tr>
            <td><a href="{!! route('pontos.show', [$ponto->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i>  Vistorias [{{$ponto->contador}}]</a></td>
            <td>{!!  \Carbon\Carbon::parse($ponto->data_a)->format('d-m-Y') !!}</td>
            <td>{!! $ponto->tipo !!}</td>
            <td>{!! $ponto->logradouro !!}</td>
            <td>{!! $ponto->numero!!}</td>
            <td>{!! $ponto->bairro !!}</td>
            <td>{!! $ponto->complemento !!}</td>
            <td>{!! $ponto->caracteristica_abrigo !!}</td>
            <td>{!! $ponto->resultado !!}</td>
            <td>{!! $ponto->complexidade !!}</td>
            <td>
                {!! Form::open(['route' => ['pontos.destroy', $ponto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pontos.edit', [$ponto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
