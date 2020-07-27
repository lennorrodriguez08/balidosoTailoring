<?php 
    // ##
    // ## This line automatically includes the header and the sidebar then populates between pages
    require 'views/header.php';
    require 'views/sidebar.php';
    include "./includes/handler.php";

?>

    <!-- ============== HOME CONTENT ================== -->
    <div class="overview">
       <!-- ============== HOME TOP ITEMS SUCH AS NO. OF TRANSACTIONS ================== -->
        <div class="overview-content">
            <div class="all-transactions">
                <div class="all-transactions-icon" style="background: #8b0b13; opacity: 0.8;">
                    <i class="far fa-clipboard"></i>
                </div>
                <div class="no-of-transactions">
                    <!-- ============ TO BE TARGET ============== -->
                    <?php  
                    include 'includes/handler.php';

                    $result = $connection->query("SELECT transaction_id FROM customers") or die($connection->error);

                    if ($result->num_rows > 0) 
                    {
                        $rowcount=mysqli_num_rows($result);
                        ?>
                            <p class="count-transactions" style="font-weight: normal;"><?php echo $rowcount ?></p>
                        <?php
                    }
                    else 
                    {
                        ?>
                            <p class="count-transactions" style="font-weight: normal;">0</p>
                        <?php
                    }
                    ?>
                    
                    <p class="title-transactions">No. Of Transactions</p>
                </div>
            </div>
            <div class="all-orders">
                <div class="all-orders-icon" style="background: #8b0b13; opacity: 0.8;">
                    <i class="far fa-sticky-note"></i>
                </div>
                <div class="no-of-orders">
                   <!-- ============ TO BE TARGET ============== -->
                    <p class="count-orders" style="font-weight: normal;">
                
                    <?php

                        $query = "SELECT id FROM orders";
                        $result = mysqli_query($connection, $query);

                        if ($result) {
                            $count_order = mysqli_num_rows($result);
                            echo "$count_order";
                        }

                    ?>

                    </p>
                    <p class="title-orders">No. Of Orders</p>
                </div>
            </div>
            <div class="all-expenses">
                <div class="all-expenses-icon" style="background: #8b0b13; opacity: 0.8;">
                    <i class="far fa-credit-card"></i>
                </div>
                <div class="no-of-expenses">
                   <!-- ============ TO BE TARGET ============== -->
                    <p class="count-expenses" style="font-weight: normal;">
                
                    <?php 

                        $query = "SELECT cashflow_id FROM cashflow";
                        $result = mysqli_query($connection, $query);

                        if ($result) {
                            $count_cashflow = mysqli_num_rows(($result));
                            echo "$count_cashflow";
                        }

                    ?>

                    </p>
                    <p class="title-expenses">No. Of Cash Flow</p>
                </div>
            </div>
        </div>
        <!-- ============== CLOSING HOME TOP ITEMS SUCH AS NO. OF TRANSACTIONS ================== -->
        <!-- ============== GROSS SALES / NET SALES ================== -->
        <div class="sales-main-container">
            <div class="gross-sales">
                <div class="gross-sales-icon" style="background: #8b0b13; opacity: 0.8;">
                    <i class="fas fa-coins"></i>
                </div>
                <div class="no-of-gross-sales">
                    <div class="gross-sales-container">
                       <p class="peso-sign" style="font-size: 30px;">&#8369;</p>
                       <!-- ============ TO BE TARGET ============== -->
                        <?php 

                        include 'includes/handler.php';

                        $get_gross_sale = "";
                        $result = $connection->query("SELECT SUM(items.price * items.quantity) AS gross_sale FROM items") or die($connection->error);
                        if ($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {
                                ?>
                                    <p class="count-gross-sales" style="font-size: 30px;"><?php echo $row["gross_sale"] ?></p>
                                <?php
                            }
                        }
                        else
                            {
                                ?>
                                    <p class="count-gross-sales" style="font-size: 30px;">0</p>
                                <?php
                            }
                        ?>
                    </div>
                    <p class="title-gross-sales">Gross Sales</p>
                </div>
            </div>
            <div class="net-sales">
                <div class="net-sales-icon" style="background: #8b0b13; opacity: 0.8;">
                    <i class="far fa-minus-square"></i>
                </div>
                <div class="no-of-net-sales">
                    <div class="net-sales-container">
                       <p class="peso-sign" style="font-size: 30px;">&#8369;</p>
                       <!-- ============ TO BE TARGET ============== -->
                        <?php 
                            include 'includes/handler.php';
                            $result = $connection->query("SELECT SUM(x.total) as gross_due
                            FROM (SELECT SUM(items.price * items.quantity) - customers.amount_receive as total
                                  FROM items
                                  INNER JOIN customers ON items.transaction_no = customers.transaction_no
                                  GROUP BY items.transaction_no
                                 ) as x") or die($connection->error);

                            if ($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    ?>
                                        <p class="count-net-sales" style="font-size: 30px;"><?php echo $row['gross_due'] ?></p>
                                    <?php
                                }
                            }
                            else {
                                ?>
                                <p class="count-net-sales" style="font-size: 30px;">0</p>
                                <?php
                            }
                        ?>
                        
                    </div>
                    <p class="title-net-sales">Gross Due</p>
                </div>
            </div>
        </div>
        <!-- ============== CLOSING GROSS SALES / NET SALES ================== -->

        <div class="charts" style="padding: 1.5rem 0; display: flex;">
          <div class="row-100" style="display: flex; width: 920px;">
            <div class="col-50" style="width: 50%; margin-right: 1.5rem;">
              <canvas id="no_transaction" role="img"></canvas>
            </div>
            <div class="col-50" style="width: 50%;">
              <canvas id="gross_chart" role="img"></canvas>
            </div>
          </div>
        </div>


        <!-- ============== TABLE AREA ================== -->
        <form action="./includes/delete_due_date.php" method="POST" id="home_form">
        <div class="due-date-container">
            <p class="title-due-date" style="background: #333;">Upcoming Due Dates</p>
            <div class="table-container">
                <table width="940px" border="1" cellpadding="0" cellspacing="0" role="presentation">
                    <thead>
                        <tr>
                            <th>
                                Transaction No.
                            </th>
                            <th>
                                Customer Name
                            </th>
                            <th>
                                Due Date
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody id="due_date_tbody">

                        <?php 

                            date_default_timezone_set('Asia/Chongqing');
                            $timestamp = time();
                            $time_now = date('m d, Y', $timestamp);

                        ?>
                        
                        <?php 
                        
                            $query = "SELECT * FROM customers";
                            $result = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $transaction_id = $row['transaction_id'];
                                $transaction_no = $row['transaction_no'];
                                $fullname = $row['fullname'];
                                $date = $row['date'];
                                
                                $date_left = strtotime($date) - $timestamp;
                                $remaining_day = floor($date_left / (60 * 60 * 24));
                                $str_date = date('F d, Y', strtotime($date));
                                if ($remaining_day <= 5) {

                                    $secret = "INSERT INTO due_date(transaction_id, transaction_no, customer_name, due_dates) VALUES ('$transaction_id','$transaction_no', '$fullname', '$str_date')";    
                                    $secret1 = mysqli_query($connection, $secret);

                                }     
                              }
                        
                        ?>
    
                    </tbody>
                </table>
            </div>
        </div>
        </form>
        <!-- ============== CLOSING TABLE AREA ================== -->
    </div>
    <!-- ============== CLOSING HOME CONTENT ================== --> 

    <?php 
        include 'includes/handler.php';
        include 'includes/chartJsMap.php';
        $jsMap = new chartJsMap;

        // no_of_transaction data
        $result = $jsMap->get_query_data_no_transaction();
        $row = $result->fetch_array(MYSQLI_NUM);
        


        // gross_sales data
        $result2 = $jsMap->get_query_data_sale();
        $row_gross_sale = $result2->fetch_array(MYSQLI_NUM);



        // gross_due data
        $result3 = $jsMap->get_query_data_due();
        $row_gross_due = $result3->fetch_array(MYSQLI_NUM);






        $connection->close();
    ?>

    
    <?php
        // ##
        // ## This line automatically includes the footer then populate between pages
        require 'views/footer.php';
    ?>


