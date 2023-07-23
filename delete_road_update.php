<?php
if(isset($_GET['delete_road_update'])){
    $delete_road_update=$_GET['delete_road_update'];

    $delete_query="DELETE from `roadconditionupdates` where UpdateID=$delete_road_update";
    $result=mysqli_query($conn,$delete_query);
    if($result){
        echo "<script>alert('Road Condition Deleted')</script>";
        echo "<script>window.open('./admin_index.php?admin_view_road_updates','_self')</script>";
    }
}

?>