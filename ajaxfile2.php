<?php 

include 'config.php';

if(isset($_POST["IdProduct"]))
{
    $output = '';

    $sql="Select * from user where id= '".$_POST["IdProduct"]."' ";
    $result=mysqli_query($conn,$sql);

    $output .= '
        <div class="table-responsive">
        <table class="table table-bordered">';
        while($row=mysqli_fetch_array($result)){
            $output .= '
            
            <tr>
                <td width="30%"> <label> Name</label> </td>
                <td width="70%"> '.$row["name"].' </td>
            </tr>
            <tr>
                <td width="30%"> <label>User Name</label> </td>
                <td width="70%"> '.$row["username"].' </td>
            </tr>
            <tr>
                <td width="30%"> <label> Email</label> </td>
                <td width="70%"> '.$row["email"].' </td>
            </tr>
            <tr>
                <td width="30%"> <label>Phone Number</label> </td>
                <td width="70%"> '.$row["phoneno"].' </td>
            </tr>
            <tr>
                <td width="30%"> <label>Address</label> </td>
                <td width="70%"> '.$row["address"].' </td>
            </tr>
            
            ';
            
        }

        $output .= "</table></div>";
        echo $output;

}


?> 