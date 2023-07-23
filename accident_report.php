<?php
// Replace DB_HOST, DB_USER, DB_PASS, and DB_NAME with your database credentials
$conn = mysqli_connect("localhost", "root", "", "road safety monitoring system");

// Get the form data
$datetime = $_POST['ReportDateTime'];
$location = $_POST['Location'];
$description = $_POST['Description'];
$vehicleLicencePlate = $_POST['VehicleLicensePlate'];
$vehicletype = $_POST['VehicleType'];
$vehiclecolor=$_POST['VehicleColor'];
$drivername=$_POST['DriverName'];
$drivercontact=$_POST['DriverContact'];
$driverlicence=$_POST['DriverLicense'];
$witnessname=$_POST['WitnessName'];
$witnesscontact=$_POST['WitnessContact'];
$reportername=$_POST['ReporterName'];
$reportercontact=$_POST['ReporterContact'];
$injuries=$_POST['Injuries'];
$damages=$_POST['Damages'];
$Photos=$_FILES['Photos']['name'];
$temp_image=$_FILES['Photos']['tmp_name'];
move_uploaded_file($temp_image,"accident_image/$Photos");
$additionalcomments=$_POST['AdditionalComments'];

// Insert data into the bill table
$query = "INSERT INTO accidentreports (ReportDateTime,Location,Description,VehicleLicensePlate,VehicleType,VehicleColor,DriverName,DriverContact,DriverLicense,WitnessName,WitnessContact,ReporterName,ReporterContact, Injuries,Damages,Photos,AdditionalComments) 
VALUES ('$datetime','$location', '$description', '$vehicleLicencePlate', '$vehicletype', '$vehiclecolor','$drivername',
'$drivercontact','$driverlicence','$witnessname','$witnesscontact','$reportername','$reportercontact','$injuries','$damages','$Photos','$additionalcomments')";
$result = mysqli_query($conn, $query);

if ($result) {
  echo "Accident reported successfully";
  header("Location: index.html");
  exit;
} else {
  echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>