<?php
function registerUser($username, $email, $password) {
    $conn = getDBConnection();
    
    // Check if user already exists
    $query = "SELECT id FROM users WHERE username = $1 OR email = $2";
    $result = pg_query_params($conn, $query, array($username, $email));
    
    if(pg_num_rows($result) > 0) {
        return false; // User exists
    }
    
    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert new user
    $query = "INSERT INTO users (username, email, password, created_at) VALUES ($1, $2, $3, NOW())";
    $result = pg_query_params($conn, $query, array($username, $email, $hashedPassword));
    
    return $result ? true : false;
}

function loginUser($username, $password) {
    $conn = getDBConnection();
    
    $query = "SELECT id, username, password FROM users WHERE username = $1";
    $result = pg_query_params($conn, $query, array($username));
    
    if(pg_num_rows($result) == 1) {
        $user = pg_fetch_assoc($result);
        
        if(password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
    }
    
    return false;
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function logoutUser() {
    session_unset();
    session_destroy();
}
?>
