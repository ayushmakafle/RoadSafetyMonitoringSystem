<?php
include('dbconnect.php');

if (isset($_GET['accept_road_updates'])) {
    $reportid = $_GET['accept_road_updates'];

    // Retrieve data from the roadreport table for the selected report ID
    $selectQuery = "SELECT * FROM roadreport WHERE reportid = '$reportid'";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the data
        $row = mysqli_fetch_assoc($result);

        // Extract the data
        $updatelocation = $row['updatelocation'];
        $roadcondition = $row['roadcondition'];
        $roadimage1 = $row['roadimage1'];
        $roadimage2 = $row['roadimage2'];
        $roadimage3 = $row['roadimage3'];
        $updatereporter=$row['updaterepoter'];
        $created_at=$row['created_at'];

        // Set the source and destination paths for the images
        $sourceFolder = 'user_road_update_images/';
        $destinationFolder = 'road_update_images/';

        // Move the images from source folder to destination folder
        $movedImage1 = $destinationFolder . $roadimage1;
        $movedImage2 = $destinationFolder . $roadimage2;
        $movedImage3 = $destinationFolder . $roadimage3;

        // Copy the files
        copy($sourceFolder . $roadimage1, $movedImage1);
        copy($sourceFolder . $roadimage2, $movedImage2);
        copy($sourceFolder . $roadimage3, $movedImage3);
      $source='User';
        // Insert the data into the roadconditionupdate table
        $insertQuery = "INSERT INTO roadconditionupdates
        (Location, Description, road_update_image1, road_update_image2, road_update_image3,Source,Timestamp) 
        VALUES ('$updatelocation', '$roadcondition', '$roadimage1', '$roadimage2', '$roadimage3','$source','$created_at')";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            // Data inserted successfully
            echo "<script>alert('Road update accepted')</script>";
            $deleteQuery = "DELETE FROM roadreport WHERE reportid = '$reportid'";
            $deleteResult = mysqli_query($conn, $deleteQuery);
    

        } else {
            // Error inserting data
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Report ID not found or no data available
        echo "Report not found";
    }
}
?>
