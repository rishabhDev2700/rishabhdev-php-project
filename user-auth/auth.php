<?php
function login_user($email, $password)
{
    global $db;

    try {
        $sql = "SELECT user_id, password FROM users WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($user_id, $hashed_password);
        if ($stmt->fetch() && password_verify($password, $hashed_password)) {
            $stmt->close();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email'] = $email;
            header("Location: /author/create.php");
            exit();
        } else {
            return false;
        }
    } catch (Exception $e) {
        error_log("Error logging in user: " . $e->getMessage());
        return false;
    }
}
function register_user($username, $password, $email)
{
    global $db;

    try {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sss", $username, $hashed_password, $email);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    } catch (Exception $e) {
        error_log("Error registering user: " . $e->getMessage());
        return false;
    }
}

?>