<!-- Data Abordagem Field -->
<div class="form-group col-sm-3">
    {!! Form::label('data_abordagem', 'Data:') !!}
    {!! Form::text('data_abordagem', null, ['class' => 'form-control datepicker']) !!}
</div>

<div class="form-group col-sm-3">
    {!! Form::label('ponto_id', 'Ponto:') !!}
        <select class="form-control" name="ponto_id" id="ponto_id">
            @if(isset($ponto))
                <option value="{{$ponto->id}}">{{$ponto->endereco->logradouro.' '.$ponto->numero.' - '.$ponto->endereco->bairro}}</option>
            @endif
        </select>
</div>

<div class="form-group col-sm-3">
    {!! Form::label('tipo_abordagem', 'Tipo Abordagem:') !!}
    {!! Form::select('tipo_abordagem',
     ['Orientativa'=>'Orientativa',
      'Fiscal'=>'Fiscal',
      'Monitoramento'=>'Monitoramento'
     ],
     null, ['class' => 'form-control','placeholder'=>'Selecionar']) !!}
</div>

<!-- Resultado Acao Field -->
<div class="form-group col-sm-3">
    {!! Form::label('resultado_acao', 'Resultado Acao:') !!}
    {!! Form::select('resultado_acao',
    ['Fenômeno persiste'=>'Fenômeno persiste',
    'Impactado parcialmente' => 'Impactado parcialmente',
    'Não há mais o fenômeno'=>'Não há mais o fenômeno',
    'Necessária nova abordagem'=>'Necessária nova abordagem'],null
    , ['class' => 'form-control','placeholder'=>'Selecionar']) !!}
</div>

