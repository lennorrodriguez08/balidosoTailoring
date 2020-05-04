<?php

class query 
{
    
    public function findId($var1, $var2, $var3, $var4)
    {
        include 'handler.php';
        $id;
        $result = $connection->query("SELECT MIN($var1) AS transaction_no FROM $var2 WHERE $var3 = '$var4' ") or die($connection->error);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row['transaction_no'];
            }
        }
        $connection->close();
        return $id;
    }



    public function updateCoat($var1, $var2, $var3, $var4, $var5, $var6, $var7, $var8, $var9, $var10, $var11, $var12, $varId)
    {
        include 'handler.php';
        $connection->query("UPDATE coat 
        SET shoulder ='$var1', length = '$var2', arm_1 = '$var3', arm_2 = '$var4', arm_3 = '$var5', chest = '$var6', waist = '$var7', hips  = '$var8', armhole  = '$var9', down  = '$var10', front  = '$var11', back  = '$var12'
        WHERE transaction_no='$varId'") or die($connection->error);

        $connection->close();
    }



    public function updateBarong($var1, $var2, $var3, $var4, $var5, $var6, $var7, $var8, $var9, $var10, $var11, $var12, $varId)
    {
        include 'handler.php';
        $connection->query("UPDATE barong 
        SET shoulder ='$var1', length = '$var2', arm_ls_1 = '$var3', arm_ls_2 = '$var4', arm_ss_1 = '$var5', arm_ss_2 = '$var6', chest = '$var7', waist  = '$var8', hips  = '$var9', armhole  = '$var10', neck  = '$var11', slit  = '$var12'
        WHERE transaction_no='$varId'") or die($connection->error);
        $connection->close();
    }



    public function updatePants($var1, $var2, $var3, $var4, $var5, $var6, $var7, $var8, $var9, $varId)
    {
        include 'handler.php';
        $connection->query("UPDATE pants 
        SET waistline ='$var1', hips = '$var2', armhole = '$var3', length = '$var4', crotch = '$var5', legs = '$var6', knee = '$var7', bottom = '$var8', pleats = '$var9' 
        WHERE transaction_no='$varId'") or die($connection->error);
        $connection->close();
    }

    public function updateMeasurement($var1, $varId)
    {
        include 'handler.php';
        $connection->query("UPDATE measurement SET notes = '$var1' WHERE transaction_no = '$varId' ") or die($connection->error);
        $connection->close();
    }


    public function QUERY_INSERT_CUSTOMER($var1, $var2, $var3, $var4, $var5, $var6, $var7)
    {
        include 'handler.php';

        $connection->query("INSERT INTO customers (transaction_no, fullname, contact, local, date, date_of_transaction, amount_receive, notes, released, delivered) VALUES ('$var1', '$var2', '$var3', '$var4', '$var5', '$var7', '$var6', '', 'false', 'false') ") or die($connection->error);

        $connection->query("INSERT INTO measurement (transaction_no, fullname) VALUES ('$var1', '$var2') ") or die($connection->error);

        $connection->query("INSERT INTO barong (transaction_no) VALUES ('$var1') ") or die($connection->error);
        $connection->query("INSERT INTO coat (transaction_no) VALUES ('$var1') ") or die($connection->error);
        $connection->query("INSERT INTO pants (transaction_no) VALUES ('$var1') ") or die($connection->error);
        
        $connection->close();
    }

    public function insertItems($var1, $var2, $var3, $var4, $var5)
    {
        $connection->query("INSERT INTO items (transaction_no, item_name, quantity, prescription, button) VALUES ('$var1', '$var2', '$var3', '$var4', '$var5', '$var6') ") or die($connection->error);
        $connection->close();
    }


    //Populate records table
    function QUERY_POPULATE_RECORDS_TABLE($var1, $var2)
    {
        include 'handler.php';
        $result = $connection->query($var1) or die($connection->error);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $tid = $row['transaction_no'];
                $released = $row['released'];
                $delivered = $row['delivered'];
                $releasedStyle = "";

                // Validations for released button 
                if ($released == "" || $released == null || $released == "false")
                {
                    $releasedStyle = "cursor:pointer;background: #333;";
                }
                elseif ($released == "true" || $released != null) {
                    $releasedStyle = "cursor:pointer;background:green;";
                }
                else {
                    $releasedStyle = "cursor:pointer;";
                }
                
                // Validations for delivered button 
                if ($delivered == "" || $delivered == null || $delivered == "false")
                {
                    $deliveredStyle = "cursor:pointer;background: #333;";
                }
                elseif ($delivered == "true" || $delivered != null) {
                    $deliveredStyle = "cursor:pointer;background:green;";
                }
                else {
                    $deliveredStyle = "cursor:pointer;";
                }



                echo "<tr>
                
                <td>".$tid."</td><td>".$row['date']."</td><td>".$row['fullname']."</td>
                
                <td>".$row['item_name']."</td><td>".$row['quantity']."</td><td>".$row['prescription']."</td><td>".$row['total_price']."</td>
                
                <td>".$row['amount_receive']."</td><td>".$row['balance']."</td>
                
                <td class='text-center'><a data-id2='".$row['transaction_no']."' name='released' class='released' style=$releasedStyle>Released</a><a data-id2='".$row['transaction_no']."' name='delivered' class='delivered' style=$deliveredStyle>Delivered</a><a id='$var2' name='$var2' class='$var2' data-id2='".$row['transaction_no']."' style='cursor:pointer;'>Update</a><a href='invoice.php?transactionId=".$row['transaction_no']."&contact=".$row['contact']."&local=".$row['local']."&date=".$row['date']."&name=".$row['fullname']."&items=".$row['item_name']."&qty=".$row['quantity']."&presc=".$row['prescription']."&totalPrc=".$row['total_price']."&rcv=".$row['amount_receive']."&bal=".$row['balance']."&unit_price=".$row['unit_price']."' target='_blank' id='invoice' name='invoice'>Invoice</a></td> 
                
                <td class='text-center'><textarea class='customerNotes' name='customerNotes' data-notes='".$row['transaction_no']."' placeholder='' autocomplete='disabled'>".$row['notes']."</textarea></td></tr>";
            }
        }

        $connection->close();
    }
    


    function QUERY_DATA_NEW_TRANSACTION($var1, $var2, $var3, $var4, $var5)
    {
        include 'handler.php';

        $sql = "INSERT INTO items (transaction_no, item_name, quantity, prescription, price, transaction_no_b, item_name_b, quantity_b, prescription_b, price_b) VALUES ('{$var1}', '{$var2}', '{$var3}', '{$var4}', '{$var5}', '{$var1}', '{$var2}', '{$var3}', '{$var4}', '{$var5}')";
        $connection->query($sql) or die($connection->error);


        $select = "SELECT * FROM items WHERE transaction_no = '$var1'";
        $result = $connection->query($select) or die($connection->error);

        if ($result->num_rows > 0)
        {
            
            while ($row = $result->fetch_assoc())
            {
                echo "
                    <tr>
                        <td style='text-align: center;'>".$row['item_name']."</td>
                        <td style='text-align: center;'>".$row['quantity']."</td>
                        <td style='text-align: center;'>".$row['prescription']."</td>
                        <td style='text-align: center;' class='price'>".$row['price']." <input type='hidden' values=".$row['price']."></td>
                        <td style='text-align: center;'><a class='delete_btn' data-id1='".$row['item_id']."' id='delete_btn' style='cursor: pointer;'>Delete</a></td>
                        
                    </tr>
                ";
            }
        }

        $connection->close();
    }



    // Sort data function active task
    function QUERY_SORT_DATA($var1, $var2, $var3, $var4, $var5)
    {
        include 'handler.php';
        $sortName = $var1;
        $sortTransNo = $var2;
        $sortDateFrom = $var3;
        $sortDateTo = $var4;
        $sortStatusReleased = "";
        $sortStatusDelivered = "";


        // Date
        if ($sortDateFrom == "" || $sortDateFrom == NULL)
        {
            $sortDateFrom = "0000-00-00";
        }
        if ($sortDateFrom == "" || $sortDateTo == NULL)
        {
            $sortDateTo = "2100-12-12";
        }
        if ($sortDateFrom == "" && $sortDateTo == "")
        {
            $sortDateFrom = "0000-00-00";
            $sortDateTo = "2100-12-12";
        }


        // Status
        if ($var5 == "released")
        {
            $sortStatusReleased = "true";
        }
        elseif ($var5 == "delivered") 
        {
            $sortStatusDelivered = "true";
        }
        elseif ($var5 == "released_delivered") 
        {
            $sortStatusReleased = "true";
            $sortStatusDelivered = "true";
        }
        else
        {
            // return false
        }


        $sql = "SELECT 
        customers.transaction_no, 
        customers.fullname,
        customers.date,
        customers.notes,
        customers.released,
        customers.delivered,
        GROUP_CONCAT(items.prescription SEPARATOR '<br>') AS prescription,
        GROUP_CONCAT(item_name SEPARATOR '<br>') AS item_name, 
        GROUP_CONCAT(items.quantity SEPARATOR '<br>') AS quantity,
        SUM((quantity * price)) AS total_price,
        customers.amount_receive,
        ((SUM(items.quantity * items.price)) - (customers.amount_receive)) AS balance
        FROM customers INNER JOIN items ON customers.transaction_no = items.transaction_no
        WHERE customers.fullname LIKE '%$sortName%' AND customers.transaction_no LIKE '%$sortTransNo%' AND released LIKE '%$sortStatusReleased%' AND delivered LIKE '%$sortStatusDelivered%' AND (released = 'false' OR delivered = 'false') AND (customers.date BETWEEN '$sortDateFrom' AND '$sortDateTo')
        GROUP BY items.transaction_no";

        $result = $connection->query($sql) or die($connection->error);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $tid = $row['transaction_no'];
                $released = $row['released'];
                $delivered = $row['delivered'];
                $releasedStyle = "";

                // Validations for released button 
                if ($released == "" || $released == null || $released == "false")
                {
                    $releasedStyle = "cursor:pointer;background: #333;";
                }
                elseif ($released == "true" || $released != null) {
                    $releasedStyle = "cursor:pointer;background:green;";
                }
                else {
                    $releasedStyle = "cursor:pointer;";
                }
                
                // Validations for delivered button 
                if ($delivered == "" || $delivered == null || $delivered == "false")
                {
                    $deliveredStyle = "cursor:pointer;background: #333;";
                }
                elseif ($delivered == "true" || $delivered != null) {
                    $deliveredStyle = "cursor:pointer;background:green;";
                }
                else {
                    $deliveredStyle = "cursor:pointer;";
                }

                echo "<tr>
                
                <td>".$tid."</td><td>".$row['date']."</td><td>".$row['fullname']."</td>
                
                <td>".$row['item_name']."</td><td>".$row['quantity']."</td><td>".$row['prescription']."</td><td>".$row['total_price']."</td>
                
                <td>".$row['amount_receive']."</td><td>".$row['balance']."</td>
                
                <td class='text-center'><a data-id2='".$row['transaction_no']."' name='released' class='released' style=$releasedStyle>Released</a><a data-id2='".$row['transaction_no']."'  name='delivered' class='delivered' style=$deliveredStyle>Delivered</a><a id='editModal' name='editModal' class='editModal' data-id2='".$row['transaction_no']."' style='cursor:pointer;'>Update</a><a href='#' id='invoice' name='invoice'>Invoice</a></td> 
                
                <td class='text-center'><textarea class='customerNotes' name='customerNotes' data-notes='".$row['transaction_no']."' placeholder='Put Orders Update Here..' autocomplete='disabled'> ".$row['notes']." </textarea></td></tr>";
            }
        }

        $connection->close();
    }



    // Sort data function active task
    function QUERY_SORT_DATA_C($var1, $var2, $var3, $var4)
    {
        include 'handler.php';
        $sortName = $var1;
        $sortTransNo = $var2;
        $sortDateFrom = $var3;
        $sortDateTo = $var4;

        // Date
        if ($sortDateFrom == "" || $sortDateFrom == NULL)
        {
            $sortDateFrom = "0000-00-00";
        }
        if ($sortDateFrom == "" || $sortDateTo == NULL)
        {
            $sortDateTo = "2100-12-12";
        }
        if ($sortDateFrom == "" && $sortDateTo == "")
        {
            $sortDateFrom = "0000-00-00";
            $sortDateTo = "2100-12-12";
        }
        

        $sql = "SELECT 
        customers.transaction_no, 
        customers.fullname,
        customers.date,
        customers.notes,
        customers.released,
        customers.delivered,
        GROUP_CONCAT(items.prescription SEPARATOR '<br>') AS prescription,
        GROUP_CONCAT(item_name SEPARATOR '<br>') AS item_name, 
        GROUP_CONCAT(items.quantity SEPARATOR '<br>') AS quantity,
        SUM((quantity * price)) AS total_price,
        customers.amount_receive,
        ((SUM(items.quantity * items.price)) - (customers.amount_receive)) AS balance
        FROM customers INNER JOIN items ON customers.transaction_no = items.transaction_no
        WHERE customers.fullname LIKE '%$sortName%' AND customers.transaction_no LIKE '%$sortTransNo%' AND customers.date BETWEEN '$sortDateFrom' AND '$sortDateTo' AND (released = 'true' AND delivered = 'true')
        GROUP BY items.transaction_no";

        $result = $connection->query($sql) or die($connection->error);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $tid = $row['transaction_no'];
                $released = $row['released'];
                $delivered = $row['delivered'];
                $releasedStyle = "";

                // Validations for released button 
                if ($released == "" || $released == null || $released == "false")
                {
                    $releasedStyle = "cursor:pointer;background: #333;";
                }
                elseif ($released == "true" || $released != null) {
                    $releasedStyle = "cursor:pointer;background:green;";
                }
                else {
                    $releasedStyle = "cursor:pointer;";
                }
                
                // Validations for delivered button 
                if ($delivered == "" || $delivered == null || $delivered == "false")
                {
                    $deliveredStyle = "cursor:pointer;background: #333;";
                }
                elseif ($delivered == "true" || $delivered != null) {
                    $deliveredStyle = "cursor:pointer;background:green;";
                }
                else {
                    $deliveredStyle = "cursor:pointer;";
                }

                echo "<tr>
                
                <td>".$tid."</td><td>".$row['date']."</td><td>".$row['fullname']."</td>
                
                <td>".$row['item_name']."</td><td>".$row['quantity']."</td><td>".$row['prescription']."</td><td>".$row['total_price']."</td>
                
                <td>".$row['amount_receive']."</td><td>".$row['balance']."</td>
                
                <td class='text-center'><a data-id2='".$row['transaction_no']."' name='released' class='released' style=$releasedStyle>Released</a><a data-id2='".$row['transaction_no']."'  name='delivered' class='delivered' style=$deliveredStyle>Delivered</a><a id='editModal' name='editModal' class='editModal' data-id2='".$row['transaction_no']."' style='cursor:pointer;'>Update</a><a href='#' id='invoice' name='invoice'>Invoice</a></td> 
                
                <td class='text-center'><textarea class='customerNotes' name='customerNotes' data-notes='".$row['transaction_no']."' placeholder='Put Orders Update Here..' autocomplete='disabled'> ".$row['notes']." </textarea></td></tr>";
            }
        }

        $connection->close();
    }

    // Edit modal
    function QUERY_EDIT_MODAL($var1)
    {
    include 'handler.php';

    $sql = "SELECT * FROM items WHERE transaction_no = '$var1'";
    $sql2 = "SELECT a.*, b.amount_receive FROM items a, customers b WHERE a.transaction_no = b.transaction_no AND a.transaction_no = '$var1' LIMIT 1";

    $result2 = $connection->query($sql2) or die($connection->error); // This query is for populating the amount receive for the given transaction_no
    $result = $connection->query($sql) or die($connection->error); //This query is for populating the items and their qty for the given transaction_no

    if ($result2->num_rows > 0) 
    {
        while ($row = $result2->fetch_assoc()) 
        {
            echo "<div style='padding: 20px 0'>";
            echo "<span style='font-weight: bold;'>Payment receive:</span> <input type='text' name='edit_amount_receive' id='edit_amount_receive' class='edit_amount_receive' value='".$row['amount_receive']."'>";
            echo "</div>";
            echo "
            <table cellpadding='0' cellspacing='0' border='0' role='presentation'>
                <div class='table'>
                <thead>
                    <tr>
                        <th style='width: 150px!important;'>Item Name</th>
                        <th style='width: 150px!important;'>Quantity</th>
                        <th style='width: 150px!important;'>Item price</th>
                    </tr>
                    </thead>
            ";
            echo "<tbody>";
        }
    }

    if ($result->num_rows > 0)
    {   
        while ($row = $result->fetch_assoc()) {
            
            echo "<tr>
            
            <td>".$row['item_name']."</td>

            <td><input class='qty' name='qty' id='qty' value='".$row['quantity']."' disabled><button data-id3='".$row['item_id']."' id='addQty' name='addQty' class='btnAction addQty'>+</button> <button data-id3='".$row['item_id']."' id='minusQty' name='minusQty' class='btnAction minusQty'>-</button> <button data-id3='".$row['item_id']."' id='deleteItem' name='deleteItem' class='btnAction deleteItem'>delete</button></td>

            <td><input class='prc' name='prc' data-id3='".$row['item_id']."' value='".$row['price']."'></td>
            
            </tr>";
        }
        echo "</tbody>";
        echo "
            </div>
        </table>
        ";
        echo "
            <div class='buttons'>
               <a id='saveTransactionRecord' name='saveTransactionRecord' class='saveTransactionRecord' data-id5='$var1' style='cursor:pointer;'>Save</a>
               <a id='cancelTransactionRecord' name='cancelTransactionRecord' class='cancelTransactionRecord' style='cursor:pointer;'>Cancel</a>
            </div>
            ";
        }
        $connection->close();

    }



    // Modal form
    function QUERY_MODAL_FORM($var1, $var2, $var3)
    {

    include 'handler.php';
    $sql = "";

    if ($var3 == "add")
    {
        $sql = "UPDATE items
        SET quantity = quantity + 1
        WHERE item_id = $var1";
    }
    elseif ($var3 == "minus") 
    {
        $sql = "UPDATE items 
        SET quantity = CASE WHEN quantity = 1 THEN quantity ELSE quantity - 1 END
        WHERE item_id = $var1";
    }
    elseif ($var3 == "deleteItem") 
    {
        $sql = "DELETE FROM items WHERE item_id = $var1";
    }

    $connection->query($sql) or die($connection->error);

    $select = "SELECT * FROM items WHERE transaction_no = '$var2'";
    $sql2 = "SELECT a.*, b.amount_receive FROM items a, customers b WHERE a.transaction_no = b.transaction_no AND a.transaction_no = '$var2' LIMIT 1";


    $result2 = $connection->query($sql2) or die($connection->error); // This query is for populating the amount receive for the given transaction_no
    $result = $connection->query($select) or die($connection->error);

    if ($result2->num_rows > 0) 
    {
        while ($row = $result2->fetch_assoc()) 
        {
            echo "<div style='padding: 20px 0'>";
            echo "<span style='font-weight: bold;'>Payment receive:</span> <input type='text' name='edit_amount_receive' id='edit_amount_receive' class='edit_amount_receive' value='".$row['amount_receive']."'>";
            echo "</div>";
            echo "
            <table cellpadding='0' cellspacing='0' border='0' role='presentation'>
                <div class='table'>
                <thead>
                    <tr>
                        <th style='width: 150px!important;'>Item Name</th>
                        <th style='width: 150px!important;'>Quantity</th>
                        <th style='width: 150px!important;'>Item price</th>
                    </tr>
                    </thead>
            ";
            echo "<tbody>";
        }
    }

    if ($result->num_rows > 0)
    {   
        while ($row = $result->fetch_assoc()) {
            
            echo "<tr>
            
            <td>".$row['item_name']."</td>

            <td><input class='qty' name='qty' id='qty' value='".$row['quantity']."' disabled><button data-id3='".$row['item_id']."' id='addQty' name='addQty' class='btnAction addQty'>+</button> <button data-id3='".$row['item_id']."' id='minusQty' name='minusQty' class='btnAction minusQty'>-</button> <button data-id3='".$row['item_id']."' id='deleteItem' name='deleteItem' class='btnAction deleteItem'>delete</button></td>

            <td><input class='prc' name='prc' id='prc' value='".$row['price']."'></td>
            
            </tr>";
        }
        echo "</tbody>";
        echo "
            </div>
        </table>
        ";
        echo "
            <div class='buttons'>
               <a id='saveTransactionRecord' name='saveTransactionRecord' class='saveTransactionRecord' data-id5='$var2' style='cursor:pointer;'>Save</a>
               <a id='cancelTransactionRecord' name='cancelTransactionRecord' class='cancelTransactionRecord' style='cursor:pointer;'>Cancel</a>
            </div>
            ";
        }

        $connection->close();
    }


    function QUERY_GET_PRINT_VALUES($var1)
    {
        include 'handler.php';
        $SQL = "SELECT MIN(m_id), transaction_no FROM measurement WHERE fullname = '$var1'";
        $result = $connection->query($SQL) or die($connection->error);

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $transaction_no = $row["transaction_no"];
                $SQL_SELECT_MEASUREMENT_INFO = "SELECT coat.transaction_no AS transaction_no,
                CONCAT (coat.shoulder, ' - ', barong.shoulder) AS shoulder,
                measurement.fullname,
                measurement.notes,
                coat.length AS c_length,
                coat.chest AS chest,
                coat.waist AS waist,
                coat.hips AS c_hips,
                CONCAT (coat.armhole, ' - ', barong.armhole) AS armhole,
                CONCAT (coat.arm_1, ' / ', coat.arm_2, ' / ', coat.arm_3) AS armlength,
                barong.arm_ls_1 AS arm_ls_1,
                barong.arm_ls_2 AS arm_ls_2,
                barong.arm_ss_1 AS arm_ss_1,
                barong.arm_ss_2 AS arm_ss_2,
                coat.down AS down,
                coat.front AS front,
                coat.back AS back,
                barong.neck AS neck,
                barong.slit AS slit,
                pants.waistline AS waistline,
                pants.hips AS p_hips,
                pants.length AS p_length,
                pants.crotch AS crotch,
                pants.legs AS legs,
                pants.knee AS knee,
                pants.bottom AS bottom,
                pants.pleats AS pleats
                FROM coat INNER JOIN barong ON barong.transaction_no = coat.transaction_no 
                INNER JOIN pants ON pants.transaction_no = barong.transaction_no 
                INNER JOIN measurement ON measurement.transaction_no = coat.transaction_no
                WHERE coat.transaction_no = '$transaction_no'
                GROUP BY coat.transaction_no";

                $result_2 = $connection->query($SQL_SELECT_MEASUREMENT_INFO) or die($connection->error);
                if ($result_2->num_rows > 0)
                {
                    while ($row = $result_2->fetch_assoc())
                    {
                        echo "printmeasurement.php?transaction_no=".$row['transaction_no']."&shoulder=".$row['shoulder']."&fullname=".$row['fullname']."&c_length=".$row['c_length']."&chest=".$row['chest']."&waist=".$row['waist']."&c_hips=".$row['c_hips']."&armhole=".$row['armhole']."&armlength=".$row['armlength']."&arm_ls_1=".$row['arm_ls_1']."&arm_ls_2=".$row['arm_ls_2']."&arm_ss_1=".$row['arm_ss_1']."&arm_ss_2=".$row['arm_ss_2']."&down=".$row['down']."&front=".$row['front']."&back=".$row['back']."&neck=".$row['neck']."&slit=".$row['slit']."&waistline=".$row['waistline']."&p_hips=".$row['p_hips']."&p_length=".$row['p_length']."&crotch=".$row['crotch']."&legs=".$row['legs']."&knee=".$row['knee']."&bottom=".$row['bottom']."&pleats=".$row['pleats']."&notes=".$row['notes']."";
                    }
                }
            }
        }
    }

    // Codes for getting the notes on selected client
    function QUERY_GET_NOTE_VALUES($var1)
    {
        include 'handler.php';
        $SQL = "SELECT MIN(m_id), transaction_no, notes FROM measurement WHERE fullname = '$var1'";
        $result = $connection->query($SQL) or die($connection->error);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                echo $row['notes'];
            }
        }

        $connection->close();
    }

    // Save transaction records
    function QUERY_SAVE_TRANSACTION_RECORD($var1, $var2, $var3)
    {
        include 'handler.php';
        $sql = "UPDATE items SET item_id_b = item_id, transaction_no_b = transaction_no, item_name_b = item_name, quantity_b = quantity, prescription_b = prescription, price_b = price";
        $sql2 = "UPDATE customers SET amount_receive = $var2 WHERE transaction_no = '$var3'";
        $connection->query($sql) or die($connection->error);
        $connection->query($sql2) or die($connection->error);
        $connection->close();
        header("Location: ../transactionrecords.php");
    }

    // Cancel transaction
    function QUERY_CANCEL_TRANSACTION()
    {
        $query->QUERY_CANCEL_TRANSACTION();
        $sql = "UPDATE items SET item_id = item_id_b, transaction_no = transaction_no_b, item_name = item_name_b, quantity = quantity_b, prescription = prescription_b, price = price_b";
        $connection->query($sql) or die($connection->error);
        $connection->close();
        header("Location: ../transactionrecords.php");
    }

    // Saving Notes
    function QUERY_NOTES($var1, $var2)
    {
        include 'handler.php';
        $sql = "UPDATE customers SET notes = '$var1' WHERE transaction_no = '$var2'";
        $connection->query($sql) or die($connection->error);
        $connection->close();
    }

    // Realtime price saving
    function QUERY_UPDATE_PRICE($var1, $var2, $var3)
    {
        include 'handler.php';
        $sql = "UPDATE items SET price = '$var1' WHERE item_id = '$var2' AND transaction_no = '$var3'";
        $connection->query($sql) or die($connection->error);
        $connection->close();
    }


    function QUERY_UPDATE_STATUS($var1, $var2, $var3)
    {
        include 'handler.php';
        $sql = "UPDATE customers SET $var1 = '$var3' WHERE transaction_no = '$var2'";
        $connection->query($sql) or die($connection->error);
        $connection->close();
    }
}