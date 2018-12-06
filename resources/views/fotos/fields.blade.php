<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::file('url', null, ['class' => 'form-control','id'=>'url']) !!}
</div>

<!-- Vistoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vistoria_id', 'Vistoria Id:') !!}
    {!! Form::number('vistoria_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('fotos.index') !!}" class="btn btn-default">Cancel</a>
</div>
