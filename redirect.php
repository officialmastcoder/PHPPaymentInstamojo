<?php
include('db.php');
session_start();
if(isset($_GET['payment_status'])){
	$payment_id=$_GET['payment_id'];
	$payment_status=$_GET['payment_status'];
	$payment_request_id=$_GET['payment_request_id'];
	if($payment_status=='Credit'){
		mysqli_query($con,"update payment set payment_status='complete',txn_id='$payment_id' where payment_id='$payment_request_id'");
		
		if(!isset($_SESSION['USER_LOGIN'])){
        	$row=mysqli_fetch_assoc(mysqli_query($con,"select user.* from user,payment where where payment.payment_id='$payment_request_id' and user.id=payment.user_id"));
        	$row=mysqli_fetch_assoc($res);
    		$_SESSION['USER_LOGIN']=true;
    		$_SESSION['USER_ID']=$row['id'];
    		$_SESSION['USER_EMAIL']=$row['email'];
    		$_SESSION['USER_MOBILE']=$row['mobile'];
        }
		
		header('location:thankyou.php');
		die();
	}
}
?>