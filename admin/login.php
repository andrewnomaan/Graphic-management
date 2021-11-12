<?php
 require('db_connect.php');
 require('function.php');
 $msg='';
 $admin="";
 function login($email,$password,$role,$conn){
   $sql="SELECT * FROM admin where email='$email' AND password='$password' AND role=$role";
   $res=mysqli_query($conn,$sql);
   if(mysqli_num_rows($res)>0){
      return 1;
   }
   else{
      return 0;
   }
 }
 if(isset($_GET['admin']) && $_GET['admin']!=''){
    $admin=get_safe_value($conn,$_GET['admin']);
 if(isset($_POST['submit'])){
    $username=get_safe_value($conn,$_POST['username']);
    $password=get_safe_value($conn,$_POST['password']);
    if($admin=='superadmin'){
     if(login($username,$password,1,$conn)!=0){
       $_SESSION['admin_login']='yes';
       $_SESSION['admin_username']=$username;
       header("Location:index.php");
       die();
    }
    else{
      $msg="Please enter correct login details.";
   }
   }
    else if($admin=='graphic'){
      if(login($username,$password,2,$conn)!=0){
         $_SESSION['admin_login']='yes';
         $_SESSION['admin_username']=$username;
         header("Location:index.php");
         die();
      }
      else{
        $msg="Please enter correct login details.";
     }
    }
    else if($admin=='assistant'){
      if(login($username,$password,3,$conn)!=0){
         $_SESSION['admin_login']='yes';
         $_SESSION['admin_username']=$username;
         header("Location:index.php");
         die();
      }
      else{
        $msg="Please enter correct login details.";
     }
    }
    
 }
}
else{
   ?>
    <script>
       window.location="front.php";
    </script>
   <?php
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form method="post">
                     <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
					</form>
               <div class="field_error"><?php echo $msg;?></div>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>