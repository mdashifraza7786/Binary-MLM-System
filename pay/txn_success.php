<?php
include '../element/connection.php';

if(isset($_POST['STATUS'])){
    if($_POST["STATUS"] == "TXN_SUCCESS"){
        $status = $_POST['RESPMSG'];
		$amnt = $_POST['TXNAMOUNT'];
		$ord_id = $_POST['ORDERID'];
		$tr_id = $_POST['TXNID'];
		$tr_date = $_POST['TXNDATE'];
		$uuu = $_COOKIE['PHPUSER'];
		$sql = "INSERT INTO payment (trans_status, trans_amt, order_id, trans_id, trans_date) VALUES ('$status', '$amnt', '$ord_id', '$tr_id', '$tr_date')";
		if(mysqli_query($conn, $sql)){
			$sqll = "UPDATE user_invoice SET `paid_status`='1' WHERE `ur_id`='$uuu'";
			if(mysqli_query($conn, $sqll)){
			header('Location: ../element/redirect.php?st=1&user_id='.$uuu.'&prc='.$amnt);
		}
		}
    }
}else{
    header('Location: ../index.php?a=1');
}