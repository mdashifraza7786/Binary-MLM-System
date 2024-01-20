<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") { ?>
		echo "<b>Transaction status is success</b>" . "<br/>";
		<form method="post" action="/pay/txn_success.php" name="f11">
	    <input type="hidden" name="STATUS" value="TXN_SUCCESS">
		<input type="hidden" name="RESPMSG" value="<?php echo $_POST['RESPMSG']; ?>">
		<input type="hidden" name="TXNAMOUNT" value="<?php echo $_POST['TXNAMOUNT']; ?>">
		<input type="hidden" name="ORDERID" value="<?php echo $_POST['ORDERID']; ?>">
		<input type="hidden" name="TXNID" value="<?php echo $_POST['TXNID']; ?>">
		<input type="hidden" name="TXNDATE" value="<?php echo $_POST['TXNDATE']; ?>">
		
		<script type="text/javascript">
			document.f11.submit();
		</script>
	</form>
	<?php
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>