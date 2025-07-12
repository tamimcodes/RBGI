<?php 
require_once "dbconnect.php";
require_once "navbar.php";
$new_id = $_GET['new_id'];
//echo $new_id;
$quere1 = "select * from submitform_1 where guid = '$new_id'";
$data1 = mysqli_query($connection,$quere1);
$row1 = mysqli_fetch_array($data1);
$type = $row1['type'];
$contain = $row1['contain'];
$title = $row1['title'];

$quere2 = "select * from submitform_2 where guid = '$new_id'";
$data2 = mysqli_query($connection,$quere2);
$row2 = mysqli_fetch_array($data2);
$organization = $row2['organization'];
$department = $row2['department'];
$country = $row2['country'];
$name = $row2['name'];
$email = $row2['email'];

$quere3 = "select * from submitform_3 where position = '$new_id'";
$data3 = mysqli_query($connection,$quere3);
$row3 = mysqli_fetch_array($data3);
$method = $row3['method'];
$state = $row3['state'];

$quere4 = "select * from submitform_4 where guid = '$new_id'";
$data4 = mysqli_query($connection,$quere4);
$row4 = mysqli_fetch_array($data4);
$low = $row4['low'];
$obtain = $row4['obtain'];
$primer = $row4['primer'];
$scale = $row4['scale'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view</title>
    <link href="./output.css" rel="stylesheet">
</head>
<body>
<div class="m-10">
<form action="" method="POST">
<div class="flex flex-col items-center bg-secondary p-4 rounded-2xl">
        <h1 class="font-bold text-4xl text-butBlue">Submission Type</h1><br>
        <table class="w-full text-center text-2xl">
            <tr>
                <td>Title</td>
                <td><input type="text" value="<?php echo $title?>" name="title" class="border-2 rounded-md bg-white"></td>
            </tr>
            <tr>
                <td>Type of organism or material </td>
                <td><input type="text" name="type" value="<?php echo $type?>" class="border-2 rounded-md bg-white" ></td>
            </tr>
            <tr>
                <td>Sequences contain</td>
                <td><input type="text" name="contain" value="<?php echo $contain?>" class="border-2 rounded-md bg-white"></td>
            </tr>
        </table>
    </div><br>

    <div class="flex flex-col items-center bg-secondary p-4 rounded-2xl">
        <h1 class="font-bold text-4xl text-butBlue">Submitter</h1><br>
        <table class="w-full text-center text-2xl">
            <tr>
                <td>Submitting organization</td>
                <td><input type="text" name="organization" value="<?php echo $organization?>" class="border-2 rounded-md bg-white"></td>
            </tr>
            <tr>
                <td>Department </td>
                <td><input type="text" name="department" value="<?php echo $department?>" class="border-2 rounded-md bg-white"></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input type="text" name="country" id="" value="<?php echo $country?>" class="border-2 rounded-md bg-white"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" id="" value="<?php echo $email?>" class="border-2 rounded-md bg-white"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id="" value="<?php echo $name?>" class="border-2 rounded-md bg-white"></td>
            </tr>
        </table>
    </div><br>

    <div class="flex flex-col items-center bg-secondary p-4 rounded-2xl">
        <h1 class="font-bold text-4xl text-butBlue">Sequencing Technology</h1><br>
        <table class="w-full text-center text-2xl">
            <tr>
                <td>Method</td>
                <td><input type="text" name="method" id="" value="<?php echo $method?>" class="border-2 rounded-md bg-white"></td>
            </tr>
            <tr>
                <td>Assembly state</td>
                <td><input type="text" name="state" id="" value="<?php echo $state?>" class="border-2 rounded-md bg-white"></td>
            </tr>
        </table>
    </div><br>

    <div class="flex flex-col items-center bg-secondary p-4 rounded-2xl">
        <h1 class="font-bold text-4xl text-butBlue">Sequences</h1><br>
        <table class="w-full text-center text-2xl">
            <tr>
                <td>Check and remove low-quality and chimeric sequences from your FASTA file prior to preparing this submission</td>
                <td><input type="text" name="low" id="" value="<?php echo $low?>" class="border-2 rounded-md bg-white"></td>
            </tr>
            <tr>
                <td>Cultured or uncultured</td>
                <td><input type="text" name="obtain" id="" value="<?php echo $obtain?>" class="border-2 rounded-md bg-white"></td>
            </tr>
            <tr>
                <td>Primer type</td>
                <td><input type="text" name="primer" id="" value="<?php echo $primer?>" class="border-2 rounded-md bg-white"></td>
            </tr>
            <tr>
                <td>Large scale study</td>
                <td><input type="text" name="scalr" id="" value="<?php echo $scale?>" class="border-2 rounded-md bg-white"></td>
            </tr>
        </table>
    </div><br>
    <button class="bg-butBlue text-background rounded-md w-30 h-10 m-10"><input type="submit" name="edit" id="" value="EDIT"></button>
</div>
</form>


<?php 
if(isset($_POST['edit'])){
    ?>
    <script type="text/javascript">
    let deleteConfirmation = confirm("Are you sure you want to edit?");
    if (deleteConfirmation) {
        console.log("Deletion process initiated.");
    // Code to handle deletion
        <?php 
  
        ?>
        window.open("http://localhost/rbgi/src/profile.php","_self")
    } else {
    console.log("aborted by user.");
        // Code to handle cancellation
        window.open("http://localhost/rbgi/src/profile.php","_self")
    }
    </script>

    <?php
}
require_once "footer.php";
?>
</body>
</html>