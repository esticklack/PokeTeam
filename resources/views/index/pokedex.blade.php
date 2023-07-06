

@extends('Layouts.app')

@section('scripts')

<script>

$(document).ready(function() {
  $.getJSON('http://poketeam.test/api/pokedex', function(json) {
    var tr = [];
    for (var i = 0; i < json.length; i++) {
      if (json[i].captura === 1) {
        tr.push('<tr>');
        tr.push('<td>' + '<img src="' + json[i].imagen + '" style="width: 200px; height: 200px; border: 2px solid red">' + '</td>');
        tr.push('<td>' + json[i].nombre + '</td>');
        tr.push('<td>' + json[i].numero + '</td>');
        tr.push('<td>' + json[i].tipo + '</td>');
        tr.push('<td>' + json[i].descripcion + '</td>');
        tr.push('<td>' + json[i].vida + '</td>');
        tr.push('<td>' + json[i].ataque + '</td>');
        tr.push('<td>' + json[i].defensa + '</td>');
        tr.push('</tr>');
      } else {
        tr.push('<tr>');
        tr.push('<td>' + '</td>');
        tr.push('<td>' + json[i].nombre + '</td>');
        tr.push('<td>' + '</td>');
        tr.push('<td>' + '</td>');
        tr.push('<td>' + '</td>');
        tr.push('<td>' + '</td>');
        tr.push('<td>' + '</td>');
        tr.push('<td>' + '</td>');
        tr.push('</tr>');
      }
    }
    $('#tbl-data tbody').append($(tr.join('')));
  });
});

</script>

@endsection

@section('content')



<div class="table-responsive">
  <table class="table table-striped table-sm" id="tbl-data">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Especie</th>
        <th scope="col">Numero</th> 
        <th scope="col">Tipo</th> 
        <th scope="col">Descripcion</th> 
        <th scope="col">Vida</th> 
        <th scope="col">Ataque</th> 
        <th scope="col">Defensa</th> 
      </tr>
    </thead>
    <tbody>
                
    </tbody>
  </table>
  </div>
@endsection