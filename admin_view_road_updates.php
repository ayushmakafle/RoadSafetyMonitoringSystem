<h3 class="text-center text-primary">Road Condition Updates</h3>
<table class="table table-bordered mt-5">
    <thead >
    <tr>
        <th class="text-primary text-center">SNo.</th>
        <th class="text-primary text-center">Location</th>
        <th class="text-primary text-center">Image</th>
        <th class="text-primary text-center">Image</th>
        <th class="text-primary text-center">Image</th>
        <th class="text-primary text-center">Description</th>
        <th class="text-primary text-center">Date</th>
        <th class="text-primary text-center">Source</th>
        <th class="text-primary text-center">Edit</th>
        <th class="text-primary text-center">Delete</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $get_updates="SELECT * from `roadconditionupdates` ORDER BY Timestamp DESC";
        $result=mysqli_query($conn,$get_updates);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $update_id=$row['UpdateID'];
            $Location=$row['Location'];
            $road_update_image1=$row['road_update_image1'];
            $road_update_image2=$row['road_update_image2'];
            $road_update_image3=$row['road_update_image3'];

            $Description=$row['Description'];
            $date=$row['Timestamp'];
            $Source=$row['Source'];
            $number++;
            ?>
            <tr class='text-center' >
            <td class=''><?php echo $number?></td>
            <td> <?php echo $Location?></td>
            <td> <img src='road_update_images/<?php echo $road_update_image1;?>' class='product_img'/></td>
            <td> <img src='road_update_images/<?php echo $road_update_image2;?>' class='product_img'/></td>
            <td> <img src='road_update_images/<?php echo $road_update_image3;?>' class='product_img'/></td>

            <td><?php echo $Description?></td>
            <td> <?php echo $date?></td>
            <td> <?php echo $Source?></td>
            <td><a href='admin_index.php?edit_road_update=<?php echo $update_id ?>' class=''> 
            <i class='fa-solid fa-pen-to-square'></a></td>
            <td><a href='admin_index.php?delete_road_update=<?php echo $update_id ?>' class=''>
            <i class='fa-solid fa-trash'></a></td>        
        </tr>
        <?php
        }
        ?>
     
    </tbody>
</table>