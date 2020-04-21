<?php require 'views/header.php';
      require 'views/sidebar.php';
      include 'includes/handler.php';
?>

<div class="cashflow-container">
   <p class="title-cashflow" style="background: #333;">Cash Flow Form</p>

   <?php
   // INSERT ORDER TO DB
            if (isset($_POST['cashflow-submit'])) {
               $cashflow_date = $_POST['cashflow-date'];
               $cashflow_type = $_POST['cashflow-type'];
               $cashflow_amount = $_POST['cashflow-amount'];
               $cashflow_description = $_POST['cashflow-description'];

               if (!empty($cashflow_date) && !empty($cashflow_type) && !empty($cashflow_amount) && !empty($cashflow_description)) {

                  if ($cashflow_type == 1) {
                     $query = "INSERT INTO cashflow (cashflow_date, cashflow_in, cashflow_out, cashflow_description) VALUES ('$cashflow_date', '$cashflow_amount', '', '$cashflow_description')";
                     $result = mysqli_query($connection, $query);
                     echo "<div class='order-success'><p>Notice: Cash in successful</p></div>";
                  }  elseif ($cashflow_type == 2) {
                     $query = "INSERT INTO cashflow (cashflow_date, cashflow_in, cashflow_out, cashflow_description) VALUES ('$cashflow_date', '', '$cashflow_amount', '$cashflow_description')";
                       $result = mysqli_query($connection, $query);
                       echo "<div class='order-success'><p>Notice: Cash out successful</p></div>";
                  }
                 
               }  else {
                  echo 
                  "<div class='order-failed'><p>Notice: Please fill in all the fields</p></div>";
               }
         }
         ?>

         <?php
         // DELETE ORDER TO DB
            if (isset($_POST['delete-submit'])) {
               $delete_cashflow_no = $_POST['delete-cashflow-no'];
               $query = "DELETE FROM cashflow WHERE cashflow_id = $delete_cashflow_no";
               
               if (!empty($delete_cashflow_no)) {
                  $result = mysqli_query($connection, $query);
                  echo "<div class='order-success'><p>Notice: Deleting successful</p></div>";
               }  else {
                  echo 
                  "<div class='order-failed'><p>Notice: Deleting unsuccessful</p></div>";
               }
         }
         ?>

   <div class="cashflow-btn">
      <div>
      <a href="#" class="add-cashflow-btn">Insert</a>
      </div>
      <div>
      <a href="#" class="delete-cashflow-btn">Delete</a>
      </div>
   </div>

   <!-- ADD cashflow FORM -->
   <div class="cashflow-modal">
      <form action="cashflow.php" method="POST" class="cashflow-modal-form" autocomplete="off">
         <label for="" class="text-center cashflow-title">Cash Flow</label>
         <div class="input-div">
            <label for="">Date</label>
            <input type="date" name="cashflow-date" id="" class="text-center date">
         </div>
         <div class="input-div">
            <select name="cashflow-type" id="">
               <option value="">Select type of transaction</option>
               <option value="1">Cash In</option>
               <option value="2">Cash Out</option>
            </select>
         </div>
         <div class="input-div">
            <label for="">Amount</label>
            <input type="text" name="cashflow-amount" id="">
         </div>
         <div class="input-div">
            <label for="">Description</label>
            <input type="text" name="cashflow-description" id="">
         </div>
         <div class="input-div">
            <input type="submit" value="Submit" name="cashflow-submit">
            <input type="submit" value="Cancel" name="cashflow-cancel" class="cashflow-cancel-btn">
         </div>
      </form>
   </div>

   <!-- DELETE cashflow -->
   <div class="delete-modal">
      <form action="cashflow.php" method="POST" class="cashflow-modal-form" autocomplete="off">
         <label for="" class="text-center cashflow-title">Delete cashflow Form</label>
         <select name="delete-cashflow-no" id="">
         <option value="">Select transaction no. you want to delete</option>

         <?php
         // ECHO ALL THE ID 
            $query = "SELECT * FROM cashflow";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
               $cashflow_no = $row['cashflow_id'];

               echo "
               <option value='$cashflow_no'>$cashflow_no</option>
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

   <div class="cashflow-main-container">
      <table class="cashflow-table" cellpadding="0" cellspacing="0" role="presentation">
         <thead>
            <tr>
               <th>Transaction No.</th>
               <th>Transaction Date</th>
               <th>Cash In</th>
               <th>Cash Out</th>
               <th>Description</th>
            </tr>
         </thead>
         <tbody>

         <?php
            // ECHO ALL THE DATA FROM DB TO TABLE
            $query = "SELECT * FROM cashflow";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
               $cashflow_date = $row['cashflow_date'];
               $cashflow_in = $row['cashflow_in'];
               $cashflow_out = $row['cashflow_out'];
               $cashflow_description = $row['cashflow_description'];
               $cashflow_id = $row['cashflow_id'];

               echo "
               <tr>
               <td>$cashflow_id</td>
               <td>$cashflow_date</td>
               <td>$cashflow_in</td>
               <td>$cashflow_out</td>
               <td>$cashflow_description</td>
               </tr>
               ";
            }

         ?>
         </tbody>
      </table>
   </div>    
<div class="cashflow">
   <div class="cashflow-in">
      <p>Total Cash In: 
         <?php
            $query = "SELECT SUM(cashflow_in) AS cashflow FROM cashflow";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
            $total_cash_in = $row['cashflow'];
            echo "<input type='text' class='cashflow-in-input' value='$total_cash_in' disabled>";
            }
         ?>
      </p>
   </div>
   <div class="cashflow-out">
   <p>Total Cash Out: 
   <?php
      $query = "SELECT SUM(cashflow_out) AS cashflow FROM cashflow";
      $result = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($result)) {
      $total_cash_out = $row['cashflow'];
      echo "<input type='text' class='cashflow-out-input' value='$total_cash_out' disabled>";
      }
   ?>
   </p>
   </div>
</div>
</div>
<script src="js/cashflow.js"></script>
<?php require 'views/footer.php'; ?>