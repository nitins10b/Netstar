<?php
require_once('auth.php');
require_once('MainClass.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $login = json_decode($class->login());
    if($login->status == 'success'){
        echo "<script>location.replace('./login_verification.php');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netstar</title>
    <link rel="shortcut icon" href="/netstar/Images/Logo/1.jpg">
    <link rel="stylesheet" href="/netstar/css/php.css" /> 

</head>
<body class="bg-dark bg-gradient">
    <main>
       <div class="col-lg-7 col-md-9 col-sm-12 col-xs-12 mb-4">
           <h1 class="text-light text-center">Netstar</h1>
           
        </div>
       <div class="col-lg-3 col-md-8 col-sm-12 col-xs-12">
           <div class="card shadow rounded-0">
               <div class="card-header py-1">
                   <h4 class="card-title text-center">LOGIN</h4>
               </div>
               <div class="card-body py-4">
                   <div class="container-fluid">
                       <form action="./login.php" method="POST">
                       <?php 
                            if(isset($_SESSION['flashdata'])):
                        ?>
                        <div class="dynamic_alert alert alert-<?php echo $_SESSION['flashdata']['type'] ?> my-2 rounded-0">
                            <div class="d-flex align-items-center">
                                <div class="col-11"><?php echo $_SESSION['flashdata']['msg'] ?></div>
                                <div class="col-1 text-end">
                                    <div class="float-end"><a href="javascript:void(0)" class="text-dark text-decoration-none" onclick="$(this).closest('.dynamic_alert').hide('slow').remove()">x</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php unset($_SESSION['flashdata']) ?>
                        <?php endif; ?>
                           <div class="form-group">
                               <label for="email" class="label-control">Email</label>
                               <input type="email" name="email" id="email" text="blue" class="form-control-rounded-0" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" autofocus required>
                            </div>
                           <div class="form-group">
                               <label for="password" class="label-control">Password</label>
                               <input type="password" name="password" id="password"  class="form-control-rounded-0" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" required>
                            </div>
                            <div class="clear-fix mb-4"></div>
                            <div class="form-group text-end">
                                <button class="btn">SUBMIT</button>
                                <a href="home.html"></a>
                            </div>
                            <div class="form-group text-center align-bottom">
                                <a href="registration.php">Create a New Account</a>
                            </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
    </main>
</body>
</html>