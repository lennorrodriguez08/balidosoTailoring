<?php require 'views/header.php';
      require 'views/sidebar.php';
      include 'includes/handler.php';
?>

<div class="orders-container">
   <p class="title-orders" style="background: #333;">Order Form</p>

   <?php
   // INSERT ORDER TO DB
            if (isset($_POST['order-submit'])) {
               $date = $_POST['ordered-date'];
               $ordered_by = $_POST['ordered-by'];
               $qty = $_POST['ordered-qty'];
               $item_name = $_POST['ordered-item'];

               if (!empty($date) && !empty($ordered_by) && !empty($qty) && !empty($item_name)) {

                  $query = "INSERT INTO orders (ordered_date, ordered_by, qty, item_name) VALUES ('$date', '$ordered_by', '$qty', '$item_name')";
                  $result = mysqli_query($connection, $query);
                  echo "<div class='order-success'><p>Notice: Adding of order successful</p></div>";
                 
               }  else {
                  echo 
                  "<div class='order-failed'><p>Notice: Please fill in all the fields</p></div>";
               }
         }
         ?>

         <?php
         // DELETE ORDER TO DB
            if (isset($_POST['delete-submit'])) {
               $delete_order_no = $_POST['delete-order-no'];
               $query = "DELETE FROM orders WHERE id = $delete_order_no";
               
               if (!empty($delete_order_no)) {
                  $result = mysqli_query($connection, $query);
                  echo "<div class='order-success'><p>Notice: Deleting of order successful</p></div>";
               }  else {
                  echo 
                  "<div class='order-failed'><p>Notice: Deleting of order unsuccessful</p></div>";
               }
         }
         ?>

   <div class="orders-btn">
      <div>
      <a href="#" class="add-order-btn">Add Order</a>
      </div>
      <div>
      <a href="#" class="delete-order-btn">Delete Order</a>
      </div>
      <div>
      <a href="#" class="print-order">Print Order</a>
      </div>
   </div>

   <!-- ADD ORDER FORM -->
   <div class="orders-modal">
      <form action="orders.php" method="POST" class="orders-modal-form" autocomplete="off">
         <label for="" class="text-center order-title">Add Order Form</label>
         <div class="input-div">
            <label for="">Date</label>
            <input type="date" name="ordered-date" id="" class="text-center date">
         </div>
         <div class="input-div">
            <label for="">Ordered By</label>
            <input type="text" name="ordered-by" id="">
         </div>
         <div class="input-div">
            <label for="">Quantity</label>
            <input type="text" name="ordered-qty" id="">
         </div>
         <div class="input-div">
            <label for="">Order Name</label>
            <input type="text" name="ordered-item" id="">
         </div>
         <div class="input-div">
            <input type="submit" value="Submit" name="order-submit">
            <input type="submit" value="Cancel" name="order-cancel" class="order-cancel-btn">
         </div>
      </form>
   </div>

   <!-- DELETE ORDER -->
   <div class="delete-modal">
      <form action="orders.php" method="POST" class="orders-modal-form" autocomplete="off">
         <label for="" class="text-center order-title">Delete Order Form</label>
         <select name="delete-order-no" id="">
         <option value="">Select order no. you want to delete</option>

         <?php
         // ECHO ALL THE ID 
            $query = "SELECT * FROM orders";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
               $order_no = $row['id'];

               echo "
               <option value='$order_no'>$order_no</option>
               ";
            }

         ?>

         </select>
         <div class="input-div">
            <input type="submit" value="Submit" name="delete-submit">
            <input type="submit" value="Cancel" name="delete-cancel" class="delete-cancel-btn">
         </div>
      </form>
   </div>

   <div class="orders-main-container">
      <table class="orders-table" cellpadding="0" cellspacing="0" role="presentation">
         <thead>
            <tr>
               <th>Order No.</th>
               <th>Ordered Date</th>
               <th>Ordered By</th>
               <th>Quantity</th>
               <th>Order Name</th>
            </tr>
         </thead>
         <tbody>

         <?php
            // ECHO ALL THE DATA FROM DB TO TABLE
            $query = "SELECT * FROM orders";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
               $ordered_date = $row['ordered_date'];
               $ordered_by = $row['ordered_by'];
               $qty = $row['qty'];
               $item_name = $row['item_name'];
               $id = $row['id'];

               echo "
               <tr>
               <td>$id</td>
               <td>$ordered_date</td>
               <td>$ordered_by</td>
               <td>$qty</td>
               <td>$item_name</td>
               </tr>
               ";
            }

         ?>

         </tbody>
      </table>
   </div>      
</div>
<script src="js/orders.js"></script>
<?php require 'views/footer.php'; ?>