<?php 
require_once "dbconnect.php";
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./output.css" rel="stylesheet">
</head>
<body>
    <?php 
    require_once "navbar.php";
    ?>
    
    <div class="m-10 text-center">
        <table class="border-2 w-full">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Institute</th>
            <th>Department</th>
            <th>Contact</th>
            <th>Photo</th>
            <th>T_submit</th>
            <th>action</th>
        </tr>
        <?php 
        $quere = "select * from account";
        $data = mysqli_query($connection,$quere);
        $number_of_row = mysqli_num_rows($data);
        
        echo '<h1 class="text-2xl" >';
            echo "Total user  are : ".$number_of_row;
        echo "</h1>";


        if($number_of_row){
            while($row = mysqli_fetch_array($data)){
                $id  = $row['id'];
                //echo $id;
                $_SESSION['id'] = $id;
                $email = $row['email'];
                $name = $row['name'];
                $dob = $row['dob'];
                $gender = $row['gender'];
                $institute = $row['institute'];
                $department = $row['department'];
                $contact = $row['phone'];
                $photo = "../image/".$row['photo'];
                $quere1 = "select * from submitform_1 where id = '$id'";
                $data1 = mysqli_query($connection,$quere1);
                $number_of_row1 = mysqli_num_rows($data1);

                ?>
                <tr>
                    <td>
                        <?php echo $name ?>
                    </td>
                    <td>
                        <?php echo $email ?>
                    </td>
                    <td>
                        <?php echo $gender?>
                    </td>
                    <td>
                        <?php echo $institute ?>
                    </td>
                    <td>
                        <?php echo $department?>
                    </td>
                    <td>
                        <?php echo $contact?>
                    </td>
                    <td>
                        <img src="<?php echo $photo ?>" alt="" class="size-10">
                    </td>
                    <td>
                        <?php echo $number_of_row1?>
                    </td>
                    <td>
                        <a href="profile.php?id=<?php echo $id ?>">View</a>
                    </td>
                </tr>
                <?php
            }
        }
        else{
            echo "no record found";
        }
        ?>

        </table>
    </div>




    <?php 
    require_once "footer.php"
    ?>
</body>
</html>