<h3 class="text-center text-primary">Driver Feedbacks</h3>
<table class="table table-bordered mt-5">
    <thead >
    <tr>
        <th class="text-primary text-center">SNo.</th>
        <th class="text-primary text-center">License Plate No.</th>
        <th class="text-primary text-center">Vehicle</th>
        <th class="text-primary text-center">Driver Name</th>
        <th class="text-primary text-center">Rating </th>
        <th class="text-primary text-center">Category</th>
        <th class="text-primary text-center">Reported By</th>
        <th class="text-primary text-center">Reporter Contact</th>
        <th class="text-primary text-center">Description</th>
        <th class="text-primary text-center">Date</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $get_accident_reports="SELECT * from `driverfeedback` ORDER BY Datetime DESC";
        $result=mysqli_query($conn,$get_accident_reports);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $report_id=$row['report_id'];
            $License_Plate_No=$row['License_Plate_No'];
            $Vehicle=$row['Vehicle'];
            $Driver_Name=$row['Driver_Name'];
            $Rating=$row['Rating'];
            $category=$row['category'];
            $reporter=$row['reporter'];
            $reporter_contact=$row['reporter_contact'];
            $Description=$row['Description'];
            $Datetime=$row['Datetime'];

            $number++;
            ?>
            <tr class='text-center' >
            <td class=''><?php echo $number?></td>
            <td> <?php echo $License_Plate_No?></td>
            <td> <?php echo $Vehicle?></td>
            <td> <?php echo $Driver_Name?></td>
            <td> <?php echo $Rating?></td>
            <td> <?php echo $category?></td>
            <td> <?php echo $reporter?></td>
            <td> <?php echo $reporter_contact?></td>
            <td><?php echo $Description?></td>
            <td> <?php echo $Datetime?></td>     
        </tr>
        <?php
        }
        ?>
     
    </tbody>
</table>