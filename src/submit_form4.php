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
    <title>Sequenc</title>
    <link href="./output.css" rel="stylesheet">
</head>
<body>


<?php 
require_once "navbar.php";
?>

<div class="bg-background p-10 shadow-xl">
    <div class="flex justify-between">
        <h1 class="font-bold text-4xl">Sequences : </h1><br>
        <a href="submit_form3.php"><button class="bg-butBlue text-background rounded-md w-25 h-10">Previous</button></a>
    </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <!-----<div>
                <label for="" class="font-bold text-2xl">Release date</label><br>
                <label for="" class="text-butBlue font-bold text-2xl">When should this submission be released to the public?<br><br>
                </label>
                <input type="radio" name="s_type" value="1" style="margin-right: 8px;">Release following processing<br>
                <input type="radio" name="s_type" value="2" style="margin-right: 8px;">Release on specified date or upon publication, whichever is first<br><br>
            </div>----->

            <div>
                <label for="" class="font-bold text-2xl">Chimera check</label><br>
                <label for="" class="text-butBlue font-bold text-2xl"> Did you check and remove low-quality and chimeric sequences from your FASTA file prior to preparing this submission?<br><br>
                </label>
                <input type="radio" name="low" value="Yes" style="margin-right: 8px;">Yes<br>
                <input type="radio" name="low" value="No" style="margin-right: 8px;">No<br><br>
            </div>
            
            <div>
                <label for="" class="font-bold text-2xl">Cultured or uncultured</label><br>
                <label for="" class="text-butBlue font-bold text-2xl">Bacterial/archaeal Sequences: How were they obtained? <br><br>
                </label>
                <input type="radio" name="obtain" value="Pure-cultured strains" style="margin-right: 8px;">Pure-cultured strains (axenic cultures containing only one microbial species each)<br>
                <input type="radio" name="obtain" value="Uncultured, bulk environmental DNA" style="margin-right: 8px;">Uncultured, bulk environmental DNA (PCR-amplified directly from environmental sample or host; samples were not grown in culture)<br><br>
            </div>

            <div>
                <label for="" class="font-bold text-2xl">Primer type</label><br>
                <label for="" class="text-butBlue font-bold text-2xl">What type of primers were used to amplify your samples? <br><br>
                </label>
                <input type="radio" name="primer" value="Universal primers" style="margin-right: 8px;">Universal primers<br>
                <input type="radio" name="primer" value="Species-specific primers" style="margin-right: 8px;">Species-specific primers<br>
                <input type="radio" name="primer" value="Not amplified with primers" style="margin-right: 8px;">Not amplified with primers<br><br>
            </div>

            <div>
                <label for="" class="font-bold text-2xl">Large scale study</label><br>
                <label for="" class="text-butBlue font-bold text-2xl">Are these sequences part of a large scale study of rRNA isolated from one or more environmental source?<br><br>
                </label>
                <input type="radio" name="scale" value="Yes" style="margin-right: 8px;">Yes<br>
                <input type="radio" name="scale" value="No" style="margin-right: 8px;">No<br><br>
            </div>

            <!---------sectiomn for submiting sequence--------->
            <div>
                <label for="" class="font-bold text-2xl">Sequences</label><br>
                <label for="" class="text-butBlue font-bold text-2xl">Upload your sequence.<br><br>
                </label>
                <div class="mb-4">
                <label for="file_upload" class="block text-gray-700 text-sm font-bold mb-2">
                    Choose a text File:
                </label>
                <input type="file" name="file_upload" id="file_upload" class="border rounded w-full py-2 px-3 text-gray-700">
            </div>
            </div>

            
            <button class="bg-butBlue h-10 w-25 rounded-md text-white"><input type="submit" name="submit" value="Submit"></button>

        </form>
        
    </div>
    


<?php 
//echo $id;
if(isset($_POST['submit'])){
    $low = $_POST['low'];
    $obtain = $_POST['obtain'];
    $primer = $_POST['primer'];
    $scale = $_POST['scale'];
    //$file = $_FILES['file_upload'];
    $file_name = $_FILES['file_upload']['name'];
    $tmp_name = $_FILES['file_upload']['tmp_name'];
    //echo $low,$obtain, $primer ,$scale ,"     ",$file_name,"      ",$tmp_name ;
    // echo "<pre>";
    // print_r($file);
    // echo "</pre>";
    $destination = "/opt/lampp/htdocs/rbgi/files/".$file_name;
    //echo $destination;
    move_uploaded_file($tmp_name,$destination);
    $quere = "insert into submitform_4 (id,low,obtain,primer,scale,file) values('$id','$low','$obtain','$primer','$scale','$file_name')";
    $data = mysqli_query($connection,$quere);
    $pythonScriptPath = '/opt/lampp/htdocs/rbgi/src/file.py';
    $filename = $file_name;
    $escapedArgument = escapeshellarg($filename);
    $command = escapeshellcmd("python3 {$pythonScriptPath} {$escapedArgument}");
    shell_exec($command); 
    
    if($data){
            ?>
            <script type="text/javascript">
                alert("Submit successfully");
                window.open("http://localhost/rbgi/src/profile.php","_self");
            </script>
            <?php
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

