<?php
$page_title = "Cardinal | Signup";
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
            $error_msg = "Already registered. Login to continue.";
            break;
    }
}
?>
    <div class="container">
        <section id="signup-mural">
            <div id ="signup-container">
                <div id="signup-form">
                    <h3>SIGN UP</h3>
                    <p>Create your Cardinal account today!</p>
                    <form title="signup.php" method="post" action="/includes/functions/ft_signup.php">
                        <input type="text" name="user" id="signup-username" placeholder="Username" value="<?php echo $_GET['user']; ?>">
                        <input type ="password" name="pass" id="signup-password" placeholder="Password">
                        <input type="submit" id ="signup-submit" class="button">
                    </form>
                    <?php if($error_msg)
                        echo "<p style='color:red;'>".$error_msg."</p>";
                    ?>
                </div>
            </div>
        </section>
    </div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/includes/footer.php"); ?>