<!-- Nomes Pessoas Field -->
<div class="form-group col-sm-3">
    {!! Form::label('nomes_pessoas', 'Nomes Pessoas:') !!}
    {!! Form::text('nomes_pessoas', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantidade Pessoas Field -->
<div class="form-group col-sm-3">
    {!! Form::label('quantidade_pessoas', 'Quantidade Pessoas:') !!}
    {!! Form::number('quantidade_pessoas', null, ['class' => 'form-control']) !!}
</div>

<!-- Nivel Complexidade Field -->

<!-- Casal Field -->
<div class="form-group col-sm-3">
    {!! Form::label('casal', 'Casal') !!}
    {!! Form::select('casal',[''=>'Não','1'=>'Sim'],null, ['class' => 'form-control','placeholder'=>'Selecionar']) !!}
</div>

<!-- Num Reduzido Field -->
<div class="form-group col-sm-3">
    {!! Form::label('num_reduzido', 'Num. reduzido') !!}
    {!! Form::select('num_reduzido',[''=>'Não','1'=>'Sim'],null, ['class' => 'form-control','placeholder'=>'Selecionar']) !!}
</div>

<!-- Catador Reciclados Field -->
<div class="form-group col-sm-3">
    {!! Form::label('catador_reciclados', 'Catador reciclados') !!}
    {!! Form::select('catador_reciclados',[''=>'Não','1'=>'Sim'],null, ['class' => 'form-control','placeholder'=>'Selecionar']) !!}
</div>

<!-- Resistencia Field -->
<div class="form-group col-sm-3">
    {!! Form::label('resistencia', 'Resistência') !!}
    {!! Form::select('resistencia',[''=>'Não','1'=>'Sim'],null, ['class' => 'form-control','placeholder'=>'Selecionar']) !!}

</div>

<!-- Fixacao Antiga Field -->
<div class="form-group col-sm-3">
    {!! Form::label('fixacao_antiga', 'Fixação antiga') !!}
    {!! Form::select('fixacao_antiga',[''=>'Não','1'=>'Sim'],null, ['class' => 'form-control','placeholder'=>'Selecionar']) !!}

</div>

<!-- Estrutura Abrigo Provisorio Field -->
<div class="form-group col-sm-3">
    {!! Form::label('estrutura_abrigo_provisorio', 'Estrutura abrigo provisório:') !!}
    {!! Form::select('estrutura_abrigo_provisorio',[''=>'Não','1'=>'Sim'],null, ['class' => 'form-control','placeholder'=>'Selecionar']) !!}


</div>

<!-- Excesso Objetos Field -->
<div class="form-group col-sm-3">
    {!! Form::label('excesso_objetos', 'Excesso objetos') !!}
    {!! Form::select('excesso_objetos',[''=>'Não','1'=>'Sim'],null, ['class' => 'form-control','placeholder'=>'Selecionar']) !!}

</div>

<!-- Trafico Ilicitos Field -->
<div class="form-group col-sm-3">
    {!! Form::label('trafico_ilicitos', 'Tráfico ilícitos') !!}
    {!! Form::select('trafico_ilicitos',[''=>'Não','1'=>'Sim'],null, ['class' => 'form-control','placeholder'=>'Selecionar']) !!}

</div>

<!-- Menores Idosos Field -->
<div class="form-group col-sm-3">
    {!! Form::label('menores_idosos', 'Menores Idosos') !!}
    {!! Form::select('menores_idosos',[''=>'Não','1'=>'Sim'],null, ['class' => 'form-control','placeholder'=>'Selecionar']) !!}

</div>

<!-- Deficiente Field -->
<div class="form-group col-sm-3">
    {!! Form::label('deficiente', 'Deficiente') !!}
    {!! Form::select('deficiente',[''=>'Não','1'=>'Sim'],null, ['class' => 'form-control','placeholder'=>'Selecionar']) !!}
</div>

<!-- Agrupamento Quimico Field -->
<div class="form-group col-sm-3">
    {!! Form::label('agrupamento_quimico', 'Agrupamento Quimico') !!}
    {!! Form::select('agrupamento_quimico',[''=>'Não','1'=>'Sim'],null, ['class' => 'form-control','placeholder'=>'Selecionar']) !!}

</div>

<!-- Saude Mental Field -->
<div class="form-group col-sm-3">
    {!! Form::label('saude_mental', 'Saude Mental') !!}
    {!! Form::select('saude_mental',[''=>'Não','1'=>'Sim'],null, ['class' => 'form-control','placeholder'=>'Selecionar']) !!}

</div>

<!-- Animais Field -->
<div class="form-group col-sm-3">
    {!! Form::label('animais', 'Animais') !!}
    {!! Form::select('animais',[''=>'Não','1'=>'Sim'],null, ['class' => 'form-control','placeholder'=>'Selecionar']) !!}
</div>

<div class="row"></div>

<!-- E1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('e1', 'Encaminhamento 1') !!}
    {!! Form::select('e1',[
    'Serviço Especializado em Abordagem Social - SEAS'=>'Serviço Especializado em Abordagem Social - SEAS',
    'Nenhum'=>'Nenhum',
    'Secretaria Municipal de Saúde'=>'Secretaria Municipal de Saúde',
        'Diversas Secretarias'=>'Diversas Secretarias',
            'Conselho Tutelar'=>'Conselho Tutelar',
                'Superintendência de Limpeza Urbana'=>'Superintendência de Limpeza Urbana',
                    'Diretoria Regional de Assistência Social'=>'Diretoria Regional de Assistência Social',
                        'Zoonoses'=>'Zoonoses',
                        'Defesa Civil'=>'Defesa Civil',
                        'SUDECAP'=>'SUDECAP',
                        'Demais Secretarias'=>'Demais Secretarias'
    ] ,null, ['class' => 'form-control','placeholder'=>'Selecionar...']) !!}
</div>

<!-- E2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('e2', 'Encaminhamento 2') !!}
    {!! Form::select('e2', [
    'Serviço Especializado em Abordagem Social - SEAS'=>'Serviço Especializado em Abordagem Social - SEAS',
    'Nenhum'=>'Nenhum',
    'Secretaria Municipal de Saúde'=>'Secretaria Municipal de Saúde',
        'Diversas Secretarias'=>'Diversas Secretarias',
            'Conselho Tutelar'=>'Conselho Tutelar',
                'Superintendência de Limpeza Urbana'=>'Superintendência de Limpeza Urbana',
                    'Diretoria Regional de Assistência Social'=>'Diretoria Regional de Assistência Social',
                        'Zoonoses'=>'Zoonoses',
                        'Defesa Civil'=>'Defesa Civil',
                        'SUDECAP'=>'SUDECAP',
                        'Demais Secretarias'=>'Demais Secretarias'
    ],null, ['class' => 'form-control','placeholder'=>'Selecionar...']) !!}
