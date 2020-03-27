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

    <div class="card bg-light mt-3">

        <div class="card-header">

            Laravel 6 Import Export Excel to database Example - ItSolutionStuff.com

        </div>

        <div class="card-body">

            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <p><select name="customer">
                        @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                </p>
                <p><input id="datepicker" name="date" /></p>
                <p><input type="text" name="orderNumber" placeholder="Numéro de commande" /></p>
                <p><input type="text" name="invoiceNumber" placeholder="Numéro de facture" /></p>
                <p><input type="text" name="vessel" placeholder="Nom du bateau / avion" /></p>
                <p><input type="text" name="container" placeholder="Numéro de container" /></p>
                <p><input type="text" name="plomb" placeholder="Numéro de plomb" /></p>
                <p><input id="datepickereta" type="text" name="eta" placeholder="Date de départ" /></p>
                <p><input id="datepickeretd" type="text" name="etd" placeholder="Date d'arrivée" /></p>

                <p><input type="file" name="file" class="form-control"></p>

                <br>

                <button class="btn btn-success">Import User Data</button>

            </form>

        </div>

    </div>

</div>

   
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
         format: 'dd-mm-yyyy' 
    });
    $('#datepickereta').datepicker({
        uiLibrary: 'bootstrap4',
         format: 'dd-mm-yyyy' 
    });
    $('#datepickeretd').datepicker({
        uiLibrary: 'bootstrap4',
         format: 'dd-mm-yyyy' 
    });
</script>
</body>

</html>