<?php
require_once('auth.php');
require_once('MainClass.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $register = json_decode($class->register());
    if($register->status == 'success'){
        $_SESSION['flashdata']['type']='success';
        $_SESSION['flashdata']['msg'] = ' Account has been registered successfully.';
        echo "<script>location.href = './login.php';</script>";
        exit;
    }else{
        echo "<script>console.error(".json_encode($register).");</script>";
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
                   <h4 class="card-title text-center">Create an Account</h4>
               </div>
               <div class="card-body py-4">
                   <div class="container-fluid">
                       <form action="./registration.php" method="POST">
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
                               <label for="firstname" class="label-control">First Name</label>
                               <input type="text" name="firstname" id="firstname" class="form-control rounded-0" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" autofocus required>
                            </div>
                            <div class="form-group">
                               <label for="lastname" class="label-control">Last Name</label>
                               <input type="text" name="lastname" id="lastname" class="form-control rounded-0" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required>
                            </div>
                           <div class="form-group">
                               <label for="email" class="label-control">Email</label>
                               <input type="email" name="email" id="email" class="form-control rounded-0" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                            </div>
                           <div class="form-group">
                               <label for="password" class="label-control">Password</label>
                               <input type="password" name="password" id="password" class="form-control rounded-0" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" required>
                            </div>
                            <div class="clear-fix mb-4"></div>
                            <div class="form-group text-end">
                                <button class="btn btn-primary bg-gradient rounded-0">Create Account</button>
                            </div>
                            <div class="form-group text-center align-center">
                                <a href="./login.php">sign in</a>
                       </form>
                   </div>
               </div>
           </div>
       </div>
    </main>
</body>
</html>