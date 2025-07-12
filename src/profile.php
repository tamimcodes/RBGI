<?php 
require_once "dbconnect.php";
session_start();
$id = $_GET['id'];
if(!$id){
    $id = $_SESSION['id'];
}
//$id = $_SESSION['id'];
$quere = "select * from account where id = '$id'";
$data = mysqli_query($connection,$quere);
$row = mysqli_fetch_array($data);
$email = $row['email'];
$name = $row['name'];
$dob = $row['dob'];
$gender = $row['gender'];
$institute = $row['institute'];
$department = $row['department'];
$contact = $row['phone'];
$photo = "../image/".$row['photo'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="./output.css" rel="stylesheet">
</head>
<body>
    <!---------header start----------------->
    <?php 
        require_once "navbar_profile.php";
    ?>
    <!---------header end----------------->


    <!----------------------top part start----------->
        <section class="bg-secondary p-4">
        <div class="bg-white rounded-2xl shadow-lg w-full max-w-4xl flex ">
    
    <!-- Left Side: User Info -->
    <div class="w-2/3 p-4 flex flex-col items-center">
        <div class="flex flex-col items-center text-center p-6">
            <h2 class="text-4xl font-bold text-gray-800 mb-2"><?= $name ?></h2>
                <div>
                    <p class="text-indigo-100"><?= $email ?></p>
                    <p class="text-indigo-100 mb-2"><?= $contact ?></p>
                </div>
        </div>

      <div class="space-y-3 text-gray-700 text-base">
        <p><span class="font-semibold">Date of Birth:</span> <?= $dob ?></p>
        <p><span class="font-semibold">Gender:</span> <?= $gender ?></p>
        <p><span class="font-semibold">Institute:</span> <?= $institute ?></p>
        <p><span class="font-semibold">Department:</span> <?= $department ?></p>
      </div>
    </div>

    <!-- Right Side: User Image -->
    <div class="w-1/3 bg-indigo-100 flex items-center justify-center p-4">
      <img src="<?= $photo ?>" alt="User Photo" width="100px" class="rounded-xl object-cover w-full max-h-80 shadow-md">
    </div>

  </div>
        </section>
    <!----------------------top part end ----------->

    <!--------profile navbar start------------->
    <section class="bg-secondary p-4 flex justify-around">
        <div>
            <h1 class="text-4xl text-butBlue">Your submition are showing below </h1>
        </div>
    </section>
    <!--------profile navbar start------------->

    <!---------data show--------------------->
        <?php 
            require_once "profile_data_show.php";
        ?>
    <!-----------data show end--------------->


    </div>

    <!--------------footer start ---------------->
    <?php 
        require_once "footer.php";
        //echo $id,$name,$email,$photo;

    ?>
    <!--------------footer end ---------------->



</body>
</html>



