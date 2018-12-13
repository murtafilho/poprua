@extends('layouts.app')
@section('css')
 <style>
        .navbar { margin-bottom: 20px; }
        :root { --jumbotron-padding-y: 10px; }
        .jumbotron {
          padding-top: var(--jumbotron-padding-y);
          padding-bottom: var(--jumbotron-padding-y);
          margin-bottom: 0;
          background-color: #fff;
        }
        @media (min-width: 768px) {
          .jumbotron {
            padding-top: calc(var(--jumbotron-padding-y) * 2);
            padding-bottom: calc(var(--jumbotron-padding-y) * 2);
          }
        }
        .jumbotron p:last-child { margin-bottom: 0; }
        .jumbotron-heading { font-weight: 300; }
        .jumbotron .container { max-width: 40rem; }
        .btn-card { margin: 4px; }
        .btn { margin-right: 5px; }
        footer { padding-top: 3rem; padding-bottom: 3rem; }
        footer p { margin-bottom: .25rem; }
    </style>
@endsection
@section('content')
   <section class="jumbotron text-center">
        <div class="container">
          <form method="POST" action="{{route('fotos.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group text-left">
              <label for="mensagem">Vistoria ID</label>
              <input class="form-control" id="vistoria_id" name="vistoria_id" rows="3"></textarea>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="url" name="url">
              <label class="custom-file-label" for="arquivo">Escolha um arquivo</label>
            </div>
            <p>
              <button type="submit" class="btn btn-primary my-2">Enviar</button>
              <button type="reset" class="btn btn-secondary my-2">Cancelar</button>
            </p>
          </form>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            @foreach($fotos as $foto)
                <div class="col-md-6">
                  <div class="card mb-6 shadow-sm">
                    <img class="card-img-top figure-img img-fluid rounded" src="/storage/{{ $foto->url }}">
                    <div class="card-body">
                      <p class="card-text">{{ $foto->vistoria_id }}</p>
                      <p class="card-text">{{ $foto->url }}</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <!--button type="button" class="btn btn-sm btn-outline-secondary">Download</button-->
                          <a type="button" class="btn btn-sm btn-outline-secondary" href="/download/{{$foto->id}}">Download</a>
                          <form action="{{route('dotos.destroy'),$foto->id}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-sm btn-outline-danger">Apagar</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>

    </main>
@endsection
