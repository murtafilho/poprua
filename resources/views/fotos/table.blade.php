<table class="table table-responsive" id="fotos-table">
    <thead>
        <tr>
            <th>Description</th>
        <th>Url</th>
        <th>Vistoria Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($fotos as $foto)
        <tr>
            <td>{!! $foto->description !!}</td>
            <td>{!! $foto->url !!}</td>
            <td>{!! $foto->vistoria_id !!}</td>
            <td>
                {!! Form::open(['route' => ['fotos.destroy', $foto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('fotos.show', [$foto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('fotos.edit', [$foto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>