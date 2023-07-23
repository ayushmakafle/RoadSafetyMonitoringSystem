<h3 class="text-center text-primary">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="text-center">
        <?php
            $get_users="SELECT * FROM `users`";
            $result=mysqli_query($conn,$get_users);
            $row_count=mysqli_num_rows($result);
           
    if($row_count==0){
        echo "<h2 class='bg-danger text-center'>No users yet</h2>";
    }else{
        echo" 
        <tr>
            <th>S.No.</th>
            <th>Username</th>
            <th>User Email</th>
        </tr>
    </thead>
    <tbody class='text-center'>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id=$row_data['UserID'];
            $username=$row_data['Username'];
            $user_email=$row_data['Email'];
            $number++;
            echo"<tr>
                    <td>$number</td>
                    <td>$username</td>
                    <td>$user_email</td>
                </tr>";
        }
    }
        ?>
       
    
    </tbody>
</table>
