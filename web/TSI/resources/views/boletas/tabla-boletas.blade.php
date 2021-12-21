<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Resumen de Boletas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>

    <body>
        <div class="container-fluid">

            <br>
            <span>Resumen de Boletas</span>
            <br>

            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <td>Monto</td>
                        <td>Mes</td>
                        <td>Año</td>
                        <td>Domicilio</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tablaBoletas as $boleta)
                        <tr>
                            <td>{{ $boleta['monto'] }}</td>
                            <td>{{ $boleta['mes'] }}</td>
                            <td>{{ $boleta['anno'] }}</td>
                            <td>{{ $boleta['domicilio_id'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span>Sistema hecho por: Ignacio Araya</span>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
        </script>
    </body>

</html>
