<?php 

include 'config.php';

if(isset($_POST["IdProduct"]))
{
    $output = '';

    $sql="Select * from product where id= '".$_POST["IdProduct"]."' ";
    $result=mysqli_query($conn,$sql);

    $output .= '
        <div class="table-responsive">
        <table class="table table-bordered">';
        while($row=mysqli_fetch_array($result)){
            $output .= '
            
            <tr>
                <td width="30%"> <label>Product Name</label> </td>
                <td width="70%"> '.$row["Name"].' </td>
            </tr>
            <tr>
                <td width="30%"> <label>Category</label> </td>
                <td width="70%"> '.$row["Category"].' </td>
            </tr>
            <tr>
                <td width="30%"> <label>Start Biding Amount</label> </td>
                <td width="70%"> '.$row["Startbid"].' </td>
            </tr>
            <tr>
                <td width="30%"> <label>Deadline</label> </td>
                <td width="70%"> '.$row["Enddate"].' </td>
            </tr>
            <tr>
                <td width="30%"> <label>Description</label> </td>
                <td width="70%"> '.$row["Description"].' </td>
            </tr>
            
            ';
            
        }

        $output .= "</table></div>";
        echo $output;

}





// $Id = $_POST['Id'];

//     $sql="Select * from `product` where id=".$Id;
//     $result=mysqli_query($conn,$sql);
//     while($row=mysqli_fetch_array($result)){
        /* ?>
        <!-- <table>
            <td> <?php echo $row['Name']; ?> </td>
        </table> -->
        <?php
    }
*/
?> 