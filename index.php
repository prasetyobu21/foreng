<?php
session_start();
ob_start();
include('config/mysqliconnect.php');
$_SESSION['page'] = 'Lobby';

              
if (isset($_GET['auditorium'])){
    $_SESSION['page'] = 'auditorium';
    header('Location: auditorium.php');
}

if (isset($_GET['sponsorBooth'])){
    $sponsor = $_GET['sponsorBooth'];
    $sql="select * from sponsor where name = '".$sponsor."'";
    $query = mysqli_query($con, $sql);
    $sponsorData = mysqli_fetch_assoc($query);

    $_SESSION['sponsorName'] = $sponsorData['name'];
    $_SESSION['sponsorPhone'] = $sponsorData['phoneNumber'];
    $_SESSION['sponsorVideo'] = $sponsorData['video'];
    $_SESSION['sponsorBanner'] = $sponsorData['sponsor_banner'];
    $_SESSION['sponsorLogo'] = $sponsorData['sponsor_logo'];
    $_SESSION['sponsorBackgroundImg'] = $sponsorData['sponsor_background'];
    $_SESSION['sponsorNameDisp'] = $sponsorData['sponsor_nameDisplay'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum Engineering 2020</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/main.css?v=2" media="all" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <link rel="icon" href="./assets/photos/forenglogo.png" type="image/icon type">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>


<body>
    <form action="" method="post">
        <div id='nav'>
            <nav class="navbar fixed-bottom navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <!-- Menu dan icon pada navbar -->
                        <a id='navLobby' class="nav-link active">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>Lobby <span class="sr-only">(current)</span></a>

                        <a id='navExhibition' class="nav-link active">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-grid" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                            </svg>Exhibition</a>

                        <a id='navAuditorium' href='index.php?auditorium=true' class="nav-link active">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tv-fill" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2.5 13.5A.5.5 0 0 1 3 13h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zM2 2h12s2 0 2 2v6s0 2-2 2H2s-2 0-2-2V4s0-2 2-2z" />
                            </svg>Auditorium </a>

                        <a id='navActivity' class="nav-link active">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-menu-button-wide-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M14 7H2a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zM2 6a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2H2z" />
                                <path fill-rule="evenodd"
                                    d="M15 11H1v-1h14v1zM2 12.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0h-13zm1 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm9.927.427l.396.396a.25.25 0 0 0 .354 0l.396-.396A.25.25 0 0 0 13.396 2h-.792a.25.25 0 0 0-.177.427z" />
                            </svg>Activity</a>

                        <a id='navRC' class="nav-link active" style="width: fit-content;">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-arrow-down-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z" />
                            </svg>Resource Center</a>

                        <a id='navEF' class="nav-link active" style="width: fit-content;">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>Event Feedback</a>

                        <a id='navAbout' class="nav-link active">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                            </svg>About</a>

                    </div>
                </div>
            </nav>
        </div>
    </form>


    <!-- Login and lobby -->
    <form action="" method="post">
        <div id='lobby'>
            <div id='bgBlur' class="wrapper-bg"></div>
            <div id='loginCard' class="loginPanel">
                <img src="./assets/photos/forenglogo.png" class="foto">
                <h1 class="user-select-none">Welcome</h1>
                <p class="user-select-none">E-mail</p>
                <input id="username" type="text" name="email" placeholder="Enter E-mail">
                <p class="user-select-none">Password</p>
                <input id="password" type="password" name="password" placeholder="Enter Password">
                <input type="submit" name="login" value="Login">
                <p> </p>
                <a>Sign up</a>
            </div>
        </div>
    </form>



    <!-- AUDITORIUM -->
    <div id='auditorium'>
        <div style='' class="wrapper-bg-auditorium">
            <h1 style='color: blue'><?php echo $_SESSION['page'] ?></h1>
            <div class="container">
                <div class="row">
                    <div class="col-5  embed-responsive embed-responsive-16by9 centered-thing"> Youtube
                        <iframe id='auditoriumVideo' width="560" height="315"
                            src="https://www.youtube.com/embed/7LeOx-XLWEw?controls=0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Exhibition -->
    <div id='exhibition'>
        <div class="wrapper-bg-exhibition"></div>
    </div>


    <!-- Leaderboard -->
    <div id='leaderboard'>
        <div class="wrapper-bg-activity"></div>
    </div>


    <!-- Resource Center -->
    <div id='resourceCenter'>
        <div class="wrapper-bg-resource"></div>
    </div>


    <!-- About -->
    <div id='about'>
        <div class="wrapper-bg-about"></div>
    </div>


    <!-- Event Feedback -->
    <div id='eventFeedback'>
        <div class="wrapper-bg-feedback"></div>
    </div>

    <?php

if($_SESSION['logonUser'] == 'aktif'){
              ?>
    <script>
    $('#bgBlur').css('filter', 'none').fadeIn(1000);
    $('#loginCard').fadeOut(600);
    $('#nav').fadeIn(600);
    </script>
    <?php
}

    if(isset($_POST['login'])){
                  $sql="select * from user where email='".$_POST['email']."' and password='".$_POST['password']."'";
                  $query=mysqli_query($con, $sql);
                  $data=mysqli_fetch_assoc($query);
                  if(mysqli_num_rows($query)>0){
                      $_SESSION['email'] = $data['email'];
                      
                      ?>
    <script>
    $('#bgBlur').css('filter', 'none').fadeIn(1000);
    $('#loginCard').fadeOut(600);
    $('#nav').fadeIn(600);
    </script>
    <?php
                      
                    $_SESSION['logonUser']="aktif";
                    $_SESSION['password']=$_POST['password'];
                  }
                }
                ?>

    <script>
    $("#navAuditorium").click(function() {
        $.post("index.php");
        $('#auditorium').fadeIn();
        $('#about').fadeOut();
        $('#eventFeedback').fadeOut();
        $('#exhibition').fadeOut();
        $('#leaderboard').fadeOut();
        $('#resourceCenter').fadeOut();
        $('#lobby').fadeOut();
    });

    $("#navLobby").click(function() {
        var video = $('#auditoriumVideo').attr("src");
        $('#auditoriumVideo').attr("src", "");
        $('#auditoriumVideo').attr("src", video);


        $('#lobby').fadeIn();
        $('#auditorium').fadeOut();
        $('#about').fadeOut();
        $('#eventFeedback').fadeOut();
        $('#exhibition').fadeOut();
        $('#leaderboard').fadeOut();
        $('#resourceCenter').fadeOut();
    });

    $("#navExhibition").click(function() {
        var video = $('#auditoriumVideo').attr("src");
        $('#auditoriumVideo').attr("src", "");
        $('#auditoriumVideo').attr("src", video);

        $('#auditorium').fadeOut();
        $('#about').fadeOut();
        $('#eventFeedback').fadeOut();
        $('#exhibition').fadeIn();
        $('#leaderboard').fadeOut();
        $('#resourceCenter').fadeOut();
        $('#lobby').fadeOut();
    });

    $("#navActivity").click(function() {
        var video = $('#auditoriumVideo').attr("src");
        $('#auditoriumVideo').attr("src", "");
        $('#auditoriumVideo').attr("src", video);

        $('#auditorium').fadeOut();
        $('#about').fadeOut();
        $('#eventFeedback').fadeOut();
        $('#exhibition').fadeOut();
        $('#leaderboard').fadeIn();
        $('#resourceCenter').fadeOut();
        $('#lobby').fadeOut();
    });

    $("#navRC").click(function() {
        var video = $('#auditoriumVideo').attr("src");
        $('#auditoriumVideo').attr("src", "");
        $('#auditoriumVideo').attr("src", video);

        $('#auditorium').fadeOut();
        $('#about').fadeOut();
        $('#eventFeedback').fadeOut();
        $('#exhibition').fadeOut();
        $('#leaderboard').fadeOut();
        $('#resourceCenter').fadeIn();
        $('#lobby').fadeOut();
    });

    $("#navEF").click(function() {
        var video = $('#auditoriumVideo').attr("src");
        $('#auditoriumVideo').attr("src", "");
        $('#auditoriumVideo').attr("src", video);

        $('#auditorium').fadeOut();
        $('#about').fadeOut();
        $('#eventFeedback').fadeIn();
        $('#exhibition').fadeOut();
        $('#leaderboard').fadeOut();
        $('#resourceCenter').fadeOut();
        $('#lobby').fadeOut();
    });

    $("#navAbout").click(function() {
        var video = $('#auditoriumVideo').attr("src");
        $('#auditoriumVideo').attr("src", "");
        $('#auditoriumVideo').attr("src", video);

        $('#auditorium').fadeOut();
        $('#about').fadeIn();
        $('#eventFeedback').fadeOut();
        $('#exhibition').fadeOut();
        $('#leaderboard').fadeOut();
        $('#resourceCenter').fadeOut();
        $('#lobby').fadeOut();
    });
    </script>
</body>