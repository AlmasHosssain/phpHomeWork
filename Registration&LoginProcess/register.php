<?php 
    include 'inc/header.php';
    include 'lib/User.php';
    Session::checkLogin();
?>
<?php 
    $user = new User();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        $userRegi = $user->userRegistration($_POST);
    }
?>

<div class="panel panel-default ml-5 my-4">
    <div class="panel-heading">
        <h2>Registration Here</h2>
    </div>

    <div class="panel-body">
        <div style="max-width:600px" class="my-4">

        <?php 
            if (isset($userRegi)) {
                echo $userRegi;
            }  
        ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="firstName"><b>First Name:</b></label>
                    <input class="form-control" id="firstName" type="text" name="firstName" placeholder="Enter Your First Name Please."> 
                </div>

                <div class="form-group">
                    <label for="lastName"><b>Last Name:</b></label>
                    <input class="form-control" id="lastName" type="text" name="lastName" placeholder="Enter  Your Last Name Please"> 
                </div>

                <div class="form-group">
                    <label for="phone"><b>Phone Number:</b></label>
                    <input class="form-control" id="phone" type="text" name="phone" placeholder="Enter Phone Number Please"> 
                </div>

                <div class="form-group">
                    <label for="email"><b>Email Address:</b></label>
                    <input class="form-control" id="email" type="email" name="email" placeholder="Enter Your Email Address Please"> 
                </div>

                <div class="form-group">
                    <label for="password"><b>Password:</b></label>
                    <input class="form-control" id="password" type="password" name="password" placeholder="Password">
                </div>

                <button type="submit" name="register" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php 
    include 'inc/footer.php';
?>