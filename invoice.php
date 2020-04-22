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
        <div class="container-wrapper">
            <div class="text-center">
                <p><strong>BALIDOSO TAILORING</strong></p>
                <p>#3 St. Peter St. Brgy. New Era, Quezon City</p>
                <p>Call Only: 0915-2808620 / 02-4561159 | Text Only: 0977-3224542</p>
                <p>balidosotailoring@gmail.com</p>
            </div>
        </div>
        <div class="info-wrapper">
            <div>
                <label for=""><strong>Name:</strong>&nbsp;
                    <?php echo $_GET['name']; ?>
                </label>
                <label for=""><strong>Contact No:</strong>&nbsp;
                    <?php echo $_GET['contact']; ?>
                </label>
                <label for=""><strong>Local:</strong>&nbsp;
                    <?php echo $_GET['local']; ?>
                </label>
            </div>
            <div>
                <label for=""><strong>Transaction No:</strong>&nbsp;
                    <?php echo $_GET['transactionId']; ?>
                </label>
                <label for=""><strong>Transaction Date:</strong>&nbsp;
                    <?php echo $_GET['date']; ?>
                </label>
                <label for=""><strong>Due Date:</strong>&nbsp;
                    <?php echo $_GET['date']; ?>
                </label>
            </div>
        </div>
        <div class="order-table">
            <table border="1" cellpadding="0" cellspacing="0" role="presentation">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $_GET['items']; ?></td>
                        <td><?php echo $_GET['qty']; ?></td>
                        <td><?php echo $_GET['presc']; ?></td>
                        <td><?php echo $_GET['unit_price']; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="amount-form">
                <div><label for=""><strong>Total Price:</strong>&nbsp;&nbsp;<?php echo $_GET['totalPrc']; ?></label>
                </div>
                <div><label for=""><strong>Received Amount:</strong>&nbsp;&nbsp;<?php echo $_GET['rcv']; ?></label>
                </div>
                <div><label for=""><strong>Due Amount:</strong>&nbsp;&nbsp;<?php echo $_GET['bal']; ?></label>
                </div>
            </div>
            <p class="note note-1"><strong>Note:</strong> For Coat: Please follow-up 2 weeks before due date.</p>
            <p class="note ">For Barong/Pants: Please follow-up 5 days before due date.</p>
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

