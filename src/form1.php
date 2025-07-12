
<?php 
require_once "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RBGI</title>
    <link href="./output.css" rel="stylesheet">
</head>
<body>

    <div class="bg-background p-10 shadow-xl">
        <form action="form2.php" method="">
            <label for="" class="text-butBlue font-bold text-2xl">What type of sequence data do you have?<br><br>
            </label>
            <input type="radio" name="s_type" value="1" style="margin-right: 8px;">SARS-CoV-2<br>
            <input type="radio" name="s_type" value="2" style="margin-right: 8px;">Ribosomal RNA (rRNA) or rRNA-ITS<br>
            <input type="radio" name="s_type" value="3" style="margin-right: 8px;">Metazoan (multicellular animal) COX1<br>
            <input type="radio" name="s_type" value="4" style="margin-right: 8px;">Eukaryotic nuclear mRNA<br>
            <input type="radio" name="s_type" value="5" style="margin-right: 8px;">Influenza virus<br>
            <input type="radio" name="s_type" value="6" style="margin-right: 8px;">Norovirus<br>
            <input type="radio" name="s_type" value="7" style="margin-right: 8px;">Dengue virus<br>
            <input type="radio" name="s_type" value="8" style="margin-right: 8px;">Eukaryotic and Prokaryotic Genomes (WGS or Complete)<br>
            <input type="radio" name="s_type" value="9" style="margin-right: 8px;">Transcriptome Shotgun Assembly (TSA)<br>
            <input type="radio" name="s_type" value="10" style="margin-right: 8px;">Unassembled sequence reads (SRA)<br>
            <input type="radio" name="s_type" value="11" style="margin-right: 8px;">Others<br><br>
            <button class="bg-butBlue h-10 w-25 rounded-md text-white"><input type="submit" name="next" value="Next"></button>

        </form>
    </div>
</body>
</html>

<?php 
require_once "footer.php"
?>