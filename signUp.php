<?php

$page_title = 'Sign Up';
require_once('header.php');

?>


<div class="container">
    <div class="jumbotron">
        <div class="container">
            <h1 onclick="location.href='index.php';" style="cursor:pointer;">Task Planner<i class="glyphicon glyphicon-edit"></i></h1>
            <h3 style="color:grey;">This is a helpful tool, where you can write tasks to do.</h3>
            <hr>
        </div>
    </div>

    <?php

    require_once('connection.php');

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $password1 = mysqli_real_escape_string($dbc, trim($_POST['password']));
        $password2 = mysqli_real_escape_string($dbc, trim($_POST['con-password']));
        $name = mysqli_real_escape_string($dbc, trim($_POST['firstname']) .
            trim($_POST['lastname']));
        $email = mysqli_real_escape_string($dbc, trim($_POST['email']));

        if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {

            $query = "SELECT * FROM user WHERE username = '$username'";
            $data = mysqli_query($dbc, $query);
            if (mysqli_num_rows($data) == 0) {
                $query = "INSERT INTO user (username, password, name, email) VALUES ('$username', SHA('$password1'), '$name', '$email')";
                mysqli_query($dbc, $query);

                echo '<p class="alert-success">Your new account has been successfully created. You\'re now ready to <a href="login.php">Log In</a>.</p>';

                mysqli_close($dbc);
                exit();
            } else {
                echo '<p class="alert-danger">Ack! An account already exists for ' . $username . '. Please choose a different username.</p>';
                $username = "";
            }
        } else {
            echo '<p class="alert-danger">You must enter all of the sign-up data, including the desired password twice.</p>';
        }
    }

    mysqli_close($dbc);

    ?>

    <div class="row">
        <div class="col-md-6 col-md-offset-3" id="center">
            <p>Please select a username and password to sign up to Task Planner.</p>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" required>
                <div class="form-group">
                    <label>First name:</label>
                    <input type="text" class="form-control input-lg" placeholder="First name" name="firstname" size="30"
                           required>
                </div>

                <div class="form-group">
                    <label>Last name:</label>
                    <input type="text" class="form-control input-lg" placeholder="Last name" name="lastname" size="30"
                           required>
                </div>

                <div class="form-group">
                    <label>E-mail:</label>
                    <input type="text" name="email" size="40" class="form-control input-lg" placeholder="E-mail"
                           required>
                </div>

                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control input-lg" placeholder="Username" name="username" size="30"
                           required>
                </div>

                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control input-lg" placeholder="Password" name="password"
                           size="30" required>
                </div>


                <div class="form-group">
                    <label>Confirm Password:</label>
                    <input type="password" class="form-control input-lg" placeholder="Confirm password"
                           name="con-password" size="30" required>
                </div>

                <input type="Submit" name="submit" value="Sign Up" class="btn btn-success">
            </form>
        </div>
    </div>
</div>


