<?
include_once($_SERVER['DOCUMENT_ROOT']."/includes/functions/ft_db_connect.php");
include_once($_SERVER['DOCUMENT_ROOT']."/includes/functions/ft_login_check.php");
if (!ft_login_check($conn)) {
    if (isset($_POST['user']) && $_POST['user'] != "")
    {
        if (isset($_POST['pass']) && $_POST['pass'] != "")
        {
            $user = $_POST['user'];
            $query = "SELECT id FROM users WHERE user_name=?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 0)
            {
                $length = 32;
                $str = "";
                $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                $max = count($characters) - 1;
                for ($i = 0; $i < $length; $i++) {
                    $rand = mt_rand(0, $max);
                    $str .= $characters[$rand];
                }
                $pass = hash('whirlpool', $_POST['pass']);
                $query = "INSERT INTO users (user_name, user_token, user_password) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "sss", $user, $str, $pass);
                mysqli_stmt_execute($stmt);
                header("location: /pages/login.php?signup=1");
            }
            else
                header('location: /pages/signup.php?error=3');
        }
        else
            header('location: /pages/signup.php?error=2&user='.$_POST['user']);
    }
    else
        header('location: /pages/signup.php?error=1');
}
else
    header('Location: /pages/store.php');