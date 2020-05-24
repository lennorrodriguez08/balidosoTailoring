<?php require 'views/header.php';
      require 'views/sidebar.php';
      include 'includes/handler.php';
?>
<div class="orders-container">
   <p class="title-orders" style="background: #333;">Cash Flow Form</p>
   <div class="order-wrapper">
      <form action="" method="POST" class="orders-form">
         <select name="select_option" id="" class="select">
            <option value="">Select Action ...</option>
            <option value="add_cash_in">Add Cash In</option>
            <option value="add_cash_out">Add Cash Out</option>
            <option value="delete_cashflow">Delete</option>
            <option value="print_cashflow">Print</option>
         </select>
         <input type="submit" onClick="Javascript : return confirm('Are you sure you want to continue?')" name="apply_action" value="Apply Action" class="submit-order">
         <?php 

               if (isset($_POST['apply_action'])) {
                  $select_option = $_POST['select_option'];

                  if ($select_option == "add_cash_in") {
                     include "add_cash_in_form.php";
                  }  else if ($select_option == "add_cash_out") {
                     include "add_cash_out_form.php";
                  }
                  else if ($select_option == "delete_cashflow") {
                        $checkbox_array = $_POST['check_box_array'];

                           foreach($checkbox_array as $checkbox) {
                              $delete_checkbox_query = "DELETE FROM cashflow WHERE cashflow_id = $checkbox";
                              $delete_result = mysqli_query($connection, $delete_checkbox_query);
                           }
                  }  else if ($select_option == "print_order") {
                        header("Location: printorders.php");
                  }
               }

         ?>
  
         <?php 

         if (isset($_POST['add_cashflow_in'])) {
            $cash_in_customer = $_POST['cash_in_customer'];
            $cash_in_amount = $_POST['cash_in_amount'];
            $cash_in_desc = $_POST['cash_in_desc'];
            date_default_timezone_set("Asia/Chongqing");
            $cashflow_date = date('F d, Y - h:i A');

            $cash_in_query = "INSERT INTO cashflow(cashflow_date, cashflow_in, cashflow_out, cashflow_customer, cashflow_description) VALUES ('$cashflow_date', $cash_in_amount, '', '$cash_in_customer', '$cash_in_desc')";
            $cash_in_result = mysqli_query($connection, $cash_in_query);
         }

         if (isset($_POST['add_cashflow_out'])) {
            $cash_out_customer = $_POST['cash_out_customer'];
            $cash_out_amount = $_POST['cash_out_amount'];
            $cash_out_desc = $_POST['cash_out_desc'];
            date_default_timezone_set("Asia/Chongqing");
            $cashflow_date = date('F d, Y - h:i A');

            $cash_out_query = "INSERT INTO cashflow(cashflow_date, cashflow_in, cashflow_out, cashflow_customer, cashflow_description) VALUES ('$cashflow_date', '', $cash_out_amount, '$cash_out_customer', '$cash_out_desc')";
            $cash_out_result = mysqli_query($connection, $cash_out_query);
         }

         ?>
         <div class="orders-table">
            <table cellpadding="0" cellspacing="0" role="presentation">
               <thead>
                  <tr>
                     <th class="td-checkbox"><input class="checkbox-array" type="checkbox"></th>
                     <th>Transaction Date</th>
                     <th>Customer Name</th>
                     <th>Cash In</th>
                     <th>Cash Out</th>
                     <th>Description</th>
                  </tr>
               </thead>
               <tbody>
               <?php 

                  $all_cashflow_query = "SELECT * FROM cashflow ORDER BY cashflow_id DESC";
                  $all_cashflow_query_result = mysqli_query($connection, $all_cashflow_query);

                  while ($row = mysqli_fetch_assoc($all_cashflow_query_result)) {
                     $cashflow_id = $row['cashflow_id'];
                     $cashflow_date = $row['cashflow_date'];
                     $cashflow_in = $row['cashflow_in'];
                     $cashflow_out = $row['cashflow_out'];
                     $cashflow_customer = $row['cashflow_customer'];
                     $cashflow_description = $row['cashflow_description'];

                     ?>

                     <tr>
                        <td class="td-checkbox"><input type="checkbox" name="check_box_array[]" value="<?php echo $cashflow_id; ?>" class="checkbox"></td>
                        <td><?php echo $cashflow_date; ?></td>
                        <td><?php echo $cashflow_customer; ?></td>
                        <td><?php echo $cashflow_in; ?></td>
                        <td><?php echo $cashflow_out; ?></td>
                        <td><?php echo $cashflow_description; ?></td>
                     </tr>

               <?php }

               ?>
                     <?php 
                     
                        $total_cash_in_query = "SELECT SUM(cashflow_in) as cashflow_in_sum FROM cashflow";
                        $total_cash_in_result = mysqli_query($connection, $total_cash_in_query);
                        while ($row = mysqli_fetch_assoc($total_cash_in_result)) {
                           $count_cash_in_sum = $row['cashflow_in_sum'];
                        }

                        $total_cash_out_query = "SELECT SUM(cashflow_out) as cashflow_out_sum FROM cashflow";
                        $total_cash_out_result = mysqli_query($connection, $total_cash_out_query);
                        while ($row = mysqli_fetch_assoc($total_cash_out_result)) {
                           $count_cash_out_sum = $row['cashflow_out_sum'];
                        }
                     ?>

                     <tr>
                        <td class="td-checkbox">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Total Cash In: <?php echo "<strong>$count_cash_in_sum</strong>" ?></td>
                        <td>Total Cash Out: <?php echo "<strong>$count_cash_out_sum</strong>" ?></td>
                        <td>&nbsp;</td>
                     </tr>

               </tbody>
            </table>
         </div>
      </form>
   </div>     
</div>
<script>
   const checkBoxArray = document.querySelector('.checkbox-array');
   const allCheckBox = document.querySelectorAll('.checkbox');
      checkBoxArray.addEventListener('change', function(e) {
         if (checkBoxArray.checked) {
            allCheckBox.forEach(function(checkbox) {
               checkbox.checked = true;
            });
         }  else {
            allCheckBox.forEach(function(checkbox) {
               checkbox.checked = false;
            });
         }
      });

      const ordersForm = document.querySelector('.orders-form');

      ordersForm.addEventListener('submit', function(e) {

         const selectValue = document.querySelector('.select').value;

         if (selectValue == "print_cashflow") {
            window.open('printcashflow.php');
         }


      });

</script>

<script src="js/orders.js"></script>
<?php require 'views/footer.php'; ?>