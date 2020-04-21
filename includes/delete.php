<?php
require 'handler.php';

if (isset($_POST["dataId"]))
{
    $id = $_POST["dataId"];
    $tid = $_POST["tid"];
    
    $sql = "DELETE FROM items WHERE item_id =  $id";
    $connection->query($sql) or die($connection->error);

    $select = "SELECT * FROM items WHERE transaction_no = '$tid'";
    $result = $connection->query($select) or die($connection->error);

    if ($result->num_rows > 0)
    {
        
        while ($row = $result->fetch_assoc())
        {
            echo "
                <tr>
                    <td style='text-align: center;'>".$row['item_name']."</td>
                    <td style='text-align: center;'>".$row['quantity']."</td>
                    <td style='text-align: center;'>".$row['prescription']."</td>
                    <td style='text-align: center;'>".$row['price']."</td>
                    <td style='text-align: center;'><a class='delete_btn' data-id1='".$row['item_id']."' id='delete_btn' style='cursor: pointer;'>Delete</a></td>
                    
                </tr>
            ";
        }
    }


    $connection->close();
}


if (isset($_POST["resetItemSubmit"]))
{
    $id = $_POST["resetItemSubmit"];

    $sql = "DELETE FROM items WHERE transaction_no = '$id'";
    $connection->query($sql) or die($connection->error);

    $connection->close();


}