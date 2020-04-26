<?php 

    include "./includes/handler.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balidoso Tailoring | Invoice</title>
    <link rel="stylesheet" href="./css/invoice.css">
    <link rel="stylesheet" href="css/all.css">
</head>
<body>
    <div class="container">
        <div class="order-table">
            <p style="font-weight: bold; padding-bottom: 10px; text-align: center;">LIST OF ORDERS</p>
            <table border="1" cellpadding="0" cellspacing="0" role="presentation">
                <thead>
                    <tr>
                        <th>Date Of Order</th>
                        <th>Quantity</th>
                        <th>Item</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    
                        $all_orders_query = "SELECT * FROM orders ORDER BY id DESC";
                        $all_orders_result = mysqli_query($connection, $all_orders_query);

                        while ($row = mysqli_fetch_assoc($all_orders_result)) {
                            $order_date = $row['ordered_date'];
                            $order_qty = $row['qty'];
                            $order_name = $row['item_name'];

                            ?>

                            <tr>
                                <td><?php echo $order_date ?></td>
                                <td><?php echo $order_qty ?></td>
                                <td><?php echo $order_name ?></td>
                            </tr>

                       <?php }
                    
                    ?>

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

