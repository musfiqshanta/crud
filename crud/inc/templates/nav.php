<?php
session_name("login");
session_start();
?>


<p style="float:left">
<a href="/crud?task=report">ALl Students</a> |
<?php if($_SESSION['role']=="admin") :?>
<a href="/crud?task=add">Add New Students</a> | 
<a href="/crud?task=seed">Seeds</a>
<?php endif ?>


</p>
<p style="float: right;">
<?php if(isset($_SESSION['name'])) :?>
    <a href="/crud/?logout=true">Log Out (<?php echo $_SESSION['role'] ?>)</a> |

    <?php endif ?>

    <?php if(!isset($_SESSION['name'])) :?>
    <a href="crud/inc/auth/signin.php">Sign in</a> |
    <a href="crud/inc/auth/signup.php">Sign up</a> |

    <?php endif ?>
</p>