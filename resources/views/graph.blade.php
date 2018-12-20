@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div style="width:75%;">
                {!! $chartjs->render() !!}
            </div>
        </div>
    </div>
@endsection