<?php 

    require 'handler.php';

    if (isset($_POST['delete_due_date'])) {

        $delete_value = $_POST['delete_due_date'];

        $query = "UPDATE due_date SET deleted = 'deleted' WHERE transaction_no = '$delete_value'";
        $result = mysqli_query($connection, $query);

    }

    
                         
      $all_due_dates = "SELECT * FROM due_date WHERE deleted != 'deleted'";
      $all_due_results = mysqli_query($connection, $all_due_dates);

      while ($row = mysqli_fetch_assoc($all_due_results)) {

        $trans_no = $row['transaction_no'];
        $customer_name = $row['customer_name'];
        $exact_due_date = $row['due_dates'];

        echo "
            <tr>
                <td>$trans_no</td>
                <td>$customer_name</td>
                <td>$exact_due_date</td>
                <td><button type='submit' id='delete_value' style='width: 0px;' data-no='$trans_no'><i style='color: red; font-size: 18px; cursor:pointer;' class='far fa-trash-alt'></i></button></td>
            </tr>";

      }
                         
                          

?>