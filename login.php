<?php
require_once('connection.php');

session_start();

$error_msg = "";

if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

        if (!empty($user_username) && !empty($user_password)) {
            $query = "SELECT id, username FROM user WHERE username = '$user_username' AND password = SHA('$user_password')";
            $data = mysqli_query($dbc, $query);

            if (mysqli_num_rows($data) == 1) {
                $row = mysqli_fetch_array($data);
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['loggedin'] = true;
                setcookie('user_id', $row['id'], time() + (60 * 60 * 24));
                setcookie('username', $row['username'], time() + (60 * 60 * 24));
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                header('Location: ' . $home_url);
            } else {
                $error_msg = 'Sorry, you must enter a valid username and password to log in.';
            }
        } else {
            $error_msg = 'Sorry, you must enter your username and password to log in.';
        }
    }
}

$page_title = 'Log In';
require_once('header.php');

?>

<div class="container">
    <div class="jumbotron">
        <div class="container">
            <h1>Task Planner <i class="fa fa-clock-o"></i></h1>
            <p>Not a user yet?</>
            <hr>
            <button onclick="window.location.href='signUp.php'" class="btn btn-primary">Sign Up</button>
        </div>
    </div>
    <?php

    if (empty($_SESSION['user_id'])) {
        echo '<p class="error">' . $error_msg . '</p>';

        ?>

        <div class="row">
            <div class="col-md-6 col-md-offset-3" id="center1">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" required>
                    <div class="form-group">
                        <label for="Username">Username</label>
                        <input type="text" class="form-control input-lg" placeholder="Username" name="username"
                               size="30" value="<?php if (!empty($user_username)) echo $user_username; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control input-lg" placeholder="Password" name="password"
                               size="30" required>
                    </div>
                    <input type="Submit" name="submit" value="Login" class="btn btn-success">
                </form>
            </div>
        </div>

        <?php

    } else {
        echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
    }

    ?>

</div>
</body>
</html>

