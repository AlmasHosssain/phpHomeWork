<?php 
    include 'inc/header.php';
    include 'lib/User.php';
    Session::checkLogin();
?>
<?php 
    $user = new User();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $userLogin = $user->userLogin($_POST);
    }
?>


<div class="panel panel-default ml-5 my-5">
    <div class="panel-heading">
            <h2>Login Here</h2>
    </div>

    <div class="panel-body">
        <div style="max-width:600px" class="ml-5 my-5">

        <?php 
            if (isset($userLogin)) {
                echo $userLogin;
            }  
        ?>

            <form action="" method="POST">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email Address</span>
                    </div>
                    <input class="form-control" id="email" type="email" name="email" placeholder="Enter Email"> 
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Password</span>
                    </div>
                    <input class="form-control" id="password" type="password" name="password" placeholder="Password">
                </div>

                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

<?php 
    include 'inc/footer.php';
?>