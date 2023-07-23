<!--connect file-->
<?php
  include('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
      <!--Bootstrap css-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--fontawesone-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center mb-5 mt-5 text-primary">Admin Registration</h2> 
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="image/happy-cute-boy-wearing-police-un.jpg" alt="adminimage" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter your password" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-primary py-2 px-3 border-0"
                        name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Already have an account?
                            <a href="admin_login.php" class="link-primary">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        
<?php
if(isset($_POST['admin_registration'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
    //select query
    $select_query="SELECT * from `admin_table` where 
    admin_name='$username' or admin_email='$email'";
    $result=mysqli_query($conn,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo"<script>alert('Username and email already exists')</script>";
    }elseif($password!=$confirm_password){
        echo"<script>alert('passwords do not match')</script>";
    }else{
    //insert query
    $insert_query="INSERT into `admin_table` 
    (admin_name, admin_email,admin_password)values
    ('$username','$email','$hash_password')";
    $sql_execute=mysqli_query($conn,$insert_query);
    if($sql_execute){
        echo"<script>alert('Registered succesfully');</script>";
    }else{
        die(mysqli_error($conn));
    }
    }
}

?>

    </div>
</body>
</html>