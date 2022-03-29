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
        <?php
        $lights = 8;
        $cout = 0;
        $lights_by_line = 3;
        ?>

        <?php while($count < $lights): ?>
            <div class="row">
                <?php for($i = 0; $i < $lights_by_line; $i++): ?>
                    <div class="form-group col m-3">
                        <label for="<?= "lampada$count"; ?>">
                            Lâmpada <?= $count+1; ?>
                        </label>
                        <input type="text" name="lampada[]"
                            id="<?= "lampada$count"; ?>" class="form-control">
                    </div>
                <?php 
                $count++; 
                if($count === $lights) break;
                ?>
                <?php endfor; ?>
            </div>
        <?php endwhile; ?>
        <div class="form-group text-center">
            <input type="submit" value="ENVIAR" class="btn btn-success">
        </div>
    </form>
</body>
</html>