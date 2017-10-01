<?php
$page_title = "Cardinal | Login";
include_once($_SERVER['DOCUMENT_ROOT']."/includes/functions/ft_db_connect.php");
include_once($_SERVER['DOCUMENT_ROOT']."/includes/header.php");
include_once($_SERVER['DOCUMENT_ROOT']."/includes/nav.php");
if (isset ($_GET['error']) && $_GET['error'] != "")
{
    switch ($_GET['error']) {
        case "1":
            $error_msg = "A username is required.";
            break;
        case "2":
            $error_msg = "A password is required.";
            break;
        case "3":
            $error_msg = "Not a registered user.";
            break;
        case "4":
            $error_msg = "Invalid username or password.";
            break;
    }
}
if (isset ($_GET['signup']) && $_GET['signup'] != "")
    if ($_GET['signup'] == 1)
        $success_msg = "Signup Successful.";
?>
<div class="container">
    <section id="login-mural">
        <div id ="login-container">
            <div id="login-form">
                <h3>LOG IN</h3>
                <p>Sign into your account to view your archive</p>
                <form title="login" method="post" action="/includes/functions/ft_login.php">
                    <input type="text" name="user" id="login-username" placeholder="Username" value="<?php echo $_GET['user']; ?>">
                    <input type ="password" name="pass" id="login-password" placeholder="Password">
                    <input type="submit" id ="login-submit" class="button">
                </form>
                <?php   if($error_msg)
                            echo "<p style='color:red;'>".$error_msg."</p>";
                        if($success_msg)
                            echo "<p style='color:green;'>".$success_msg."</p>";
                ?>
        </div>
        </div>
    </section>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/includes/footer.php"); ?>