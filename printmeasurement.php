<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balidoso Tailoring | Print </title>
    <link rel="stylesheet" href="./css/printmeasurement.css">
    <link rel="stylesheet" href="./css/all.css">
</head>
<body>
    <form action="" method="POST">
    <div class="container">
        <div class="container-wrapper">
            <div class="box-1">
                <div class="box">
                    <label for=""><strong>Name:</strong> <?php echo$_GET['fullname']; ?></label>
                    <label for="">Upper</label>
                    <label for="">Shoulder:&nbsp;<?php echo$_GET['shoulder']; ?></label>
                    <label for="">Length:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo$_GET['c_length']; ?></label>
                    <label for="">Chest:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo$_GET['chest']; ?></label>
                    <label for="">Waist:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo$_GET['waist']; ?></label>
                    <label for="">Hips:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo$_GET['c_hips']; ?></label>
                    <label for="">Arm Hole:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo$_GET['armhole']; ?> </label>
                    <label for="">Arm Length:&nbsp;<?php echo$_GET['armlength']; ?></label>
                    <label for="">LS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo$_GET['arm_ls_1']; ?> / <?php echo$_GET['arm_ls_2']; ?></label>
                    <label for="">SS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo$_GET['arm_ss_1']; ?> / <?php echo$_GET['arm_ss_2']; ?></label>
                </div>
                <div class="box">
                <strong>Due:</strong>
                <input name="due_date" placeholder="Set Due Date" class="textbox-n" value="" type="text" onfocus="(this.type='date')" style="border: none; height: 20px; width: 125px;">
                <label for="">Down:&nbsp;<?php echo$_GET['down']; ?></label>
                <label for="">Front:&nbsp;&nbsp;<?php echo$_GET['front']; ?></label>
                <label for="">Back:&nbsp;&nbsp;<?php echo$_GET['back']; ?></label>
                <label for="">Neck:&nbsp;&nbsp;<?php echo$_GET['neck']; ?></label>
                <label for="">Slit:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo$_GET['slit']; ?></label>
                </div>
            </div>
            <div>
                <div class="box-1">
                    <div class="box">
                        <label for=""><strong>Sewer Name:</strong></label>
                        <label for="">Pants</label>
                        <label for="">Waist Line: <?php echo$_GET['waistline']; ?></label>
                        <label for="">Hips:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo$_GET['p_hips']; ?></label>
                        <label for="">Length:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo$_GET['p_length']; ?></label>
                        <label for="">Crotch:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo$_GET['crotch']; ?></label>
                    </div>
                    <div class="box">
                        <input type="text" name="sewer_name" value="">
                        <label for="">&nbsp;</label>
                        <label for="">Legs:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo$_GET['legs']; ?></label>
                        <label for="">Knee:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo$_GET['knee']; ?></label>
                        <label for="">Bottom:&nbsp;&nbsp;<?php echo$_GET['bottom']; ?></label>
                        <?php 
                            if ($_GET['pleats'] == "true") {
                                ?>
                                    <input type='checkbox' name='pleats' id='pleats' checked>
                                <?php
                            }   else {
                                ?>
                                    <input type='checkbox' name='pleats' id='pleats'>
                                <?php
                            }
                        ?>
                        
                        <label for="" style="display: inline-block;"> Pleats</label>
                    </div>
                </div>
                <div>
                    <label for="">Note</label>
                    <textarea name="" id=""><?php echo$_GET['notes']; ?></textarea>
                </div>
            </div>
        </div>
    </div>
    </form>
   
    <div class="container-1">
    <a href="" class="print-invoice"><i class="fas fa-print"></i>&nbsp;Print</a>
    </div>

    <script>
        let invoiceBody = document.querySelector('.container').innerHTML;
        let theBody = document.body.innerHTML;
        const invoiceBtn = document.querySelector('.print-invoice');

            invoiceBtn.addEventListener('click', function(e) {

                function printContent() {
                    invoiceBtn.style.display = 'none';
                    
                    window.print();
                    document.body.innerHTML = theBody;
                }

                printContent();
            });
    </script>
</body>
</html>