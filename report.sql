SELECT COUNT(*) FROM 'retailer_store';
SELECT COUNT(*) FROM 'customer_database';
SELECT COUNT(c_email) FROM 'purchase_record' WHERE r_email=""; 
SELECT SUM(money_spent_by_customer) FROM 'purchase_record' where r_email="" AND transaction_day="";
