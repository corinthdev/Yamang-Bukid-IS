<?php 
$con = mysqli_connect("localhost", "root", "", "yamangbukiddb");

if(isset($_POST['items'])) {

	$items = $_POST['items'];
	$itemCode = $_POST['itemCode'];
	$beginningStocks = $_POST['beginningStocks'];
	$addStocks = $_POST['addStocks'];
	$endingStocks = $_POST['endingStocks'];
	$additionalStocks = $_POST['additionalStocks'];
	$additionalStocks2 = $_POST['additionalStocks2'];
	$additionalStocks3 = $_POST['additionalStocks3'];
	$additionalStocks4 = $_POST['additionalStocks4'];
	$additionalStocks5 = $_POST['additionalStocks5'];
	$additionalStocks6 = $_POST['additionalStocks6'];
	$additionalStocks7 = $_POST['additionalStocks7'];
	$totalBap = $_POST['totalBap'];
	$pullOut = $_POST['pullOut'];
	$itemSold = $_POST['itemSold'];
	$id = $_POST['id'];

	//query update

	$result = mysqli_query($con, "UPDATE sub_products SET items='$items', itemCode='$itemCode', beginningStocks='$beginningStocks', addStocks='$addStocks', endingStocks='$endingStocks', additionalStocks='$additionalStocks',additionalStocks2='$additionalStocks2',additionalStocks3='$additionalStocks3',additionalStocks4='$additionalStocks4',additionalStocks5='$additionalStocks5',additionalStocks6='$additionalStocks6',additionalStocks7='$additionalStocks7',pullOut='$pullOut', totalBap='$totalBap',
				 itemSold = '$itemSold' WHERE id='$id'");
	if($result){
		return 'Data Updated!';
	}
}

?>