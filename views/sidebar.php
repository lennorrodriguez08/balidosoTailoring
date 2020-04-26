<?php
    // ##
    // ## This php scripts populate the Sidebar to the other pages
    // ##
    
    // ## Check if the user is accessing this script legally
    if (!isset($_SESSION['id'])) {
            header("Location: index");
    }
    else {
    ?>
    <!-- ============== SIDEBAR ================== -->
    <div class="sidebar">
            <div class="sidebar-logo">
                <img src="img/logo.png" alt="">
            </div>
            <div style="display: flex; flex-direction: column;">
            <div class="sidebar-list">
               <div class="home">
                    <p class="home-icon"><a href="#"><i class="fas fa-home"></i></a></p>
                    <p><a href="home">Home</a></p>
                </div>
                <div class="new-transaction">
                    <p class="new-transaction-icon"><a href="#"><i class="fas fa-plus-square"></i></a></p>
                    <p><a href="newtransaction">New Transaction</a></p>
                </div>
                <div class="measurements">
                    <p class="measurements-icon"><a href="#"><i class="fas fa-pencil-ruler"></i></a></p>
                    <p><a href="measurements">Measurements</a></p>
                </div>
                <div class="transaction-records">
                    <p class="transaction-records-icon"><a href="#"><i class="fas fa-clipboard"></i></a></p>
                    <p><a href="transactionrecords.php">Transaction Records</a></p>
                </div>
                <div class="orders">
                    <p class="orders-icon"><a href="#"><i class="fas fa-sticky-note"></i></a></p>
                    <p><a href="orders">Orders</a></p>
                </div>
                <!-- <div class="releasing">
                    <p class="releasing-icon"><a href="#"><i class="fas fa-sync"></i></a></p>
                    <p><a href="#">Releasing</a></p>
                </div> -->
                <div class="cash-flow">
                    <p class="cash-flow-icon"><a href="#"><i class="fas fa-ruble-sign"></i></a></p>
                    <p><a href="cashflow">Cash Flow</a></p>
                </div>
            </div>
            <div style="position: absolute; bottom: 0; background: #fff; padding-left: 20px; padding-bottom: 20px; padding-right: 8px;">
                <div style="display: flex; align-items: center; justify-content: center;">
                    <p style="align-self: flex-end; color: #333; font-size: 15px; font-family: Arial, Helvetica, sans-serif"><strong>Powered By</strong>&nbsp;&nbsp;</p>
                    <img src="./img/r-duo-manila.png" width="90px" alt="">
                </div>
            </div>
        </div>
        </div>
        <!-- ============== CLOSING SIDEBAR ================== -->
<?php
    }
?>

