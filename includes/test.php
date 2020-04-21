<?php
require 'handler.php';

if (isset($_POST["populateTable"]))
{
    $sql = "SELECT 
    customers.transaction_id, 
    customers.fullname,
    GROUP_CONCAT(item_name SEPARATOR ',') AS item_name, 
    items.quantity,
    SUM((quantity * price)) AS total_price,
    customers.amount_receive,
    ((SUM(items.quantity * items.price)) - (customers.amount_receive)) AS balance
    FROM customers INNER JOIN items ON customers.transaction_id = items.transaction_id
    GROUP BY items.transaction_id";
    
    
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            echo "<tr><td>".$row['transaction_id']."</td><td>".$row['fullname']."</td><td>".$row['item_name']."</td><td>".$row['quantity']."</td><td>".$row['total_price']."</td><td>".$row['amount_receive']."</td><td>".$row['balance']."</td><td><a name='edit' id='edit' class='edit' data-id2='".$row['transaction_id']."'>Edit</a></td></tr>";
        }
    }
    
    $connection->close();
}




if (isset($_POST["dataId"]))
{
    $id = $_POST["dataId"];

    $sql = "SELECT * FROM items WHERE transaction_id = $id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0)
    {
        echo "<table>";
        echo "
        <thead>
        <tr>
          <th>item name</th>
          <th>quantity</th>
        </tr>
        </thead>
        ";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {

            echo "<tr><td>".$row['item_name']."</td><td><input class='qty' name='qty' id='qty' value='".$row['quantity']."'></td><td><button data-id3='".$row['item_id']."' id='addQty' name='addQty' class='btnAction addQty'><i class='fas fa-plus'></i></button> <button data-id3='".$row['item_id']."' id='minusQty' name='minusQty' class='btnAction minusQty'><i class='fas fa-minus'></i></button> <button style='color: maroon; font-weight: bold' data-id3='".$row['item_id']."' id='deleteItem' name='deleteItem' class='btnAction deleteItem'>Delete</button></td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "<a>save</a><a>cancel</a>";
    }
    $connection->close();
}




if (isset($_POST["buttonType"]))
{
    $id = $_POST["id3"];
    $id2 = $_POST["id2"];
    $buttonType = $_POST["buttonType"];
    $sql = "";

    if ($buttonType == "add")
    {
        $sql = "UPDATE items 
        SET quantity = quantity + 1
        WHERE item_id = $id";
    }
    elseif ($buttonType == "minus") 
    {
        $sql = "UPDATE items 
        SET quantity = CASE WHEN quantity = 1 THEN quantity ELSE quantity - 1 END
        WHERE item_id = $id";
    }
    elseif ($buttonType == "deleteItem") 
    {
        $sql = "DELETE FROM items WHERE item_id = $id";
    }

    $connection->query($sql) or die($connection->error);

    $select = "SELECT * FROM items WHERE transaction_id = $id2";
    $result = $connection->query($select) or die($connection->error);

    if ($result->num_rows > 0)
    {
        echo "<table>";
        echo "
        <thead>
        <tr>
          <th>item name</th>
          <th>quantity</th>
        </tr>
        </thead>
        ";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['item_name']."</td><td><input class='qty' name='qty' id='qty' value='".$row['quantity']."'></td><td><button data-id3='".$row['item_id']."' id='addQty' name='addQty' class='btnAction addQty'><i class='fas fa-plus'></i></button> <button data-id3='".$row['item_id']."' id='minusQty' name='minusQty' class='btnAction minusQty'><i class='fas fa-minus'></i></button> <button style='color: maroon; font-weight: bold' data-id3='".$row['item_id']."' id='deleteItem' name='deleteItem' class='btnAction deleteItem'>Delete</button></td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "<a id='saveItems'>save</a><a id='cancelItems'>cancel</a>";
    }

    $connection->close();
}