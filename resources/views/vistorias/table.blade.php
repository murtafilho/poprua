<table class="table table-responsive" id="vistorias-table">
    <thead>

    <th colspan="">Operações</th>
    <th>#ID</th>
    <th>Data abordagem</th>
    <th>Ponto</th>
    <th>Resultado ação</th>
    <th>Nomes Pessoas</th>
    <th>Num.Pessoas</th>
    <th>Tipo abordagem</th>
    <th>Tipo abrigo desmontado</th>
    <th>Classificação
    <th>

    </thead>
    <tbody>
    @foreach($vistorias as $vistoria)
        <tr>
            <td>
                {!! Form::open(['route' => ['vistorias.destroy', $vistoria->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vistorias.show', [$vistoria->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('vistorias.edit', [$vistoria->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
            <td>{!! $vistoria->id !!}</td>
            <td>{!!  \Carbon\Carbon::parse($vistoria->data_abordagem)->format('d-m-Y') !!}</td>
            <td>{!! $vistoria->logradouro.' '.$vistoria->numero.' ('.$vistoria->tipo.') ' !!}</td>
            <td>{!! $vistoria->resultado_acao !!}</td>
            <td>{!! $vistoria->nomes_pessoas !!}</td>
            <td>{!! $vistoria->quantidade_pessoas !!}</td>
            <td>{!! $vistoria->tipo_abordagem !!}</td>
            <td>{!! $vistoria->tipo_abrigo_desmontado !!}</td>
            <td>{!! $vistoria->complexidade !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
