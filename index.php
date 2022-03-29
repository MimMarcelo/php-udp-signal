<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UDP project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <form action="ws/send-udp.php" method="get" class="container">
        <div class="row">
            <div class="form-group col m-3">
                <label for="lampada">
                    Lâmpada
                </label>
                <input type="number" name="lampada" min="0" max="255"
                    id="lampada" class="form-control" autofocus>
            </div>
            <div class="form-group col m-3">
                <label for="valor">
                    Valor
                </label>
                <input type="range" name="valor" min="0" max="100"
                    id="valor" class="form-control">
            </div>
        </div>
        <div class="form-group text-center">
            <input type="submit" value="ENVIAR" class="btn btn-success">
        </div>
    </form>
</body>
</html>