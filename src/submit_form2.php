<?php 
require_once "dbconnect.php";
session_start();
$id = $_SESSION['id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select type</title>
    <link href="./output.css" rel="stylesheet">
</head>
<body>


<?php 
require_once "navbar.php";
?>
    <div class="bg-background p-10 shadow-xl">

        <div class="flex justify-between">
            <h1 class="font-bold text-4xl">Submitter : </h1><br>
            <a href="submit_form1.php"><button class="bg-butBlue text-background rounded-md w-25 h-10">Previous</button></a>

        </div> <br>
        <form action="" method="POST">
            
            <div >
                <label for="" class="text-2xl">Submitting organization </label>
                <input type="text" name="org" required placeholder=" your organization...." class="w-full border p-2 rounded">
            </div>
            <div >
                <label for="" class="text-2xl">Department </label>
                <input type="text" name="dpt" required placeholder=" your department...." class="w-full border p-2 rounded">
            </div>
            <div >
                <label for="" class="text-2xl">Country </label>
                <input type="text" name="country" required placeholder="" class="w-full border p-2 rounded">
            </div>
            <div >
                <label for="" class="text-2xl">Email </label>
                <input type="email" name="email" required placeholder="" class="w-full border p-2 rounded">
            </div>
            <div >
                <label for="" class="text-2xl">Name </label>
                <input type="text" name="name" placeholder="" class="w-full border p-2 rounded">
            </div><br>
            
            <button class="bg-butBlue h-10 w-25 rounded-md text-white"><input type="submit" name="next" value="Next"></button>

        </form>
        
    </div>




<?php 
//echo $id;
if(isset($_POST['next'])){
    $org = $_POST['org'];
    $dpt = $_POST['dpt'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    echo $org,$dpt,$country,$email,$name;
    $quere = "insert into submitform_2 (id,organization,department,country,name,email) values('$id','$org','$dpt','$country','$name','$email')";
    $data = mysqli_query($connection,$quere) ;
    if($data){
        //echo "MySQL Error: " . mysqli_error($connection);
        header('Location: http://localhost/rbgi/src/submit_form3.php');
        //exit;
    }
    else{
        ?>
        <script type="text/javascript">
            alert("Please try again");
        </script>
        <?php
    }
}
require_once "footer.php";
?>
</body>
</html>

