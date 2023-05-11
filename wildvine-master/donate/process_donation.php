<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $amount = $_POST["amount"];

    // Validate the form data
    if (empty($name) || empty($email) || empty($phone) || empty($amount)) {
        // If any field is empty, redirect back to the donation page
        header("Location: donate.php?error=empty_fields");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // If the email is not valid, redirect back to the donation page
        header("Location: donate.php?error=invalid_email");
        exit();
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        // If the phone number is not valid, redirect back to the donation page
        header("Location: donate.php?error=invalid_phone");
        exit();
    }

    // If all the form data is valid, process the donation
    // Here, you can add your own code to process the donation
    // For example, you can save the donation information to a database,
    // send an email notification to the NGO, etc.

    // Redirect to a thank you page
    header("Location: thank_you.php");
    exit();

} else {
    // If the form is not submitted, redirect back to the donation page
    header("Location: donate.php");
    exit();
}
?>
