<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: User1.php");
}
?>
<?php
        if (isset($_POST["signin"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: User1.php");
                    die();
                }else{
                    session_start();
                    $_SESSION["password"] = "Password does not match";
                    header("Location: UserRegistration.php");
                    // echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                    session_start();
                    $_SESSION["email"] = "email does not match";
                    header("Location: UserRegistration.php");
                // echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>