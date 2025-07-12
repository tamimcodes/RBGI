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
$file = $row4['file'];
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
    <div class="flex flex-col items-center bg-secondary p-4 rounded-2xl">
        <h1 class="font-bold text-4xl text-butBlue">Submission Type</h1><br>
        <table class="w-full text-center text-2xl">
            <tr>
                <td>Title</td>
                <td><?php echo $title?></td>
            </tr>
            <tr>
                <td>Type of organism or material </td>
                <td><?php echo $type?></td>
            </tr>
            <tr>
                <td>Sequences contain</td>
                <td><?php echo $contain?></td>
            </tr>
        </table>
    </div><br>

    <div class="flex flex-col items-center bg-secondary p-4 rounded-2xl">
        <h1 class="font-bold text-4xl text-butBlue">Submitter</h1><br>
        <table class="w-full text-center text-2xl">
            <tr>
                <td>Submitting organization</td>
                <td><?php echo $organization?></td>
            </tr>
            <tr>
                <td>Department </td>
                <td><?php echo $department?></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><?php echo $country?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $email?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo $name?></td>
            </tr>
        </table>
    </div><br>

    <div class="flex flex-col items-center bg-secondary p-4 rounded-2xl">
        <h1 class="font-bold text-4xl text-butBlue">Sequencing Technology</h1><br>
        <table class="w-full text-center text-2xl">
            <tr>
                <td>Method</td>
                <td><?php echo $method?></td>
            </tr>
            <tr>
                <td>Assembly state</td>
                <td><?php echo $state?></td>
            </tr>
        </table>
    </div><br>

    <div class="flex flex-col items-center bg-secondary p-4 rounded-2xl">
        <h1 class="font-bold text-4xl text-butBlue">Sequences</h1><br>
        <table class="w-full text-center text-2xl">
            <tr class="w-1/2">
                <td>Check and remove low-quality and chimeric sequences from your FASTA file prior to preparing this submission</td>
                <td><?php echo $low?></td>
            </tr>
            <tr>
                <td>Cultured or uncultured</td>
                <td><?php echo $obtain?></td>
            </tr>
            <tr>
                <td>Primer type</td>
                <td><?php echo $primer?></td>
            </tr>
            <tr>
                <td>Large scale study</td>
                <td><?php echo $scale?></td>
            </tr>
        </table>
    </div><br>
    <div class="text-center">
    <a href="view_sequennce.php?new_id=<?php echo $new_id ?>">
        <button class="bg-butBlue text-background rounded-md w-50 h-10 inline-block">
            View Sequence
        </button>
    </a>
</div><br>
</div>

<?php 
require_once "footer.php";
?>
</body>
</html>