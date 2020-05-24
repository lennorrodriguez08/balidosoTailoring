<?php


class chartJsMap {

    public function get_query_data_no_transaction()
    {
        include 'handler.php';

        $result = $connection->query("SELECT DISTINCT 
        (SELECT count(transaction_no) from customers WHERE date_of_transaction BETWEEN '2020-01-01' AND '2020-01-31') AS '1',
        (SELECT count(transaction_no) from customers WHERE date_of_transaction BETWEEN '2020-02-01' AND '2020-02-31') AS '2',
        (SELECT count(transaction_no) from customers WHERE date_of_transaction BETWEEN '2020-03-01' AND '2020-03-31') AS '3',
        (SELECT count(transaction_no) from customers WHERE date_of_transaction BETWEEN '2020-04-01' AND '2020-04-31') AS '4',
        (SELECT count(transaction_no) from customers WHERE date_of_transaction BETWEEN '2020-05-01' AND '2020-05-31') AS '5',
        (SELECT count(transaction_no) from customers WHERE date_of_transaction BETWEEN '2020-06-01' AND '2020-06-31') AS '6',
        (SELECT count(transaction_no) from customers WHERE date_of_transaction BETWEEN '2020-07-01' AND '2020-07-31') AS '7',
        (SELECT count(transaction_no) from customers WHERE date_of_transaction BETWEEN '2020-08-01' AND '2020-08-31') AS '8',
        (SELECT count(transaction_no) from customers WHERE date_of_transaction BETWEEN '2020-09-01' AND '2020-09-31') AS '9',
        (SELECT count(transaction_no) from customers WHERE date_of_transaction BETWEEN '2020-10-01' AND '2020-10-31') AS '10',
        (SELECT count(transaction_no) from customers WHERE date_of_transaction BETWEEN '2020-11-01' AND '2020-11-31') AS '11',
        (SELECT count(transaction_no) from customers WHERE date_of_transaction BETWEEN '2020-12-01' AND '2020-12-31') AS '12'
        FROM customers") or die($connection->error);

        return $result;
    }

    public function get_query_data_sale()
    {
        include 'handler.php';
        
        $result_gross_sale = $connection->query("SELECT DISTINCT
        (SELECT SUM(items.price * items.quantity)
        FROM items
        LEFT JOIN customers ON items.transaction_no = customers.transaction_no
        WHERE date_of_transaction BETWEEN '2020-01-01' AND '2020-01-31') AS '1', 
        
        (SELECT SUM(items.price * items.quantity)
        FROM items
        LEFT JOIN customers ON items.transaction_no = customers.transaction_no
        WHERE date_of_transaction BETWEEN '2020-02-01' AND '2020-02-31') AS '2',
        
        (SELECT SUM(items.price * items.quantity)
        FROM items
        LEFT JOIN customers ON items.transaction_no = customers.transaction_no
        WHERE date_of_transaction BETWEEN '2020-03-01' AND '2020-03-31') AS '3',
        
        (SELECT SUM(items.price * items.quantity)
        FROM items
        LEFT JOIN customers ON items.transaction_no = customers.transaction_no
        WHERE date_of_transaction BETWEEN '2020-04-01' AND '2020-04-31') AS '4',
        
        (SELECT SUM(items.price * items.quantity)
        FROM items
        LEFT JOIN customers ON items.transaction_no = customers.transaction_no
        WHERE date_of_transaction BETWEEN '2020-05-01' AND '2020-05-31') AS '5',
        
        (SELECT SUM(items.price * items.quantity)
        FROM items
        LEFT JOIN customers ON items.transaction_no = customers.transaction_no
        WHERE date_of_transaction BETWEEN '2020-06-01' AND '2020-06-31') AS '6',
        
        (SELECT SUM(items.price * items.quantity)
        FROM items
        LEFT JOIN customers ON items.transaction_no = customers.transaction_no
        WHERE date_of_transaction BETWEEN '2020-07-01' AND '2020-07-31') AS '7',
        
        (SELECT SUM(items.price * items.quantity)
        FROM items
        LEFT JOIN customers ON items.transaction_no = customers.transaction_no
        WHERE date_of_transaction BETWEEN '2020-08-01' AND '2020-08-31') AS '8',
        
        (SELECT SUM(items.price * items.quantity)
        FROM items
        LEFT JOIN customers ON items.transaction_no = customers.transaction_no
        WHERE date_of_transaction BETWEEN '2020-09-01' AND '2020-09-31') AS '9',
        
        (SELECT SUM(items.price * items.quantity)
        FROM items
        LEFT JOIN customers ON items.transaction_no = customers.transaction_no
        WHERE date_of_transaction BETWEEN '2020-10-01' AND '2020-10-31') AS '10',
        
        (SELECT SUM(items.price * items.quantity)
        FROM items
        LEFT JOIN customers ON items.transaction_no = customers.transaction_no
        WHERE date_of_transaction BETWEEN '2020-11-01' AND '2020-11-31') AS '11',
        
        (SELECT SUM(items.price * items.quantity)
        FROM items
        LEFT JOIN customers ON items.transaction_no = customers.transaction_no
        WHERE date_of_transaction BETWEEN '2020-12-01' AND '2020-12-31') AS '12'") or die($connection->error);

        return $result_gross_sale;

    }



    public function get_query_data_due() 
    {
        include 'handler.php';

        $result_gross_due = $connection->query("SELECT DISTINCT
        (SELECT SUM(x.total)
        FROM (SELECT SUM(items.price * items.quantity) - customers.amount_receive as total
              FROM items
              INNER JOIN customers ON items.transaction_no = customers.transaction_no
              WHERE date_of_transaction BETWEEN '2020-01-01' AND '2020-01-31'
              GROUP BY items.transaction_no
             ) as x) as '1',
             
             (SELECT SUM(x.total)
        FROM (SELECT SUM(items.price * items.quantity) - customers.amount_receive as total
              FROM items
              INNER JOIN customers ON items.transaction_no = customers.transaction_no
              WHERE date_of_transaction BETWEEN '2020-02-01' AND '2020-02-31'
              GROUP BY items.transaction_no
             ) as x) as '2',
             
             (SELECT SUM(x.total)
        FROM (SELECT SUM(items.price * items.quantity) - customers.amount_receive as total
              FROM items
              INNER JOIN customers ON items.transaction_no = customers.transaction_no
              WHERE date_of_transaction BETWEEN '2020-03-01' AND '2020-03-31'
              GROUP BY items.transaction_no
             ) as x) as '3',
             
             (SELECT SUM(x.total)
        FROM (SELECT SUM(items.price * items.quantity) - customers.amount_receive as total
              FROM items
              INNER JOIN customers ON items.transaction_no = customers.transaction_no
              WHERE date_of_transaction BETWEEN '2020-04-01' AND '2020-04-31'
              GROUP BY items.transaction_no
             ) as x) as '4',
             
             (SELECT SUM(x.total)
        FROM (SELECT SUM(items.price * items.quantity) - customers.amount_receive as total
              FROM items
              INNER JOIN customers ON items.transaction_no = customers.transaction_no
              WHERE date_of_transaction BETWEEN '2020-05-01' AND '2020-05-31'
              GROUP BY items.transaction_no
             ) as x) as '5',
             
             (SELECT SUM(x.total)
        FROM (SELECT SUM(items.price * items.quantity) - customers.amount_receive as total
              FROM items
              INNER JOIN customers ON items.transaction_no = customers.transaction_no
              WHERE date_of_transaction BETWEEN '2020-06-01' AND '2020-06-31'
              GROUP BY items.transaction_no
             ) as x) as '6',
             
             (SELECT SUM(x.total)
        FROM (SELECT SUM(items.price * items.quantity) - customers.amount_receive as total
              FROM items
              INNER JOIN customers ON items.transaction_no = customers.transaction_no
              WHERE date_of_transaction BETWEEN '2020-07-01' AND '2020-07-31'
              GROUP BY items.transaction_no
             ) as x) as '7',
             
             (SELECT SUM(x.total)
        FROM (SELECT SUM(items.price * items.quantity) - customers.amount_receive as total
              FROM items
              INNER JOIN customers ON items.transaction_no = customers.transaction_no
              WHERE date_of_transaction BETWEEN '2020-08-01' AND '2020-08-31'
              GROUP BY items.transaction_no
             ) as x) as '8',
             
             (SELECT SUM(x.total)
        FROM (SELECT SUM(items.price * items.quantity) - customers.amount_receive as total
              FROM items
              INNER JOIN customers ON items.transaction_no = customers.transaction_no
              WHERE date_of_transaction BETWEEN '2020-09-01' AND '2020-09-31'
              GROUP BY items.transaction_no
             ) as x) as '9',
             
             (SELECT SUM(x.total)
        FROM (SELECT SUM(items.price * items.quantity) - customers.amount_receive as total
              FROM items
              INNER JOIN customers ON items.transaction_no = customers.transaction_no
              WHERE date_of_transaction BETWEEN '2020-10-01' AND '2020-10-31'
              GROUP BY items.transaction_no
             ) as x) as '10',
             
             (SELECT SUM(x.total)
        FROM (SELECT SUM(items.price * items.quantity) - customers.amount_receive as total
              FROM items
              INNER JOIN customers ON items.transaction_no = customers.transaction_no
              WHERE date_of_transaction BETWEEN '2020-11-01' AND '2020-11-31'
              GROUP BY items.transaction_no
             ) as x) as '11',
             
             (SELECT SUM(x.total)
        FROM (SELECT SUM(items.price * items.quantity) - customers.amount_receive as total
              FROM items
              INNER JOIN customers ON items.transaction_no = customers.transaction_no
              WHERE date_of_transaction BETWEEN '2020-12-01' AND '2020-12-31'
              GROUP BY items.transaction_no
             ) as x) as '12'") or die($connection->error);


        return $result_gross_due;
    }
}