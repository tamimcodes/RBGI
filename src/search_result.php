<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search reasult</title>
    <link href="./output.css" rel="stylesheet">
</head>
<body>
    
<?php 
require_once "header.php";
require_once "dbconnect.php";

if(isset($_POST['search_btn'])){
    $search = $_POST['search'];
    echo $search;

}
else{
    ?>
        <script type="text/javascript">
            alert("Please try again!");
            window.open("http://localhost/rbgi/src/index.php","_self");
        </script>
    <?php
}

require_once "footer.php";

?>

</body>
</html>