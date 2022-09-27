<?php
session_name('login');
session_start();
require_once "Crud/inc/functions.php";

print_r($_SESSION['role']);

if (!isset($_SESSION['name'])) {

    // header("Location:crud/inc/auth/signin.php");

}
print_r($_SESSION['name']);

if ($_GET['logout'] == true) {
    header("Location:crud/inc/auth/signin.php");
    session_destroy();
}

if ("edit" == $_GET['task'] || "delete"== $_GET['task']) {

    if (!restruction()) {
        header("Location:crud/inc/auth/signin.php");
        die();
    }

}

//print_r("fuck");

$task = $_GET['task'];

if ("seed" == $task) {
    seed();
    $note = "Seed added successfully";
}
if (isset($_POST['submit'])) {
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $roll = $_POST['roll'];
    if ($fname != '' && $lname != '' && $roll != '') {
        addStudents($fname, $lname, $roll);
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $roll = $_POST['roll'];
    if ($fname != '' && $lname != '' && $roll != '') {
        $result = updateStudent($id, $fname, $lname, $roll);
    }
    if (!$result) {
        $error = 1;
    }
}
if ("delete" == $task) {

    $darray = delete($_GET['id']);

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
    <title>Crud Project</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column">


                <h1>Crud Project</h1>

                <?php include_once "Crud/inc/templates/nav.php"?>

                <?php echo $note ?>
                <?php

if ("report" == $_GET['task']) {
    AllStudents();
} else {
    include_once "Crud/inc/templates/addStudents.php";
    if ($error == 1) {
        echo "Password match";
    }
}

?>

            </div>
        </div>

    </div>



</body>

</html>