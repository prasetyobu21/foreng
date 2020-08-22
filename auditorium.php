<?php
session_start();
include('config/mysqliconnect.php');


if(isset($_POST['back']))    {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum Engineering 2020</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <link rel="icon" href="./assets/photos/forenglogo.png" type="image/icon type">
</head>


<body>
    <h1><?php echo $_SESSION['logonUser'] ?></h1>
    <h1><?php echo $_SESSION['page'] ?></h1>
    <form action="" method='post'>


        <!-- Background dan Panel Login -->
        <div class="wrapper-bg-auditorium">
            <h1 style='color: blue'><?php echo $_SESSION['logonUser'] ?></h1>
            <div class="container">
                <div class="row">
                    <div class="col-5  embed-responsive embed-responsive-16by9 centered-thing"> Youtube




                        <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/7LeOx-XLWEw?controls=0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe> -->

                        <input type="submit" name="back" value="back">




                    </div>
                </div>
    </form>
</body>