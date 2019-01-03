@section('css')
    <style>
      #map {
        height: 600px;  
        width: 100%; 
       }
    </style>
@endsection
<h3>Ponto: {{$ponto->logradouro.' '.$ponto->numero.' - '.$ponto->bairro.' '.$ponto->regional.' '.$ponto->complemento}}</h3>
@include('geo._search')

<table class="table table-responsive" id="enderecamentos-table">
    <thead>
        <th>Idend</th>
        <th>Id Logrado</th>
        <th>Sigla Tipo</th>
        <th>Nome Logra</th>
        <th>Numero Imo</th>
        <th>Letra Imov</th>
        <th>Nome Bairr</th>
        <th>Nome Regio</th>
        <th>Cep</th>
        <th>Leste</th>
        <th>Norte</th>

    </thead>
    <tbody>
    @foreach($enderecamentos as $enderecamento)
        <tr>
            <td>{!! $enderecamento->IDEND !!}</td>
            <td>{!! $enderecamento->ID_LOGRADO !!}</td>
            <td>{!! $enderecamento->SIGLA_TIPO !!}</td>
            <td>{!! $enderecamento->NOME_LOGRA !!}</td>
            <td>{!! $enderecamento->NUMERO_IMO !!}</td>
            <td>{!! $enderecamento->LETRA_IMOV !!}</td>
            <td>{!! $enderecamento->NOME_BAIRR !!}</td>
            <td>{!! $enderecamento->NOME_REGIO !!}</td>
            <td>{!! $enderecamento->CEP !!}</td>
            <td>{!! $enderecamento->LESTE !!}</td>
            <td>{!! $enderecamento->NORTE !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $enderecamentos->appends(Request::except('page'))->links() !!}
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" disabled id="latlong">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Georrefenciar Objeto</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->



<div id="map"></map>
@section('scripts')
<script>
$(function(){
    $('tbody tr').click(function(){
        var leste = $(this).children().eq(9).text();
        var norte = $(this).children().eq(10).text();
        url = "{{route('converter')}}";
        $.ajax({
            url: url,
            data:{
                leste:leste,
                norte:norte
            },
            success: function(result){
                result = result.split(',');
                lat = parseFloat(result[0]);
                lng = parseFloat(result[1]);
                
                initMap(lat,lng);
            }
        })
    })
})

var map;
function initMap(lat,lng) {
          
    var myll = {lat:lat,lng:lng};
    map = new google.maps.Map(document.getElementById('map'), {
        center: myll,
        zoom: 18
    });
    var marker = new google.maps.Marker({position: myll, map: map});

    google.maps.event.addListener(map, 'click', function (e) {

        //Determine the location where the user has clicked.
        var location = e.latLng;

        $("#latlong").val(e.latLng);

        //Create a marker and placed it on the map.
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });

    });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYnyUUzk1tMCsLVDbnUL6g8zmAWmml7c&"
async defer></script>
@endsection