<?php 
	ob_start();
	session_start();

	$aantal = filter_input(INPUT_POST, 'aantal');
	$artikelID = filter_input(INPUT_POST, 'artikelID');

	if(empty($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}

	if(array_key_exists($artikelID, $_SESSION['cart'])){
		$_SESSION['cart'][$artikelID] += $aantal;
	}else{
		$_SESSION['cart'][$artikelID] = $aantal;
	}
	header("location: winkelwagen.php");
	
	
?>