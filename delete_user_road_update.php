<?php
if(isset($_GET['delete_user_road_update'])){
    $delete_user_road_update=$_GET['delete_user_road_update'];

    $delete_query="DELETE from `roadreport` where reportid=$delete_user_road_update";
    $result=mysqli_query($conn,$delete_query);
    if($result){
        echo "<script>alert('Road Condition Deleted')</script>";
        echo "<script>window.open('./admin_index.php?admin_verify_road_updates','_self')</script>";
    }
}

?>