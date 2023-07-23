<!--connect file-->
<?php
  include('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
     <!--Bootstrap css-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--fontawesone-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

    <style>
        body{
            overflow-x: hidden;
        }
        .product_img{
            width: 100%;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <!--navbar-->
    <header class="header">
    <nav class="navbar">
      <div class="navbar-logo">
        <img src="image/n.png" alt="Logo">
      </div>
      <ul class="navbar-menu">
        <h2>Road Safety Monitoring System</h2>
      </ul>
      <div class="navbar-flag">
        <img src="image/nepalflag.gif" alt="Nepal Flag">
      </div>
      </nav>
    </header>
   
    <!--nav end-->
    <div >
        <h3 class="text-center p-2">Admin Panel</h3>
    </div>
    <div class="col">
        <div class="col-md-12 p-1 align-items-center">
            <div class="p-3">
            </div>
            <div class="button text-center">
                <button><a href="admin_index.php?admin_view_road_updates" class="nav-link text-dramatic m-1">
                    View Road Updates</a></button>
                <button><a href="admin_index.php?admin_insert_road_updates" class="nav-link text-dramatic m-1">
                    Insert Road Updates</a></button>
                <button><a href="admin_index.php?admin_verify_road_updates" class="nav-link text-dramatic m-1">
                    Verify Road Updates</a></button>
                <button><a href="admin_index.php?admin_view_accident_reports" class="nav-link text-dramatic  m-1">
                    View Accident Reports</a></button>
                <button><a href="admin_index.php?admin_view_driver_feedbacks" class="nav-link text-dramatic m-1">
                    View Driver Feedbacks</a></button>
                <button><a href="admin_index.php?list_users" class="nav-link text-dramatic  m-1">
                    List users</a></button>
                <button><a href="admin_logout.php" class="nav-link text-dramatic  m-1">
                    Logout</a></button>
              
            </div>
        </div>
    </div>
    <div class="container my-3"> 
        <?php
            if(isset($_GET['admin_view_road_updates'])){
                include('admin_view_road_updates.php');
            }
            if(isset($_GET['admin_insert_road_updates'])){
                include('admin_insert_road_updates.php');
            }
            if(isset($_GET['admin_verify_road_updates'])){
                include('admin_verify_road_updates.php');
            }
            if(isset($_GET['admin_view_accident_reports'])){
                include('admin_view_accident_reports.php');
            }
            if(isset($_GET['admin_view_driver_feedbacks'])){
                include('admin_view_driver_feedbacks.php');
            }
            if(isset($_GET['edit_road_update'])){
                include('edit_road_update.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            if(isset($_GET['delete_road_update'])){
                include('delete_road_update.php');
            }
            if(isset($_GET['delete_user_road_update'])){
                include('delete_user_road_update.php');
            }
            if(isset($_GET['accept_road_updates'])){
                include('accept_road_updates.php');
            }
        ?>
    </div>
<!--footer-->  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html> 