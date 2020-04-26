<?php require 'views/header.php';
      require 'views/sidebar.php';
      include 'includes/handler.php';
?>
<div class="orders-container">
   <p class="title-orders" style="background: #333;">Order Form</p>
   <div class="order-wrapper">
      <form action="" method="POST" class="orders-form">
         <select name="select_option" id="" class="select">
            <option value="">Select Action ...</option>
            <option value="add_order">Add Order</option>
            <option value="delete_order">Delete Order/s</option>
            <option value="print_order">Print</option>
         </select>
         <input type="submit" onClick="Javascript : return confirm('Are you sure you want to continue?')" name="apply_action" value="Apply Action" class="submit-order">
         <?php 

               if (isset($_POST['apply_action'])) {
                  $select_option = $_POST['select_option'];

                  if ($select_option == "add_order") {
                     include "add_order_form.php";
                  }  else if ($select_option == "delete_order") {
                        $checkbox_array = $_POST['check_box_array'];

                           foreach($checkbox_array as $checkbox) {
                              $delete_checkbox_query = "DELETE FROM orders WHERE id = $checkbox";
                              $delete_result = mysqli_query($connection, $delete_checkbox_query);
                           }
                  }  
                  
               }

         ?>

         <?php 

         if (isset($_POST['add_order'])) {
            $new_order = $_POST['new_order'];
            $new_qty = $_POST['new_qty'];
            date_default_timezone_set('Asia/Chongqing');
            $new_date = date('F d, Y - h:i A');


            $new_order_query = "INSERT INTO orders(ordered_date, qty, item_name, ordered_by) VALUES ('$new_date', $new_qty, '$new_order', '')";
            $new_order_query_result = mysqli_query($connection, $new_order_query);
         }

         ?>
         <div class="orders-table">
            <table cellpadding="0" cellspacing="0" role="presentation">
               <thead>
                  <tr>
                     <th class="td-checkbox"><input class="checkbox-array" type="checkbox"></th>
                     <th>Date Of Order</th>
                     <th>Quantity</th>
                     <th>Item</th>
                  </tr>
               </thead>
               <tbody>
               <?php 

                  $all_orders_query = "SELECT * FROM orders ORDER BY id DESC";
                  $all_orders_query_result = mysqli_query($connection, $all_orders_query);

                  while ($row = mysqli_fetch_assoc($all_orders_query_result)) {
                     $order_id = $row['id'];
                     $order_date = $row['ordered_date'];
                     $order_qty = $row['qty'];
                     $order_name = $row['item_name'];

                     ?>

                     <tr>
                        <td class="td-checkbox"><input type="checkbox" name="check_box_array[]" value="<?php echo $order_id; ?>" class="checkbox"></td>
                        <td><?php echo $order_date; ?></td>
                        <td><?php echo $order_qty; ?></td>
                        <td><?php echo $order_name; ?></td>
                     </tr>

               <?php }

               ?>
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

         if (selectValue == "print_order") {
            window.open('printorders.php');
         }


      });

</script>
<script src="js/orders.js"></script>
<?php require 'views/footer.php'; ?>