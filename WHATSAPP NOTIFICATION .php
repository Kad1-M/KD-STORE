<?php

/* ================= PAYFAST AUTO WHATSAPP SYSTEM ================= */

$payment_status = $_POST['payment_status'] ?? '';
$amount = $_POST['amount_gross'] ?? '';
$customer_email = $_POST['email_address'] ?? '';
$customer_phone = $_POST['custom_str1'] ?? ''; // We send phone from frontend later

if($payment_status == "COMPLETE"){

$messageOwner = "🔥 NEW ORDER PAID\n";
$messageOwner .= "Amount: R".$amount."\n";
$messageOwner .= "Customer: ".$customer_email;

/* ================= SEND TO STORE OWNER ================= */

file_get_contents("https://api.callmebot.com/whatsapp.php?
phone=0674665120
&text=".urlencode($messageOwner).
"&apikey=YOUR_CALLMEBOT_API_KEY");


/* ================= SEND TO CUSTOMER ================= */

if(!empty($customer_phone)){

$messageCustomer = "✅ Thank You For Your Order!\n";
$messageCustomer .= "Payment Received: R".$amount."\n";
$messageCustomer .= "KD STORE PREMIUM";

file_get_contents("https://api.callmebot.com/whatsapp.php?
phone=".$customer_phone."
&text=".urlencode($messageCustomer).
"&apikey=YOUR_CALLMEBOT_API_KEY");

}

}

http_response_code(200);
?>