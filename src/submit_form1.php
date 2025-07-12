
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
            <h1 class="font-bold text-4xl">Submission Type : </h1><br>
            <a href="profile.php"><button class="bg-butBlue text-background rounded-md w-25 h-10">Previous</button></a>
        </div>
        <form action="" method="POST">
            <div>
            <label for="" class="text-butBlue font-bold text-2xl">What type of organism or material did you sequence?<br><br>
            </label>
            <input type="radio" name="s_type" value="Prokaryote" style="margin-right: 8px;">Prokaryote<br>
            <input type="radio" name="s_type" value="Eukaryote" style="margin-right: 8px;">Eukaryote<br>
            <input type="radio" name="s_type" value="Virus" style="margin-right: 8px;">Virus<br>
            <input type="radio" name="s_type" value="Synthetic construct" style="margin-right: 8px;">Synthetic construct<br>
            <input type="radio" name="s_type" value="Others" style="margin-right: 8px;">Others<br><br>
            </div>

            <div>
                <label for="" class="text-butBlue font-bold text-2xl">What do your sequences contain?<br><br>
                </label>
                <input type="radio" name="s_contain" value="small subunit rRNA only (16S rRNA)" style="margin-right: 8px;">small subunit rRNA only (16S rRNA)<br>
                <input type="radio" name="s_contain" value="large subunit rRNA only (23S rRNA)" style="margin-right: 8px;">large subunit rRNA only (23S rRNA)<br>
                <input type="radio" name="s_contain" value="intergenic spacer (16S-23S rRNA IGS)" style="margin-right: 8px;">intergenic spacer (16S-23S rRNA IGS)<br>
                <input type="radio" name="s_contain" value="Others" style="margin-right: 8px;">Others<br><br>
            </div>
                
            <div>
                <label for="" class="text-butBlue font-bold text-2xl">Enter Title <br><br>
                </label>
                <input type="text" name="title" required placeholder=" your title...." class="w-full border p-2 rounded">
            </div> <br>

            
            <button class="bg-butBlue h-10 w-25 rounded-md text-white"><input type="submit" name="next" value="Next"></button>

        </form>
        
    </div>




<?php 
//echo $id;
if(isset($_POST['next'])){
    $type = $_POST['s_type'];
    $content = $_POST['s_contain'];
    $title = $_POST['title'];
    //echo $type,$content,$title;
    $quere = "insert into submitform_1 (id,type,contain,title) values('$id','$type','$content','$title')";
    $data = mysqli_query($connection,$quere);
    if($data){
        //echo "MySQL Error: " . mysqli_error($connection);
        header('Location: http://localhost/rbgi/src/submit_form2.php');
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

