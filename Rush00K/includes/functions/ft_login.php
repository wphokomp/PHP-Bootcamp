<?
include_once($_SERVER['DOCUMENT_ROOT']."/includes/functions/ft_db_connect.php");
include_once($_SERVER['DOCUMENT_ROOT']."/includes/functions/ft_login_check.php");
if (!ft_login_check($conn)) {
    if (isset($_POST['user']) && $_POST['user'] != "")
    {
        if (isset($_POST['pass']) && $_POST['pass'] != "")
        {
            $query = "SELECT * FROM users WHERE user_name=?";
            $user = $_POST['user'];
            $password = hash('whirlpool', $_POST['pass']);
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) != 0)
            {
                while ($rows1 = mysqli_fetch_array($result)) {
                    if ($password == $rows1['user_password'])
                    {
                        echo 'meh';
                        $length = 32;
                        $str = "";
                        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                        $max = count($characters) - 1;
                        for ($i = 0; $i < $length; $i++) {
                            $rand = mt_rand(0, $max);
                            $str .= $characters[$rand];
                        }
                        setcookie('user', $user, time() + 3600);
                        setcookie('token', $str, time() + 3600);
                        $query = "UPDATE users SET user_token WHERE user_name=?";
                        $stmt = mysqli_prepare($conn, $query);
                        mysqli_stmt_bind_param($stmt, "s", $user);
                        mysqli_stmt_execute($stmt);
                        header("location: /pages/store.php");
                    }
                    else
                        header('location: /pages/login.php?error=4');
                }
            }
            else
                header('location: /pages/login.php?error=3');
        }
        else
            header('location: /pages/login.php?error=2&user='.$_POST['user']);
    }
    else
        header('location: /pages/login.php?error=1');
}
else
    header('Location: /pages/store.php');