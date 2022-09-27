 <?php if ("add" == $_GET['task']): ?>


     <div>
         <form action="/crud/?task=add&error=1" method="POST">
             <fieldset>
                 <label for="fname"> First Name</label>
                 <input type="text" name="fname" value=<?php if (1 == $_GET['error']) {
    echo $_POST['fname'];
}?>>
                 <label for="lname"> Last Name</label>
                 <input type="text" name="lname" value=<?php echo $_POST['lname'] ?>>
                 <label for="roll"> Roll</label>
                 <input type="number" name="roll" value=<?php echo $_POST['roll'] ?>>

                 <input type="submit" name="submit">


             </fieldset>



         </form>
     </div>


 <?php endif?>

 <?php if ("edit" == $_GET['task']):
    $fileGet = file_get_contents(Db_Name);
    $students = unserialize($fileGet);
    $getid = $_GET['id'];
    $fname = $students[$getid - 1]['fname'];
    $lname = $students[$getid - 1]['lname'];
    $roll = $students[$getid - 1]['roll'];

    ?>
	     <form method="POST">
	         <fieldset>
	             <input type="hidden" name="id" value="<?php echo $getid ?>">
	             <label for="fname"> First Name</label>
	             <input type="text" name="fname" value=<?php echo $fname; ?>>
	             <label for="lname"> Last Name</label>
	             <input type="text" name="lname" value=<?php echo $lname ?>>
	             <label for="roll"> Roll</label>
	             <input type="number" name="roll" value=<?php echo $roll ?>>

	             <input type="submit" name="update" value="Update">


	         </fieldset>



	     </form>
	 <?php endif?>

 <?php
if (1 == $_GET['error']):

?>
     <fieldset>

         <p> Roll number Match</p>
     </fieldset>

 <?php endif?>