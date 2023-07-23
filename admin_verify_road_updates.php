<!--connect file-->
<?php
  include('dbconnect.php');
?>
<h3 class="text-center text-primary">User Road Condition Updates</h3>
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
        <th class="text-primary text-center">Source Contact</th>
        <th class="text-primary text-center">Accept</th>
        <th class="text-primary text-center">Delete</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $get_user_updates="SELECT * from `roadreport` ORDER BY created_at DESC";
        $rresult=mysqli_query($conn,$get_user_updates);
        $rnumber=0;
        while($row=mysqli_fetch_assoc($rresult)){
            $reportid=$row['reportid'];
            $updatelocation=$row['updatelocation'];
            $roadimage1=$row['roadimage1'];
            $roadimage2=$row['roadimage2'];
            $roadimage3=$row['roadimage3'];
            $roadcondition=$row['roadcondition'];
            $created_at=$row['created_at'];
            $updatereporter=$row['updaterepoter'];
            $updatereportercontact=$row['updaterepotercontact'];
            $rnumber++;
            ?>
            <tr class='text-center' >
            <td class=''><?php echo $rnumber?></td>
            <td> <?php echo $updatelocation?></td>
            <td> <img src='user_road_update_images/<?php echo $roadimage1;?>' class='product_img'/></td>
            <td> <img src='user_road_update_images/<?php echo $roadimage2;?>' class='product_img'/></td>
            <td> <img src='user_road_update_images/<?php echo $roadimage3;?>' class='product_img'/></td>

            <td><?php echo $roadcondition?></td>
            <td> <?php echo $created_at?></td>
            <td> <?php echo $updatereporter?></td>
            <td> <?php echo $updatereportercontact?></td>

            <td><a href='admin_index.php?accept_road_updates=<?php echo $reportid ?>' class=''> 
            <i class="fa-solid fa-check"></i></a></td>
            <td><a href='admin_index.php?delete_user_road_update=<?php echo $reportid ?>' class=''>
            <i class='fa-solid fa-trash'></a></td>        
        </tr>
        <?php
        }
        ?>
     
    </tbody>
</table>