</div>

<!-- E3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('e3', 'Encaminhamento 3') !!}
    {!! Form::select('e3',[
    'Serviço Especializado em Abordagem Social - SEAS'=>'Serviço Especializado em Abordagem Social - SEAS',
    'Nenhum'=>'Nenhum',
    'Secretaria Municipal de Saúde'=>'Secretaria Municipal de Saúde',
        'Diversas Secretarias'=>'Diversas Secretarias',
            'Conselho Tutelar'=>'Conselho Tutelar',
                'Superintendência de Limpeza Urbana'=>'Superintendência de Limpeza Urbana',
                    'Diretoria Regional de Assistência Social'=>'Diretoria Regional de Assistência Social',
                        'Zoonoses'=>'Zoonoses',
                        'Defesa Civil'=>'Defesa Civil',
                        'SUDECAP'=>'SUDECAP',
                        'Demais Secretarias'=>'Demais Secretarias'
    ], null, ['class' => 'form-control','placeholder'=>'Selecionar...']) !!}
</div>

<!-- E4 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('e4', 'Encaminhamento 4') !!}
    {!! Form::select('e4',[
    'Serviço Especializado em Abordagem Social - SEAS'=>'Serviço Especializado em Abordagem Social - SEAS',
    'Nenhum'=>'Nenhum',
    'Secretaria Municipal de Saúde'=>'Secretaria Municipal de Saúde',
        'Diversas Secretarias'=>'Diversas Secretarias',
            'Conselho Tutelar'=>'Conselho Tutelar',
                'Superintendência de Limpeza Urbana'=>'Superintendência de Limpeza Urbana',
                    'Diretoria Regional de Assistência Social'=>'Diretoria Regional de Assistência Social',
                        'Zoonoses'=>'Zoonoses',
                        'Defesa Civil'=>'Defesa Civil',
                        'SUDECAP'=>'SUDECAP',
                        'Demais Secretarias'=>'Demais Secretarias'
    ] ,null, ['class' => 'form-control','placeholder'=>'Selecionar...']) !!}
</div>

<!-- Material Apreendido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('material_apreendido', 'Material Apreendido:') !!}
    {!! Form::text('material_apreendido', null, ['class' => 'form-control']) !!}
</div>

<!-- Material Descartado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('material_descartado', 'Material Descartado:') !!}
    {!! Form::text('material_descartado', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Abrigo Desmontado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_abrigo_desmontado', 'Tipo Abrigo Desmontado:') !!}
    {!! Form::select('tipo_abrigo_desmontado',[
    'Abrigo de lona'=>'Abrigo de lona','Abrigo de madeirite'=>'Abrigo de madeirite','Barraca de camping'=>'Barraca de camping'
    ], null, ['class' => 'form-control','placeholder'=>'Selecionar...']) !!}
</div>

<!-- Qtd Kg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qtd_kg', 'Qtd Kg:') !!}
    {!! Form::text('qtd_kg', null, ['class' => 'form-control']) !!}
</div>


<!-- Movimento Migratorio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('movimento_migratorio', 'Movimento Migratorio:') !!}
    {!! Form::text('movimento_migratorio', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observacao', 'Observacao:') !!}
    {!! Form::text('observacao', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('vistorias.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
    <script>
        $(function () {
            $('.datepicker').datepicker({dateFormat: 'dd-mm-yy'});

            select2($('#ponto_id'), "{{route('autocomplete.ponto')}}", "Selecionar");

        })
    </script>

@endsection
