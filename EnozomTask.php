<?php
    $pdo = new PDO('sqlite:Shop.db');
    $statement = $pdo->query("SELECT customers.firstname
    FROM customers JOIN invoices ON customers.CustomerId = invoices.CustomerId WHERE 
    
    (
      SELECT invoices.CustomerId, MAX(invoices.InvoiceId) AS max_items
        FROM invoices
        GROUP BY invoices.CustomerId LIMIT 1
    )");

    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($rows);

?>