@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Novo Endereçamento (Tipo, Logradouro, Bairro, Regional)
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'enderecos.store']) !!}

                        @include('enderecos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
