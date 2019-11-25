<?php 
    $filePath = realpath(dirname(__FILE__));
    include_once $filePath.'/../lib/Session.php';
    Session::init();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Register System</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>

<!--for logout-->
<?php 
    if (isset($_GET['action']) && $_GET['action'] == "logout") {
        Session::destroy();
    }
?>

<body> 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                
                <?php 
                    $id = Session::get("id");
                    $userLogin = Session::get("login");
                    if ($userLogin == true) {
                ?>

                <li class="nav-item active">
                    <a class="nav-link" href="userProfile.php?id=<?php echo $id;?>">Profile </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="?action=logout">Logout</a>
                </li>

                <?php
                    } else {
                ?>

                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">Login </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="register.php">Register </a>
                </li>

                <?php } ?>
            </ul>
        </div>
    </nav>