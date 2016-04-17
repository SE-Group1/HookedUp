<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $username = getPOSTSafe('username');
    $password = getPOSTSafe('password');
    $firstName = getPOSTSafe('firstName');
    $lastName = getPOSTSafe('lastName');
    $email = getPOSTSafe('email');
    $phoneNumber = getPOSTSafe('phoneNumber');
    $birthday = getPOSTSafe('birthday');
    $secretQuestion = getPOSTSafe('secretQuestion');
    $secretAnswer = getPOSTSafe('secretAnswer');
    
    $conn = mysqlConnect();
    
    $query = 'INSERT INTO user VALUES (UUID(), DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?, ?, DEFAULT)';
    
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        fail("Prepare failed: ".$conn->error);
    }
    
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt->bind_param("sssssssss", $username, $hashedPass, $firstName, $lastName, $email, $phoneNumber, $birthday, $secretQuestion, $secretAnswer);
    
    if (!$stmt->execute()) {
        fail("Execute failed: " . $stmt->error);
    }
    
    success();