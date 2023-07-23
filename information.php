<?php
session_start();
if(isset($_SESSION['username'])){
    echo "Welcome" .$_SESSION['username'];
    echo "<br>";
}
else{
    echo "please login again to continue";
}
?>