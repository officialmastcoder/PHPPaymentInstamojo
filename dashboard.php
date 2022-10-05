<?php
include('db.php');
session_start();
if(!isset($_SESSION['USER_LOGIN'])){
	header('location:index.php');
	die();
}
if(isset($_POST['submit'])){
	$amount=mysqli_real_escape_string($con,$_POST['amount']);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($ch, CURLOPT_HTTPHEADER,
				array("X-Api-Key:KEY",
					  "X-Auth-Token:Token"));
	$payload = Array(
		'purpose' => 'Buy Domain Name',
		'amount' => $amount,
		'phone' => $row['mobile'],
		'buyer_name' => $row['name'],
		'redirect_url' => 'https://programmingwithvishal.com/demo/instamojo/redirect.php',
		'send_email' => false,
		'send_sms' => false,
		'email' => $_SESSION['USER_EMAIL'],
		'allow_repeated_payments' => false
	);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
	$response = curl_exec($ch);
	curl_close($ch); 
	$response=json_decode($response);
	$_SESSION['TID']=$response->payment_request->id;
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into payment(user_id,amount,payment_status,payment_id,txn_id,added_on) values('".$_SESSION['USER_ID']."','$amount','pending','".$response->payment_request->id."','','$added_on')");
	
	header('location:'.$response->payment_request->longurl);
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Payment Form</title>
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
                              <h1>Pay Now</h1>
                           </div>
                        </div>
                        <form action="" method="post" name="login">
                           <div class="form-group">
                              <label>Enter Amount</label>
                              <input type="integer" name="amount"  class="form-control" id="amount" placeholder="Enter amount" required>
                           </div>
                           <div class="col-md-12 text-center ">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="submit">Pay Now</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </body>
</html>