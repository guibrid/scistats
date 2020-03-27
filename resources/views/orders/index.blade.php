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
        <th scope="col">N° de commande</th>
        <th scope="col">Client</th>
        <th scope="col"># d'article</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
      <tr>
        <th scope="row">{{$order->order_number }}</th>
        <td>{{$order->customer->name}}</td>
        <td>{{$order->items_count}} / {{$order->rows}}</td>
        <td>{{$order->id}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

</body>

</html>