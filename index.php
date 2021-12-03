<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php</title>
</head>
<body>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="POST-photo">Subir Foto: </label>
            <input id="POST-photo" type="file" name="photo">
            <input type="submit" name='save' value="Save">
        </form>
        <?php
            require_once 'Photo.php';

            $photo = new Photo();
                // if(isset($_FILES['photo'])){
                //     echo 'llega algo';
                   
                //     // echo $photo->addFile();
                // }
            // var_dump($photo->armarTabla()); die;
            echo $photo->addFile();
            echo $photo->listarArchivos();

        ?>
    </div>
</body>
</html>


