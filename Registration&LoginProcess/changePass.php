<?php 
    include 'inc/header.php';
    include 'lib/User.php';
    Session::checkSession();
    $user = new User();
?>
<?php 
    if (isset($_GET['id'])) {
        $userId = (int)$_GET['id'];
        $sesId = Session::get("id");
        if ($userId != $sesId) {
            header("Location: profile.php");
        }
    }

    $user = new User(); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatePass'])) {
        $updatePass = $user->updatePassword($userId,$_POST); //$_POST -> sends all the values of the form which we get
    }
?>
<div style="max-width:90%" class="panel panel-default ml-5 my-5">
    <div class="panel-heading">
        <h2>Change Password <a class="btn btn-primary" href="userProfile.php?id=<?php echo $userId?>" style="align:right;">Back</a></h2> 
    </div>
        
    <div class="panel-body">
        <div style="max-width:600px" class="ml-5 my-5">
<?php 
    if (isset($updatePass)) {
        echo $updatePass; 
    }
?>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="oldPass"><b>Old Password</b></label>
                    <input class="form-control" id="oldPass" type="password" name="oldPass"> 
                </div>

                <div class="form-group">
                    <label for="newPass"><b>New Password</b></label>
                    <input class="form-control" id="newPass" type="password" name="newPass"> 
                </div>

                    <button type="submit" name="updatePass" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>

<?php 
    include 'inc/footer.php';
?>