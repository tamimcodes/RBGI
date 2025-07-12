<?php 
require_once "dbconnect.php";
require_once "navbar.php";
$new_id = $_GET['new_id'];
echo $new_id;

$quere4 = "select * from submitform_4 where guid = '$new_id'";
$data4 = mysqli_query($connection,$quere4);
$row4 = mysqli_fetch_array($data4);
$low = $row4['low'];
$obtain = $row4['obtain'];
$primer = $row4['primer'];
$scale = $row4['scale'];
$file = $row4['file'];
echo $file
?>


<?php

function readFasta($filePath) {
    $sequences = [];
    $currentHeader = '';
    $currentSequence = '';

    $handle = fopen($filePath, "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $line = trim($line);
            if (empty($line)) {
                continue;
            }
            if ($line[0] === '>') {
                if ($currentHeader !== '') {
                    $sequences[$currentHeader] = $currentSequence;
                }
                $currentHeader = substr($line, 1);
                $currentSequence = '';
            } else {
                $currentSequence .= $line;
            }
        }
        if ($currentHeader !== '') {
            $sequences[$currentHeader] = $currentSequence;
        }
        fclose($handle);
    } else {
        echo "<p class='text-red-500 font-bold'>Error opening file: " . htmlspecialchars($filePath) . "</p>\n";
    }
    return $sequences;
}

$fastaFile = "../files/".$file;
$fastaData = readFasta($fastaFile);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FASTA Data</title>
    <link href="./output.css" rel="stylesheet">

</head>
<body class="bg-gray-100 p-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">FASTA Sequences</h1>
        <?php if (!empty($fastaData)): ?>
            <ul class="space-y-4">
                <?php foreach ($fastaData as $header => $sequence): ?>
                    <li class="border rounded-md p-4">
                        <h2 class="font-semibold text-lg text-blue-700"><?= htmlspecialchars($header) ?></h2>
                        <p class="text-sm text-gray-700 break-words"><?= htmlspecialchars($sequence) ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-gray-600">No sequences found.</p>
        <?php endif; ?>
    </div>
</body>
</html>