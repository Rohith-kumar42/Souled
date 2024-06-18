<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Open or create the file for appending
    $file = 'userdata.txt';
    $data = "";

    // Loop through all POST data and append it to $data
    foreach ($_POST as $key => $value) {
        // Append key-value pairs to $data
        $data .= "$key: $value\n";
    }

    // Append a separator for each form submission
    $data .= "------------------------\n";

    // Write the data to the file
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // Redirect the user to a success page or perform any other action
    header("Location: home.html");
    exit();
} else {
    // If the form is not submitted, redirect back to the form page
    header("Location: index.html");
    exit();
}
?>
