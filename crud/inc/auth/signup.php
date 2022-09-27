<?php
session_name("login");
session_start();

if(isset($_SESSION['name'])){
    header("Location:../../../../crud/?task=report");
}
$user=$_POST['user'];
$pass=md5($_POST['password']);

if(isset($_POST['submit'])){
  $fget=file_get_contents("user.txt");
  $fileputs="$fget\n$user,$pass";

   file_put_contents("user.txt","$fileputs",LOCK_EX);
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <title>Sign in</title>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="column">
                <form method="POST">
                    <h2>Hi,If You don't have access, Please sign Up</h2>


                    <fieldset>

                        <input type="text" name="user" id="">
                        <input type="password" name="password" id="">
                        <input type="submit" name="submit">


                    </fieldset>


                </form>

            </div>



        </div>



    </div>

</body>

</html>