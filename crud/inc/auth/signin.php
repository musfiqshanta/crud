<?php
session_name("login");
session_start();

if(isset($_SESSION['name'])){
    header("Location:../../../../crud/?task=report");
}
$user=$_POST['user'];
$pass=md5($_POST['password']);
$file=fopen("user.txt","r");

if(isset($_POST['submit'])){
    $waring;
while($data=fgetcsv($file)){
   // print_r($data);
if($user==$data[0] && $pass==$data[1]){
    $_SESSION['name'] = $data[0];
    $_SESSION['role'] = $data[2];
    header("Location:../../../../crud/?task=report");
    
}else{
    $waring="User And Password doesn't match";
}
}
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
        <?php 
            include_once("../templates/nav.php")
            
            ?>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row">
            <div class="column">

          




                <form method="POST">
                    <h2>Hi, Sign in please</h2>


                    <fieldset>

                        <input type="text" name="user" id="">
                        <input type="password" name="password" id="">
                        <input type="submit" name="submit">
                    
  
                    </fieldset>

                    <fieldset>
                    <?php echo $waring; ?>
                    </fieldset>


                </form>

            </div>



        </div>



    </div>

</body>

</html>