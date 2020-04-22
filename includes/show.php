<?php

    require 'handler.php';



    if(isset($_POST['query']))
    {
        $fullname = $_POST['query'];

        $sql = "SELECT * FROM customers WHERE fullname=?;";
        
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../measurements?error=sqlerror");
            exit();
        }
        else
        {
            //This line binds the value of the user input
            mysqli_stmt_bind_param($stmt, "s", $fullname);
            
            //This line of code will execute the statement from the bind query to the db
            mysqli_stmt_execute($stmt);
            
            //Sets the result from the db using query
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) 
            {
                $transaction_no = $row['transaction_no'];

                $sql2 = "SELECT * FROM measurement WHERE transaction_no=".$transaction_no;
                $result2 = mysqli_query($connection, $sql2);

                // This line queries the 3 types then populate to the measurement page
                $sql3 = "SELECT * FROM coat WHERE transaction_no = '".$transaction_no."'";
                $sql4 = "SELECT * FROM barong WHERE transaction_no = '".$transaction_no."'";
                $sql5 = "SELECT * FROM pants WHERE transaction_no = '".$transaction_no."'";
                $result3 = mysqli_query($connection, $sql3);
                $result4 = mysqli_query($connection, $sql4);
                $result5 = mysqli_query($connection, $sql5);
                
                // This line populate the data for coat
                while($row = mysqli_fetch_array($result3))
                {
                    $transaction_id = $row['transaction_no'];
                    echo "<div class='form-flex-1' id='coat'>";
                    echo "<p class='title-coat'>Coat</p>";
                    echo "<label for=''>Shoulder</label><br/>";
                    echo "<input type='text' name='coat-shoulder' class='text-width' value=".$row['shoulder']."><br/>";
                    echo "<label for=''>Length</label><br/>";
                    echo "<input type='text' name='coat-length' class='text-width' value=".$row['length']."><br/>";
                    echo "<label for=''>Arm Length</label><br/>";
                    echo "<input type='text' name='coat-arm-length-left' class='arm-input' value=".$row['arm_1'].">";
                    echo "<input type='text' name='coat-arm-length-middle' class='arm-input margin-left-5px' value=".$row['arm_2'].">";
                    echo "<input type='text' name='coat-arm-length-right' class='arm-input margin-left-5px' value=".$row['arm_3'].">";
                    echo "<p class='title-body'>Body</p>";
                    echo "<label for='' class='margin-left-20px'>Chest</label><br/>";
                    echo "<input type='text' name='coat-body-chest' class='text-width margin-left-20px' value=".$row['chest']."><br/>";
                    echo "<label for='' class='margin-left-20px'>Waist</label><br/>";
                    echo "<input type='text' name='coat-body-waist' class='text-width margin-left-20px' value=".$row['waist']."><br/>";
                    echo "<label for='' class='margin-left-20px'>Hips</label><br/>";
                    echo "<input type='text' name='coat-body-hips' class='text-width margin-left-20px' value=".$row['hips']."><br/>";
                    echo "<label for='' class='title-arm-hole'>Arm Hole</label><br/>";
                    echo "<input type='text' name='coat-body-arm-hole' class='text-width' value=".$row['armhole']."><br/>";
                    echo "<label for=''>Down</label><br/>";
                    echo "<input type='text' name='coat-body-down' class='text-width' value=".$row['down']."><br/>";
                    echo "<label for=''>Front</label><br/>";
                    echo "<input type='text' name='coat-body-front' class='text-width' value=".$row['front']."><br/>";
                    echo "<label for=''>Back</label><br/>";
                    echo "<input type='text' name='coat-body-back' class='text-width' value=".$row['back']."><br/>";
                    echo "</div>";

                }

                // This line populate the data for barong
                while($row = mysqli_fetch_array($result4))
                {
                    
                    echo "<div class='form-flex-1'>";
                    echo "<p class='title-coat'>Barong</p>";
                    echo "<label for=''>Shoulder</label><br/>";
                    echo "<input type='text' name='barong-shoulder' class='text-width' value=".$row['shoulder']."><br/>";
                    echo "<label for=''>Length</label><br/>";
                    echo "<input type='text' name='barong-length' class='text-width' value=".$row['length']."><br/>";
                    echo "<label for=''>Arm Length</label><br/>";
                    echo "<span>LS:&nbsp;</span><input type='text' name='barong-ls-left' class='arm-input' value=".$row['arm_ls_1'].">/<input type='text' name='barong-ls-right' class='arm-input margin-left-5px' value=".$row['arm_ls_2']."><br/>";
                    echo "<span>SS:&nbsp;</span><input type='text' name='barong-ss-left' class='arm-input' value=".$row['arm_ss_1'].">/<input type='text' name='barong-ss-right' class='arm-input margin-left-5px' value=".$row['arm_ss_2']."><br/>";
                    echo "<p class='title-body'>Body</p>";
                    echo "<label for='' class='margin-left-20px'>Chest</label><br/>";
                    echo "<input type='text' name='barong-body-chest' class='text-width margin-left-20px' value=".$row['chest']."><br/>";
                    echo "<label for='' class='margin-left-20px'>Waist</label><br/>";
                    echo "<input type='text' name='barong-body-waist' class='text-width margin-left-20px' value=".$row['waist']."><br/>";
                    echo "<label for='' class='margin-left-20px'>Hips</label><br/>";
                    echo "<input type='text' name='barong-body-hips' class='text-width margin-left-20px' value=".$row['hips']."><br/>";
                    echo "<label for='' class='title-arm-hole'>Arm Hole</label><br/>";
                    echo "<input type='text' name='barong-arm-hole' class='text-width' value=".$row['armhole']."><br/>";
                    echo "<label for=''>Neck</label><br/>";
                    echo "<input type='text' name='barong-neck' class='text-width' value=".$row['neck']."><br/>";
                    echo "<label for=''>Slit</label><br/>";
                    echo "<input type='text' name='barong-slit' class='text-width' value=".$row['slit'].">";
                    echo "</div>";
                }

                // // This line populate the data for pants
                while($row = mysqli_fetch_array($result5))
                {
                    echo "<div class='form-flex-1'>";
                    echo "<p class='title-coat'>Pants</p>";
                    echo "<label for=''>Waist Line</label><br/>";
                    echo "<input type='text' name='pants-waist-line' class='text-width' value=".$row['waistline']."><br/>";
                    echo "<label for=''>Hips</label><br/>";
                    echo "<input type='text' name='pants-hips' class='text-width' value=".$row['hips']."><br/>";
                    echo "<label for=''>Arm Hole</label><br/>";
                    echo "<input type='text' name='pants-arm-hole' class='text-width' value=".$row['armhole']."><br/>";
                    echo "<label for=''>Length</label><br/>";
                    echo "<input type='text' name='pants-length' class='text-width' value=".$row['length']."><br/>";
                    echo "<label for=''>Crotch</label><br/>";
                    echo "<input type='text' name='pants-crotch' class='text-width' value=".$row['crotch']."><br/>";
                    echo "<label for='' class='title-legs'>Legs</label><br/>";
                    echo "<input type='text' name='pants-legs' class='text-width' value=".$row['legs']."><br/>";
                    echo "<label for=''>Knee</label><br/>";
                    echo "<input type='text' name='pants-knee' class='text-width' value=".$row['knee']."><br/>";
                    echo "<label for=''>Bottom</label><br/>";
                    echo "<input type='text' name='pants-bottom' class='text-width' value=".$row['bottom']."><br/>";
                    
                    if ($row['pleats'] == "true") 
                    {
                        echo "<input type='radio' name='pleats' class='text-width' value='false'>";
                        echo "<label for='' class='pleats'>No Pleats</label><br/>";
                        echo "<input type='radio' name='pleats' class='text-width' value='true' checked>";
                        echo "<label for=''>With Pleats</label><br/>";
                    }
                    else 
                    {
                        echo "<input type='radio' name='pleats' class='text-width' value='false' checked>";
                        echo "<label for='' class='pleats'>No Pleats</label><br/>";
                        echo "<input type='radio' name='pleats' class='text-width' value='true'>";
                        echo "<label for=''>With Pleats</label><br/>";
                    }
                    echo "</div>";
                }
                    
                
            }

            else 
            {
                header("Location: ../measurements?error=sqlerror_2");
                exit();
            }
        }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
    }
    else {
        header("Location: ../measurements?error=sqlerror_last");
        exit();
    }

?>