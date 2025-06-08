<?php
$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
//$message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
} else {
      // Process the form data (using prepared statements for database interaction)

    echo "Form submitted successfully";
}
?>