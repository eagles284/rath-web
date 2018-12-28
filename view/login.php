<?php

if (isset($_SESSION['login'])) {
    header('Location: panel');
}

$loginerror = FALSE;
$sqlempty = FALSE;

if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $pw = $_POST['password'];

    $sql = 'SELECT username, password FROM auth';
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $realun = $row['username'];
            $realpw = $row['password'];
            break;
        }
    } else {
        $sqlempty = TRUE;
    }

    if (($user == $realun) && ($pw == $realpw)) {
        $_SESSION['login'] = md5($user);

        if (isset($_POST['remember'])):
            setcookie('user', md5($user), time() + (86400 * 7));
        endif;
        header('Location: panel');
    } else {
        $loginerror = TRUE;
    }

}
?>

<body>
    <div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form class="form-signin" action='login' method='POST'>
                <div class="form-label-group">
                <input name='username' type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
                <label for="inputPassword"></label>
                </div>

                <div class="form-label-group">
                <input name='password' type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword"></label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                <input name='remember' type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <input class="btn btn-lg btn-primary btn-block text-uppercase" name='submit' type="submit" value='Login'>
                <?php
                    if ($loginerror):
                        echo "<p class='error'><b>Login failed</b></p>";
                    endif;
                    if ($sqlempty):
                        echo "<p class='error'>?<b>Empty error</b></p>";
                    endif;
                ?>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</body>