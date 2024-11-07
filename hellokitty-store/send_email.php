<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $productName = htmlspecialchars($_POST['productName']);

    // Validate phone number
    if (!preg_match('/^\d{10}$/', $phone)) {
        echo "Invalid phone number format. Please enter a 10-digit phone number.";
        exit;
    }

    $to = "hallo.titty2@gmail.com"; // Your email address
    $subject = "New Order Submission";
    $body = "Order Details:\n\nProduct Name: $productName\nFirst Name: $firstName\nLast Name: $lastName\nQuantity: $quantity\nPhone: $phone\nAddress: $address";
    $headers = "From: no-reply@yourdomain.com";

    if (mail($to, $subject, $body, $headers)) {
        echo "Order submitted successfully!";
    } else {
        echo "Failed to submit order.";
    }
}
?>
