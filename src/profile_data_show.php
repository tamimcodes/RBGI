

<?php 
    $quere = "SELECT * FROM submitform_1 where id = $id";
    $data = mysqli_query($connection,$quere);
    //print_r($data)
    $number_of_row = mysqli_num_rows($data);
    if($number_of_row){
        ?>

        <div class="w-full bg-white rounded-lg shadow-md">
            <table class="w-full divide-y divide-gray-200">
                <tr class="text-2xl">
                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Contain</th>
                    <th colspan="3" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
                <?php 
                while($row = mysqli_fetch_array($data)){
                    $new_id = $row['guid'];
                    $title = $row['title'];
                    $contain = $row['contain'];
                    ?>
                    <div>
                    <tr class="">
                        <td class="text-gray-900 text-center"><?php echo $title ?></td>
                        <td class="text-gray-900 text-center"><?php echo $contain ?></td>
                        <td class="text-gray-900 text-center">
                        <a href="view.php?new_id=<?php echo $new_id ?>"><button class="bg-butBlue text-background rounded-md w-30 h-10">View</button></a>
                        </td>
                        <td class="text-gray-900 text-center">
                        <a href="edit_submition.php?new_id=<?php echo $new_id?>"><button class="bg-butBlue text-background rounded-md w-30 h-10">Edit</button></a>
                        </td>
                        <td class="text-gray-900 text-center ">
                        <a href="delete_submition.php?new_id=<?php echo $new_id ?>"><button class="bg-red-500 text-background rounded-md w-30 h-10">Delete</button></a>
                        </td>
                    </tr>
                    <tr>
                        <td><h1 style="opacity: 0;">jhgjhgh</h1></td>
                    </tr>
                    </div>
                    <?php
                }
                ?>
            </table>
        </div>

        <?php
        
    }else{
        echo "You have not Submit any data";
    }
?>

<?php 
?>