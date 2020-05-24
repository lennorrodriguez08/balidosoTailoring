
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
        <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon.png">
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="stylesheet" href="css/orders.css">
        <link rel="stylesheet" href="css/measurements.css">
        <link rel="stylesheet" href="css/transactionrecords.css">
        <link rel="stylesheet" href="css/transactionrecords_2.css">
        <link rel="stylesheet" href="css/cashflow.css">
        <!-- <link rel="stylesheet" href="css/newtransaction.css"> -->
        <link rel="stylesheet" href="css/all.css">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        

        <!-- Chart JS -->
        <script src="js/lib/Chart.bundle.min.js"></script>
        </head>
        <body>
        <!-- ============== NAVBAR ================== -->
            <nav>
                <div class="branding">
                    <p>Balidoso Tailoring </p>
                    <div class="welcome-user">
                        <p>You logged in as:&nbsp;</p>
                        <label id="role" for="" data-role="<?php echo $_SESSION['role']?>" style="text-transform: capitalize; font-weight: normal!important;"><?php echo $_SESSION["role"]?></label>
                        <a href="includes/logout.php" style="display: inline-block; color: #333; text-decoration: none; margin: 0 0.5rem; font-weight: bold">Log out</a>
                    </div>
                </div>
            </nav>
            <!-- ============== CLOSING NAVBAR ================== -->
    <?php
        }
?>
<?php
    }   
?>