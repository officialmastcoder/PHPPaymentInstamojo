<?php
include('db.php');
session_start();
if(!isset($_SESSION['USER_LOGIN'])){
	header('location:index.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Thank you</title>
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
                              <h1>Payment complete</h1>
							  <a href="dashboard.php">Back</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </body>
</html>