<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balidoso Tailoring | Print Measurement</title>
    <link rel="stylesheet" href="./css/printmeasurement.css">
    <link rel="stylesheet" href="./css/all.css">
</head>
<body>

    <!-- Variables for get method -->
    <div style="width: 100%; text-align: center;">
        <h3>----Variable list-------</h3>
        <strong>transaction_no: </strong> <?php echo$_GET['transaction_no']; ?> <br>
        <strong>fullname: </strong> <?php echo$_GET['fullname']; ?> <br>
        <strong>shoulder: </strong> <?php echo$_GET['shoulder']; ?> <br>
        <strong>coat length: </strong> <?php echo$_GET['c_length']; ?> <br>
        <strong>chest: </strong> <?php echo$_GET['chest']; ?> <br>
        <strong>waist: </strong> <?php echo$_GET['waist']; ?> <br>
        <strong>coat hips: </strong> <?php echo$_GET['c_hips']; ?> <br>
        <strong>armhole: </strong> <?php echo$_GET['armhole']; ?> <br>
        <strong>armlength: </strong> <?php echo$_GET['armlength']; ?> <br>
        <strong>arm LS Left: </strong> <?php echo$_GET['arm_ls_1']; ?> <br>
        <strong>arm LS right: </strong> <?php echo$_GET['arm_ls_2']; ?> <br>
        <strong>arm SS left: </strong> <?php echo$_GET['arm_ss_1']; ?> <br>
        <strong>arm SS right: </strong> <?php echo$_GET['arm_ss_2']; ?> <br>
        <strong>down: </strong> <?php echo$_GET['down']; ?> <br>
        <strong>front: </strong> <?php echo$_GET['front']; ?> <br>
        <strong>back: </strong> <?php echo$_GET['back']; ?> <br>
        <strong>neck: </strong> <?php echo$_GET['neck']; ?> <br>
        <strong>slit: </strong> <?php echo$_GET['slit']; ?> <br>
        <strong>waistline: </strong> <?php echo$_GET['waistline']; ?> <br>
        <strong>pants hips: </strong> <?php echo$_GET['p_hips']; ?> <br>
        <strong>pants length: </strong> <?php echo$_GET['p_length']; ?> <br>
        <strong>crotch: </strong> <?php echo$_GET['crotch']; ?> <br>
        <strong>legs: </strong> <?php echo$_GET['legs']; ?> <br>
        <strong>knee: </strong> <?php echo$_GET['knee']; ?> <br>
        <strong>bottom: </strong> <?php echo$_GET['bottom']; ?> <br>
        <strong>pleats: </strong> <?php echo$_GET['pleats']; ?> <br><br>
    </div>
    <!-- END -->



    <form action="" method="POST">
    <div class="container">
        <div class="container-wrapper">
            <div class="box-1">
                <div class="box">
                    <label for=""><strong>Name:</strong> Ronnel Rodriguez</label>
                    <label for="">Upper</label>
                    <label for="">Shoulder:&nbsp;63 - 65</label>
                    <label for="">Length:&nbsp;&nbsp;&nbsp;&nbsp;63</label>
                    <label for="">Chest:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;63</label>
                    <label for="">Waist:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;63</label>
                    <label for="">Hips:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;63</label>
                    <label for="">Arm Hole:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10 - 20 </label>
                    <label for="">Arm Length:&nbsp;63 / 55 / 67</label>
                    <label for="">LS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;63 / 66</label>
                    <label for="">SS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;70 / 55</label>
                </div>
                <div class="box">
                <strong>Due:</strong>
                <input name="due_date" placeholder="Set Due Date" class="textbox-n" value="" type="text" onfocus="(this.type='date')" style="border: none; height: 20px; width: 125px;">
                <label for="">Down:&nbsp;00</label>
                <label for="">Front:&nbsp;&nbsp;00</label>
                <label for="">Back:&nbsp;&nbsp;00</label>
                <label for="">Neck:&nbsp;&nbsp;00</label>
                <label for="">Slit:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;00</label>
                </div>
            </div>
            <div>
                <div class="box-1">
                    <div class="box">
                        <label for=""><strong>Sewer Name:</strong></label>
                        <label for="">Pants</label>
                        <label for="">Waist Line: 55</label>
                        <label for="">Hips:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;55</label>
                        <label for="">Length:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;66</label>
                        <label for="">Crotch:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;90</label>
                        <label for="">Length:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;66</label>
                    </div>
                    <div class="box">
                        <input type="text" name="sewer_name" value="">
                        <label for="">&nbsp;</label>
                        <label for="">Legs:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;00</label>
                        <label for="">Knee:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;00</label>
                        <label for="">Bottom:&nbsp;&nbsp;00</label>
                        <input type="radio" name="" id="">
                        <label for="" style="display: inline-block;">No Pleats</label><br>
                        <input type="radio" name="" id="">
                        <label for="" style="display: inline-block;">With Pleats</label>
                    </div>
                </div>
                <div>
                    <label for="">Note</label>
                    <textarea name="" id=""></textarea>
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