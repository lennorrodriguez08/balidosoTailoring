<?php 

    include "./includes/handler.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balidoso Tailoring | Print</title>
    <link rel="stylesheet" href="./css/invoice.css">
    <link rel="stylesheet" href="css/all.css">
</head>
<body>
    <div class="container">
        <div class="order-table">
            <p style="font-weight: bold; padding-bottom: 10px; text-align: center;">CASHFLOW FORM</p>
            <table border="1" cellpadding="0" cellspacing="0" role="presentation">
                <thead>
                    <tr>
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
                        $all_cashflow_result = mysqli_query($connection, $all_cashflow_query);

                        while ($row = mysqli_fetch_assoc($all_cashflow_result)) {
                            $cashflow_date = $row['cashflow_date'];
                            $cashflow_customer = $row['cashflow_customer'];
                            $cashflow_in = $row['cashflow_in'];
                            $cashflow_out = $row['cashflow_out'];
                            $cashflow_description = $row['cashflow_description'];
                            

                            ?>

                            <tr>
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
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>Total: <?php echo $count_cash_in_sum; ?></td>
                                <td>Total: <?php echo $count_cash_out_sum; ?></td>
                                <td>&nbsp;</td>
                            </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div class="container-1">
    <a href="" class="print-invoice"><i class="fas fa-print"></i>&nbsp;Print</a>
    </div>

    <script>
        let invoiceBody = document.querySelector('.container').innerHTML;
        let theBody = document.body.innerHTML;
        const invoiceBtn = document.querySelector('.print-invoice');

            invoiceBtn.addEventListener('click', function(e) {

                function printContent() {
                    document.body.innerHTML = invoiceBody;
                    window.print();
                    document.body.innerHTML = theBody;
                }

                printContent();
            });
    </script>

</body>
</html>

