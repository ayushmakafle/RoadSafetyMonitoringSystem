<?php
include('dbconnect.php');
if (isset($_POST['insert_update'])) {
    $location=$_POST['location'];
    $description=$_POST['description'];
    $source= 'Server';
    //accessing images
    $road_update_image1=$_FILES['road_update_image1']['name'];
    $road_update_image2=$_FILES['road_update_image2']['name'];
    $road_update_image3=$_FILES['road_update_image3']['name'];
    //accessing timage tmp name
    $temp_image1=$_FILES['road_update_image1']['tmp_name'];
    $temp_image2=$_FILES['road_update_image2']['tmp_name'];
    $temp_image3=$_FILES['road_update_image3']['tmp_name'];
    //empty condition
    if($location=='' or $description=='' or $road_update_image1==''){
        echo"<script>alert('Please fill Location and Description. Give atleast one image.')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"road_update_images/$road_update_image1");
        move_uploaded_file($temp_image2,"road_update_images/$road_update_image2");
        move_uploaded_file($temp_image3,"road_update_images/$road_update_image3");

        //insert query
        $insert_update = "INSERT INTO `roadconditionupdates` 
        (Location, Description, Source, Timestamp, road_update_image1, road_update_image2,road_update_image3) VALUES
        ('$location', '$description', '$source', NOW(), '$road_update_image1', '$road_update_image2','$road_update_image3')";
        $result_query=mysqli_query($conn,$insert_update);
        if($result_query){
            echo"<script>alert('succesfully inserted road update')</script>";
        }
    }
}
?>
    <div class="container mt-3">
    <h3 class="text-center text-primary">Insert Road Condition Update</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <!--title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="location" class="form-label">Location*</label>
                <input type="text" name="location" 
                id="location" class="form-control"
                placeholder="Enter Location" 
                autocomplete="off" required="required">
            </div>
            <!--description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Description*</label>
                <input type="text" name="description" 
                id="description" class="form-control"
                placeholder="Enter Description" autocomplete="off" required="required">
            </div>
            <!--image1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="road_update_image1" class="form-label">
                    Image*</label>
                <input type="file" name="road_update_image1" 
                id="road_update_image1" class="form-control" required="required">
            </div>
            <!--image2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="road_update_image2" class="form-label">
                    Image</label>
                <input type="file" name="road_update_image2" 
                id="road_update_image2" class="form-control">
            </div>
            <!--image3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="road_update_image3" class="form-label">
                    Image</label>
                <input type="file" name="road_update_image3" 
                id="road_update_image3" class="form-control">
            </div>
            <!--submit-->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_update"
                class="btn btn_info mb-3 p-3 bg-info" value="Insert Update">
            </div>


        </form>    
    </div>
