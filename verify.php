<?php
include 'db.php'; // Include the database connection

if (isset($_GET['code'])) {
    $verification_code = $_GET['code'];

    // Verify the account
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE verification_code = ? AND verified = 0");
    $stmt->bind_param("s", $verification_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $stmt = $mysqli->prepare("UPDATE users SET verified = 1 WHERE verification_code = ?");
        $stmt->bind_param("s", $verification_code);
        $stmt->execute();
        echo "Account verified! You can now log in.";
    } else {
        echo "Invalid or already verified code!";
    }
}
?>
