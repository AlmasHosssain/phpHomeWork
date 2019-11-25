<?php 
    include 'inc/header.php';
    include 'lib/User.php';
    Session::checkSession();
    $user = new User();
?>

<?php 
    $loginMsg = Session::get("loginMsg");
    if (isset($loginMsg)) {
        echo $loginMsg;
    }
    Session::set("loginMsg",NULL);
?>

<div style="max-width:600px" class="panel panel-default ml-5 my-5">
    <div class="panel-heading">
        <h2>Login Process Done Successful
            <?php 
                $name = Session::get("firstName");
                if (isset($name)) {
                    echo $name;
                }
            ?>  
        </h2>
    </div>

    <div class="panel-body">
            
    </div>
</div>

<?php 
    include 'inc/footer.php';
?>
        