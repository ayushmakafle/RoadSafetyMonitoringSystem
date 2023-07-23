<?php
if(isset($_GET['edit_road_update'])){
    $edit_id=$_GET['edit_road_update'];
    $get_data="SELECT * FROM `roadconditionupdates`where UpdateID=$edit_id";
    $result=mysqli_query($conn,$get_data);
    $row=mysqli_fetch_assoc($result);
    $Location=$row['Location'];
    $road_update_image1=$row['road_update_image1'];
    $road_update_image2=$row['road_update_image2'];
    $road_update_image3=$row['road_update_image3'];
    $Description=$row['Description'];
    $date=$row['Timestamp'];
    $Source=$row['Source']; 
}


?>
<div class="container mt-5">
    <h1 class="text-center text-primary">Edit Road Update</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="location" class="form-label"> Location</label>
            <input type="text" id="location" value="<?php echo $Location?>" name="location" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="description" class="form-label">Description</label>
            <input type="text" id="description"  value="<?php echo $Description?>" name="description" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="date" class="form-label"> Date</label>
            <input type="text" id="date" value="<?php echo $date?>" name="date" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="road_update_image1" class="form-label">Image</label>
            <div class="d-flex">
                <input type="file" id="road_update_image1" name="road_update_image1" class="form-control w-50 m-auto" >
                <img src="road_update_images/<?php echo $road_update_image1?>" alt="" style="width: 100px;object-fit">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="road_update_image2" class="form-label">Image</label>
            <div class="d-flex">
                <input type="file" id="road_update_image2" name="road_update_image2" class="form-control w-50 m-auto" >
                <img src="road_update_images/<?php echo $road_update_image2?>" alt="" style="width: 100px;object-fit">
            </div>
        </div> <div class="form-outline w-50 m-auto mb-4">
            <label for="road_update_image3" class="form-label">Image</label>
            <div class="d-flex">
                <input type="file" id="road_update_image3" name="road_update_image3" class="form-control w-50 m-auto" >
                <img src="road_update_images/<?php echo $road_update_image3?>" alt="" style="width: 100px;object-fit">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="source" class="form-label"> Source </label>
            <input type="text" id="source" value="<?php echo $Source?>" name="source" class="form-control" required="required">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_update" value="Update" class="btn btn-primary px-3 mb-3">
        </div>
    </form>
</div>
<!--editing-->
<?php
if(isset($_POST['edit_update'])){
    $Location=$row['Location'];
    $road_update_image1=$row['road_update_image1']['name']; 
    $road_update_image2=$row['road_update_image2']['name']; 
    $road_update_image3=$row['road_update_image3']['name']; 
    $Description=$row['Description'];
    $date=$row['Timestamp'];
    $Source=$row['Source'];
    $temp_image1=$_FILES['road_update_image1']['tmp_name'];
    $temp_image2=$_FILES['road_update_image2']['tmp_name'];
    $temp_image3=$_FILES['road_update_image3']['tmp_name'];

        move_uploaded_file($temp_image1,"./road_update_images/$road_update_image1");
        move_uploaded_file($temp_image2,"./road_update_images/$road_update_image2");
        move_uploaded_file($temp_image3,"./road_update_images/$road_update_image3");

        $update_product="UPDATE `roadconditionupdates` set
        Location='$Location',
        Description='$Description',
        Timestamp=NOW();
        Source='$Source',
        road_update_image1='$road_update_image1',
        road_update_image2='$road_update_image2',
        road_update_image3='$road_update_image3',
        where UpdateID=$edit_id;
        ";
        $result_update=mysqli_query($conn,$update_product);
        if($result_update){
            echo"<script>alert('condition updated')</script>";
            echo"<script>window.open('./admin_view_road_updates.php','_self')</script>";
        }
    }
?>