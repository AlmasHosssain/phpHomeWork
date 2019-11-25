<?php 
    include 'inc/header.php';
    include 'lib/User.php';
    Session::checkSession();
    $user = new User();
?>
<?php 
    if (isset($_GET['id'])) {
        $userId = (int)$_GET['id'];
    }

    $user = new User(); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        $updateUser = $user->updateUserData($userId,$_POST);
    }
?>
<div style="max-width:90%" class="panel panel-default ml-5 my-5">
    <div class="panel-heading">
        <h2>User Profile <a class="btn btn-primary" href="profile.php">Back</a></h2> 
    </div>
        
    <div class="panel-body">
        <div style="max-width:600px" class="ml-5 my-5">
<?php 
    if (isset($updateUser)) {
        echo $updateUser; 
    }
?>
        <?php 
        $userData = $user->getUserById($userId);
            if ($userData) {
        ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="firstName"><b>First Name:</b></label>
                    <input class="form-control" id="firstName" type="text" name="firstName" value="<?php echo $userData->firstName; ?>"> 
                </div>

                <div class="form-group">
                    <label for="lastName"><b>Last Name:</b></label>
                    <input class="form-control" id="lastName" type="text" name="lastName" value="<?php echo $userData->lastName; ?>"> 
                </div>

                <div class="form-group">
                    <label for="phone"><b>Phone Number:</b></label>
                    <input class="form-control" id="phone" type="text" name="phone" value="<?php echo $userData->phone; ?>"> 
                </div>

                <div class="form-group">
                    <label for="email"><b>Email Address:</b></label>
                    <input readonly class="form-control-plaintext" id="email" type="email" name="email" value="<?php echo $userData->email ; ?>"> 
                </div>

                <?php 
                    $sesId = Session::get("id");
                    if ($userId == $sesId) {
                ?>

                <button type="submit" name="update" class="btn btn-success">Update Record</button>

                <a class="btn btn-info" href="changePass.php?id=<?php echo $userId; ?>">Change Password</a>
        <?php } ?>
            </form>
            <?php } ?>
        </div>
    </div>
        
</div>

<?php 
    include 'inc/footer.php';
?>