<?php
include('db.php');
session_start();
$msg="";
if(isset($_POST['submit'])){
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	
	$res=mysqli_query($con,"select * from user where email='$email' and  password='$password'");
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res);
		$_SESSION['USER_LOGIN']=true;
		$_SESSION['USER_ID']=$row['id'];
		$_SESSION['USER_EMAIL']=$row['email'];
		$_SESSION['USER_MOBILE']=$row['mobile'];
		header('location:dashboard.php');
		die();
	}else{
		$msg='<div class="alert alert-danger alert-dismissible mt10">
		<a href="#" class="close" data-dismiss="alert"  aria-label="close">&times;</a>Please enter valid login details</div>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Login Form</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <style type="text/css">
         body{
         padding-top:4.2rem;
         padding-bottom:4.2rem;
         background:rgba(0, 0, 0, 0.76);
         }
         a{
         text-decoration:none !important;
         }
         h1,h2,h3{
         font-family: 'Kaushan Script', cursive;
         }
         .myform{
         position: relative;
         display: -ms-flexbox;
         display: flex;
         padding: 1rem;
         -ms-flex-direction: column;
         flex-direction: column;
         width: 100%;
         pointer-events: auto;
         background-color: #fff;
         background-clip: padding-box;
         border: 1px solid rgba(0,0,0,.2);
         border-radius: 1.1rem;
         outline: 0;
         max-width: 500px;
         }
         .tx-tfm{
         text-transform:uppercase;
         }
         .mybtn{
         border-radius:50px;
         }
		 .mt10{margin-top:10px;}
      </style>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   </head>
   <body>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <body>
         <div class="container">
            <div class="row">
               <div class="col-md-5 mx-auto">
                  <div id="first">
                     <div class="myform form ">
                        <div class="logo mb-3">
                           <div class="col-md-12 text-center">
                              <h1>Login</h1>
                           </div>
                        </div>
                        <form action="" method="post" name="login">
                           <div class="form-group">
                              <label>Email address</label>
                              <input type="email" name="email"  class="form-control" id="email" placeholder="Enter email" required>
                           </div>
                           <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" id="password"  class="form-control" placeholder="Enter Password" required>
                           </div>
                           <div class="col-md-12 text-center ">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="submit">Login</button>
                           </div>
                        </form>
						<?php echo $msg?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </body>
</html>