<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="mano.js"></script>
</head>

<form id="form" class="formSubmit" name="form" method="post" action="">
	<input type="text" name="skaicius1">
	<input type="text" name="skaicius2">
	<select name="veiksmas" id="veiksmas">
		<option value="daugyba">*</option>
		<option value="dalyba">/</option>
		<option value="plius">+</option>
		<option value="minus">-</option>
	</select>
	<input id="submit" type="submit" name="submit">
</form>

<div class="resultatas"></div>
<?php 

// if (isset($_POST['submit']) && !empty($_POST['skaicius1']) && !empty($_POST['skaicius2'])) {

// 	$veiksmas = $_POST['veiksmas'];

// 	switch ($veiksmas) {
// 		case 'daugyba':
// 			$suma = $_POST['skaicius1'] * $_POST['skaicius2'];
// 			break;

// 		case 'dalyba':
// 			$suma = $_POST['skaicius1'] / $_POST['skaicius2'];
// 			break;

// 		case 'plius':
// 			$suma = $_POST['skaicius1'] + $_POST['skaicius2'];
// 			break;

// 		case 'minus':
// 			$suma = $_POST['skaicius1'] - $_POST['skaicius2'];
// 			break;
// 	}

// 	echo $suma;
// } else {
// 	echo 'Uzpildykite abu laukelius';
// }

