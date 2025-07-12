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
    <title>Sequencing Technology</title>
    <link href="./output.css" rel="stylesheet">
</head>

<body>
    <?php
    require_once "navbar.php";
    ?>

    <div class="bg-background p-10 shadow-xl">
        <div class="flex justify-between">
            <h1 class="font-bold text-4xl">Sequencing Technology : </h1><br>
            <a href="submit_form2.php"><button class="bg-butBlue text-background rounded-md w-25 h-10">Previous</button></a>
        </div>
        <form action="" method="POST">
            <div>
                <label for="" class="font-bold text-2xl">Method</label><br>
                <label for="" class="text-butBlue font-bold text-2xl">What methods were used to obtain these sequences?<br><br>
                </label>
                <input type="radio" name="method" value="454" style="margin-right: 8px;">454<br>
                <input type="radio" name="method" value="Helicos" style="margin-right: 8px;">Helicos<br>
                <input type="radio" name="method" value="Virus" style="margin-right: 8px;">Virus<br>
                <input type="radio" name="method" value="Illumina" style="margin-right: 8px;">Illumina<br>
                <input type="radio" name="method" value="IonTorrent" style="margin-right: 8px;">IonTorrent<br>
                <input type="radio" name="method" value="Pacific Biosciences" style="margin-right: 8px;">Pacific Biosciences<br>
                <input type="radio" name="method" value="SOLiD" style="margin-right: 8px;">SOLiD<br>
                <input type="radio" name="method" value="Others" style="margin-right: 8px;">Others<br><br>
            </div>

            <div>
                <label for="" class="font-bold text-2xl">Assembly state</label><br>
                <label for="" class="text-butBlue font-bold text-2xl">These sequences are:<br><br>
                </label>
                <input type="radio" name="state" value="Unassembled sequence reads" style="margin-right: 8px;">Unassembled sequence reads<br>
                <input type="radio" name="state" value="Assembled sequences" style="margin-right: 8px;">Assembled sequences (each sequence was assembled from two or more overlapping sequence reads)<br>
            </div><br>

            
            <button class="bg-butBlue h-10 w-25 rounded-md text-white"><input type="submit" name="next" value="Next"></button>

        </form>

    </div>


    <?php
    //echo $id;
    if(isset($_POST['next'])){
    $method = $_POST['method'];
    $state = $_POST['state'];
    //echo $method,$state;
    $quere = "insert into submitform_3 (id,method,state) values('$id','$method','$state')";
    $data = mysqli_query($connection,$quere);
    if($data){
        //echo "MySQL Error: " . mysqli_error($connection);
        header('Location: http://localhost/rbgi/src/submit_form4.php');
        exit;
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