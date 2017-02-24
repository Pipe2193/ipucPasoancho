<?php
if (checkAccess() == TRUE) {
    header("Location: settings.php?p=app_forms");
}
//////////////////////////////////////LOGIN /////////////////////////////////////
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['access'])) {

        $username = $_POST['user'];
        $pass = $_POST['pass'];

        if (checkAccess() != TRUE) {
            $validate = onafAccess($username, $pass);

            if ($validate != FALSE) {
                $_SESSION['onafadmin'] = md5(md5($pass));
                $_SESSION['onafpermission'] = $username;
                setSuccess($GLOBALS['success_login1']);
                header("Location: settings.php?p=app_forms");
            } else {
                 setError($GLOBALS['error_login1']);
                 header("Location: settings.php?p=login&error");
            }
        } else {
           
            header("Location: settings.php?p=login");
        }
    }
}

/////////////////////////// end login module ///////////////////////////////////
?>
<section class="container">

    <div class="col-md-8 col-md-offset-2 login">
        <form class="reg-page" method="POST" action="" id="loginForm" autocomplete="off" >
            <div class="reg-header">
                <h2 class="page-header pmititles"><i class="fa fa-sign-in" aria-hidden="true"></i> 
                    Login to Admin Panel
                </h2>
            </div>

            <p>Please enter an <b>Admin Username</b> and <b>Password</b> to access the Admin Panel</p>
            <br>
            <p><b>Admin Username</b></p>
            <div class=" form-group input-group ">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <select name="user" id="user" class="form-control" tabindex="1" autofocus>
                    <?php foreach (getAdminUsers() as $user): ?>
                        <option value="<?php echo $user->id ?>"><?php echo $user->user_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <b>Password</b>
            <div class="form-group input-group ">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" id="pass" name="pass" placeholder="Password" class="form-control" maxlength="4" tabindex="3" autocomplete="off">
            </div>

            <button class=" btn btnpmi btn-block" name="access" id="access" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i> <?php echo $GLOBALS['login_btn1'] ?></button>      
 
            <div class="clearfix"></div>
 
        </form>
    </div>

</section>