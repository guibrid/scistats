<!DOCTYPE html>

<html>

<head>

    <title>Laravel 6 Import Export Excel to database Example - ItSolutionStuff.com</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

   

<div class="container">
  <a href="{{ url('/importExportView') }}">Importer commande</a>  
    <table class="table">
    <thead>
      <tr>
        <th scope="col">Code Product</th>
        <th scope="col">Libelle</th>
        <th scope="col">Familles</th>
        <th scope="col">Colis</th>
        <th scope="col">PCB</th>
        <th scope="col">UV</th>
      </tr>
    </thead>
    <tbody>
      <?php dd($items); ?>
        @foreach ($items as $item)

        <tr><td>{{$item['product']['code']}}</td><td>{{$item['product']['title']}}</td><td>{{$item['product']['category']['title']}}</td><td>{{$item['sum']}}</td><td>{{$item['product']['pcb']}}</td><td>{{$item['product']['pcb'] * $item['sum']}}</td></tr>

      @endforeach
    </tbody>
  </table>

</body>

</html>