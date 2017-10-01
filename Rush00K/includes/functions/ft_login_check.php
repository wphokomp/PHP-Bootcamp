<?php
function ft_login_check($conn) {
    if (isset($_COOKIE['user']) && isset($_COOKIE['token']))
    {
        $query = "SELECT user_token FROM users WHERE user_name=? LIMIT 1";
        $user = $_COOKIE['user'];
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $result = mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0)
        {
            while ($rows = mysqli_fetch_array($result)) {
                $session_token = $rows['session_token'];
                if ($session_token == $_COOKIE['token'])
                    return true;
            }
        }
    }
    return false;
}