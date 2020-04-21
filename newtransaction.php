
<?php
    // ##
    // ## This php scripts populate the header bar to the other pages via require php method 
    // ##

    // ## 
    // ## Session started
    session_start();

    // ## Check if the user is accessing this script legally
    if (!isset($_SESSION['id'])) {
        header("Location: index");
    }
    else {
    // ##
    // ## Check if the session is active, if not redirect the user back to the index page.
    // ## This line is to check the if the user legally access the page via logging in.
        if (empty($_SESSION['id'])) {
            header("Location: index");
        }
        
        // ##
        // ## Redirect to the homepage if the user successfully log in and the session has started.
        else {
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Balidoso Tailoring | Dashboard</title>
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="stylesheet" href="css/newtransaction.css">
        <link rel="stylesheet" href="css/all.css">
        <link rel="stylesheet" href="css/default.css">
        </head>
        <body>
        <!-- ============== NAVBAR ================== -->
            <nav>
                <div class="branding">
                    <p>Balidoso Tailoring </p>
                    <div class="welcome-user">
                        <p>You logged in as:&nbsp;</p>
                        <label for="" style="text-transform: capitalize; font-weight: normal!important;"><?php echo $_SESSION["role"]?></label>
                        <a href="includes/logout.php" style="display: inline-block; color: #333; text-decoration: none; margin: 0 0.5rem; font-weight: bold">Log out</a>
                    </div>
                </div>
            </nav>
            <!-- ============== CLOSING NAVBAR ================== -->

            <?php require 'views/sidebar.php';?>
            <!-- ============== CLOSING SIDEBAR ================== -->
        <div class="new-transaction-container">
            <div class="new-transaction-content">
                <p class="title-new-transaction">New Transaction Form</p>
                <div class="form-container">
                    <!-- ===============  START OF FORM =================== -->
                    <form action="includes/process.php" method="post" id="newCustomerForm">
                        <div class="transaction-label">
                        <label for="" style="margin-bottom: 0!important;">Transaction No:</label>
                        <?php 
                            include 'includes/handler.php';

                            $sql = "SELECT MAX(transaction_id) AS transaction_id FROM customers"; 
                            $result = $connection->query($sql) or die($connection->error);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    
                                    $id = $row["transaction_id"] + 1;

                                    if (strlen($id) == 1)
                                    {
                                        ?>
                                        <label for="" class="starting-trans-no">&nbsp;20-000<?php echo $id ?></label>
                                        <input type="hidden" name="transaction-number" id="transaction-number" value="<?php echo "20-000".$id ?>">
                                        <?php
                                    }
                                    elseif (strlen($id) == 2) 
                                    {
                                        ?>
                                        <label for="" class="starting-trans-no">&nbsp;20-00<?php echo $id ?></label>
                                        <input type="hidden" name="transaction-number" id="transaction-number" value="<?php echo "20-00".$id ?>">
                                        <?php
                                    }
                                    elseif (strlen($id) == 3) {
                                        ?>
                                        <label for="" class="starting-trans-no">&nbsp;20-0<?php echo $id ?></label>
                                        <input type="hidden" name="transaction-number" id="transaction-number" value="<?php echo "20-0".$id ?>">
                                        <?php
                                    }
                                    elseif (strlen($id) == 4) {
                                        ?>
                                        <label for="" class="starting-trans-no">&nbsp;20-<?php echo $id ?></label>
                                        <input type="hidden" name="transaction-number" id="transaction-number" value="<?php echo "20-".$id ?>">
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <label for="" class="starting-trans-no">&nbsp;20-0000</label>
                                        <input type="hidden" name="transaction-number" id="transaction-number" value="<?php echo "20-0000" ?>">   
                                        <?php
                                    }

                                }
                            }
                            ?>
                        </div>
                        <div class="basic-info" id="basic-info">
                        <input type="text" name="full-name" placeholder="Full Name" class="full-name" style="text-align: center">
                        <input type="number" name="contact-no" placeholder="Contact No." class="contact-no" style="text-align: center">
                        <input type="text" name="local" placeholder="Local" class="local" style="text-align: center">
                        <input type="date" name="date" placeholder="Price" class="date" style="text-align: center">
                        </div>
                        <p class="title-add-item">Add item</p>
                        <div class="main-item-container" id="add-item">
                            <div class="form-div">
                                <!-- INPUT TO SELECT FOR ITEM DROP DOWN -->
                            <select name="item-name" id="item-name" class="item-name dropdown-items" style="height: 25px; width: 250px!important; font-size: 15px; margin: 10px 5px; text-align:center; color: #222;">
                            <option value="">Select Item</option>
                            <option value="Coat">Coat</option>
                            <option value="Trubenized">Trubenized</option>
                            <option value="Louper">Louper</option>
                            <option value="Barong LS">Barong LS</option>
                            <option value="Barong SS">Barong SS</option>
                            <option value="P. Jusi">P. Jusi</option>
                            <option value="P. Cocoon">P. Cocoon</option>
                            <option value="Toga">Toga</option>
                            <option value="Finance Male">Finance Male</option>
                            <option value="Finance Female">Finance Female</option>
                            <option value="Secretariat Male">Secretariat Male</option>
                            <option value="Secretariat Female">Secretariat Female</option>
                            <option value="Diakonesa - Saya">Diakonesa - Saya</option>
                            <option value="PNK Uniform">PNK Uniform</option>
                            <option value="School Uniform">School Uniform</option>
                            <option value="School Uniform - Course">School Uniform - Course</option>
                            <option value="Repair">Repair</option>
                            <option value="Shoes">Shoes</option>
                            <option value="White Shirt">White Shirt</option>
                            <option value="Necktie">Necktie</option>
                            <option value="Bowtie">Bowtie</option>
                            <option value="Kamison">Kamison</option>
                            <option value="Hair Accessories">Hair Accessories</option>
                            <option value="Bag">Bag</option>
                            <option value="Clearbook">Clearbook</option>
                        </select>
                                <input type="number" name="quantity" id="quantity" placeholder="Quantity" class="qty" style="text-align: center">
                                <input type="text" name="prescriptions" id="prescriptions" placeholder="Prescription" class="presc" style="text-align: center">
                                <input type="number" name="price" id="price" placeholder="Price" class="price" style="text-align: center">
                            </div>
                            <a class="submit-item" style="background: #8b0b13; opacity: 0.8; color: #fff;" id="submit-item">Submit item</a>
                            
                        </div>
                       
                        <div class="table-container">
                        <p class="title-add-item" style="margin-bottom: 15px">Item list</p>
                        <div class="main-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ITEM NAME</th>
                                        <th>QUANTITY</th>
                                        <th>PRESCRIPTION</th>
                                        <th>PRICE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                
                                <tbody class="item-list" id="item-list">
                                </tbody>
                            </table>
                        </div>
                        <div class="table-price" style="border-top: 1px solid rgba(0,0,0,0.3); padding-top: 15px;">
                            <label for="" class="price-style">Total Price: </label>
                            <input type="number" disabled class="price-label" id="price-label" name="price-label" style="margin-left: 70px; font-weight: normal; width: 150px!important; text-align: center; font-size: 16px;">
                        </div>
                        <div class="table-price">
                            <label for="" class="price-style">Amount Received: </label>
                            <input type="number" style="margin-bottom: 0!important; width: 150px!important; text-align: center; font-size: 16px;" class="amount-received" name="amtReceive" id="amtReceive">
                        </div>
                        <div class="table-price">
                            <label for="" class="price-style">Total Balance: </label>
                            <input type="number" disabled name="total-balance" id="total-balance" class="balance-label" style="margin-top: 5px; margin-left: 40px; width: 150px; font-size: 16px; text-align: center">
                        </div>
                        <div class="transaction-btns">
                            <button type="submit" class="btn-save trans-btn" name="saveCustomer">Save</button>
                            <button type="reset" class="btn-cancel trans-btn">Cancel</button>
                        </div>
                        </div>
                        </form>
                         <!-- ===============  END OF FORM =================== -->
                </div>
            </div>
        </div>
        <?php require 'views/footer.php';?>
        <script src="js/newtransaction.js"></script>
    <?php
        }
?>
<?php
    }
?>


    