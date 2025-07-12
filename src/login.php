<?php 
require_once "dbconnect.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="./output.css" rel="stylesheet">
</head>
<body>
    <section class="bg-background min-h-screen flex items-center justify-center">
        <div class="container max-w-3xl bg-secondary flex p-4 rounded-2xl shadow-2xl">
            <!--------------log in start left sidr --------------------->
            <div class="w-1/2 p-5">
                <h1 class="text-center text-3xl text-butBlue pb-2">Log in</h1>
                <p class="text-center pb-6">if you alrady have an account</p>

                <!----------form start---------------->
                <form action="" method="POST" class="flex flex-col gap-2">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="  abc@gmail.com" class="bg-background rounded-md h-10 border-2">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="" placeholder="  password" class="bg-background rounded-md h-10 border-2">
                    
                    <input type="submit" name="submit_btn" value="Login" class="bg-butBlue h-10 text-background rounded-md font-bold">
                </form>
                <!----------form end---------------->

                <div class="grid grid-cols-3 items-center m-10 text-gray-500">
                    <hr class="border-gray-500">
                    <p class="text-center">OR</p>
                    <hr class="border-gray-500">
                </div>
                <!--------create account- start-------->
                <div>
                    <p>Do not have an account ?</p>
                    <div class="flex justify-between">
                    <a href="create_account.php"><button class="text-butBlue">create account ></button></a>
                    <a href="index.php"><button class="text-butBlue">home</button></a>
                    </div>
                </div>
                <!--------create account- end-------->

            </div>
            <!--------------log in end left side --------------------->
            

            <!---------------what is rgbi start--------->
            <div class="w-1/2 text-center p-5 bg-background rounded-xl flex flex-col items-center">
                <h1 class="font-bold text-2xl text-butBlue pb-10">what is RGBI ?</h1>
                <p class="">It is a GeneBank where you can store biological infomation.
                    It also provide space for bioinfomatican to showcase there inovative tools 
                    which can be used for research applicarion.
                </p>
            </div>
            <!---------------what is rgbi end--------->

        </div>
    </section>

    <?php 
    if (isset($_POST['submit_btn'])){
        $email = $_POST['email'];
        //echo $email;
        $password = $_POST['password'];
        //echo $password;
        $quere = "select * from account where email='$email' and password ='$password'";
        $data = mysqli_query($connection,$quere);
        //print_r($data);
        $result = mysqli_num_rows($data);
        if($result){
            $row = mysqli_fetch_array($data);
            $id = $row['id'];
            //echo $id;
            $_SESSION['id'] = $id;
            header("Location:profile.php");
            ?>
            <!-- <script type="text/javascript">
                alert("Login successfully");
                window.open("http://localhost/rbgi/src/profile.php","_self");
            </script> -->
            <?php
        }
        else{
            ?>
            <script type="text/javascript">
                alert("Please try again!");
                window.open("http://localhost/rbgi/src/index.php","_self");
            </script>
            <?php
        }
    }
    ?>
</body>
</html>
