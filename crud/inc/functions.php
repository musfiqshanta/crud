<?php
session_name('login');
session_start();
define("Db_Name", 'Crud/data/db.txt');

function seed(){
    $data = array(
        array(
            'id' => 1,
            'fname' => "kamal",
            'lname' => 'khan',
            'roll' => 15,

        ), array(
            'id' => 2,
            'fname' => "shanta",
            'lname' => 'khan',
            'roll' => 2,

        ), array(
            'id' => 3,
            'fname' => "musfiq",
            'lname' => 'khan',
            'roll' => 1,

        ), array(
            'id' => 4,
            'fname' => "arif",
            'lname' => 'khan',
            'roll' => 14,

        ),
    );

    $serialise = serialize($data);
    file_put_contents(Db_Name, $serialise, LOCK_EX);
}
function AllStudents(){

    $fileGet = file_get_contents(Db_Name);
    $students = unserialize($fileGet);
    ?>
    <table>
        <tr>
            <th>
                Name
            </th>
            <th>
                Roll
            </th>
            <th>
                Action
            </th>

        </tr>





        <?php
foreach ($students as $student) {

        ?>

            <tr>
                <td>
                    <?php printf("%s %s ", $student['fname'], $student['lname']);?>
                </td>
                <td>
                    <?php printf("%s ", $student['roll']);?>
                </td>
                <td>
                    <?php printf("<a href='/crud?task=edit&id=%s'> Edit </a> | <a href='/crud?task=delete&id=%s'>Delete </a>",$student['id'], $student['id']);?>
                </td>



            </tr>

        <?php

    }

    ?>

    </table>
<?php
}

function addStudents($fname, $lname, $roll)
{
    $fileGet = file_get_contents(Db_Name);
    $students = unserialize($fileGet);

    //  print_r( $students[0]["id"]);

    $id = max(array_column($students, 'id'));

    $match = false;
    $student = array(
        'id' => $id + 1,
        'fname' => $fname,
        'lname' => $lname,
        'roll' => $roll,

    );

    foreach ($students as $rolls) {
        if ($roll == $rolls['roll']) {
            $match = true;
            break;
        }
    }

    if (!$match) {
        array_push($students, $student);
        $serialise = serialize($students);
        file_put_contents(Db_Name, $serialise, LOCK_EX);
        header("Location:/crud/?task=report");
    }

    //  print_r($serialise);

}

function updateStudent($id, $fname, $lname, $roll)
{

    $fileGet = file_get_contents(Db_Name);
    $students = unserialize($fileGet);
    $getid = $_GET['id'];
    $iroll = $students[$getid - 1]['roll'];
    $match = false;
    foreach ($students as $rolls) {
        if ($roll == $rolls['roll']) {
            if ($iroll == $roll) {
                $match = false;
            } else {
                $match = true;
                break;
            }
        }
    }

    $students[$getid - 1]['fname'] = $fname;
    $students[$getid - 1]['lname'] = $lname;
    $students[$getid - 1]['roll'] = $roll;

    if (!$match) {
        $serialise = serialize($students);
        file_put_contents(Db_Name, $serialise, LOCK_EX);
        header("Location:/crud/?task=report");
        return true;
    } else {

        return false;
    }
}

function delete($id)
{
    $fileGet = file_get_contents(Db_Name);
    $students = unserialize($fileGet);

    // print_r($students[$id-1]);

    unset($students[$id - 1]);
    $serialise = serialize($students);
    file_put_contents(Db_Name, $serialise, LOCK_EX);
    header("Location:/crud/?task=report");

    return $students;
}

function restruction(){
    return ("admin"==$_SESSION['role'] ||"editor"== $_SESSION['editor']);
}