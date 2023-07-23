<h3 class="text-center text-primary">Accident Reports</h3>
<div style="overflow-x:auto;">
<table class="table table-bordered mt-5">
    <thead>
    <tr>
        <th class="text-primary text-center">SNo.</th>
        <th class="text-primary text-center">Location</th>
        <th class="text-primary text-center">Image</th>
        <th class="text-primary text-center">Description</th>
        <th class="text-primary text-center">Date</th>
        <th class="text-primary text-center">Vehicle License Plate</th>
        <th class="text-primary text-center">Vehicle Type</th>
        <th class="text-primary text-center">Vehicle Color</th>
        <th class="text-primary text-center">Driver Name</th>
        <th class="text-primary text-center">Driver Contact</th>
        <th class="text-primary text-center">Driver License No.</th>
        <th class="text-primary text-center">Witness Name</th>
        <th class="text-primary text-center">Witness Contact</th>
        <th class="text-primary text-center">Reporter Name</th>
        <th class="text-primary text-center">Reporter Contact</th>
        <th class="text-primary text-center">Injuries</th>
        <th class="text-primary text-center">Damages</th>
        <th class="text-primary text-center">Additional Comment</th>

    </tr>
    </thead>
    <tbody>
        <?php
        $get_reports="SELECT * from `accidentreports` ORDER BY ReportDateTime DESC";
        $result=mysqli_query($conn,$get_reports);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $update_id=$row['ReportID'];
            $Location=$row['Location'];
            $Description=$row['Description'];
            $date=$row['ReportDateTime'];
            $VehicleLicensePlate=$row['VehicleLicensePlate'];
            $VehicleType=$row['VehicleType'];
            $VehicleColor=$row['VehicleColor'];
            $DriverName=$row['DriverName'];
            $DriverContact=$row['DriverContact'];
            $DriverLicense=$row['DriverLicense'];
            $WitnessName=$row['WitnessName'];
            $WitnessContact=$row['WitnessContact'];
            $Injuries=$row['Injuries'];
            $Damages=$row['Damages'];
            $Photos=$row['Photos'];
            $AdditionalComments=$row['AdditionalComments'];
            $ReporterName=$row['ReporterName'];
            $ReporterContact=$row['ReporterContact'];
            $number++;
            ?>
            <tr class='text-center' >
            <td class=''><?php echo $number?></td>
            <td> <?php echo $Location?></td>
            <td> <img src='accident_image/<?php echo $Photos;?>' class='product_img' style="width: 100%;"/></td>
            <td><?php echo $Description?></td>
            <td><?php echo $date?></td>
            <td><?php echo $VehicleLicensePlate?></td>
            <td><?php echo $VehicleType?></td>
            <td><?php echo $VehicleColor?></td>
            <td><?php echo $DriverName?></td>
            <td><?php echo $DriverContact?></td>
            <td><?php echo $DriverLicense?></td>
            <td><?php echo $WitnessName?></td>
            <td><?php echo $WitnessContact?></td>
            <td><?php echo $ReporterName?></td>
            <td><?php echo $ReporterContact?></td>
            <td><?php echo $Injuries?></td>
            <td><?php echo $Damages?></td>
            <td><?php echo $AdditionalComments?></td>    
        </tr>
        <?php
        }
        ?>
     
    </tbody>
</table>
</div>