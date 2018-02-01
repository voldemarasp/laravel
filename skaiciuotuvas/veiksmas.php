<?php

header('Content-Type: application/json');

class sumele {
	private $veiksmas = 'nenustatyta';
	private $suma = 'Nenustatyta';


	public function sum() {

		$skaicius1 = intval($_POST['skaicius1']);
		$skaicius2 = intval($_POST['skaicius2']);

		if (is_int($skaicius1) && is_int($skaicius2)) {

			if ( strval($skaicius1) != strval(intval($skaicius1)) && strval($skaicius2) != strval(intval($skaicius2) ) ) {

				$data = 'Iveskite skaicius';
				return $data;
				exit();

			}

			$veiksmas = $_POST['veiksmas'];

			switch ($veiksmas) {
				case 'daugyba':
				$suma = $skaicius1 * $skaicius2;
				break;

				case 'dalyba':
				$suma = $skaicius1 / $skaicius2;
				break;

				case 'plius':
				$suma = $skaicius1 + $skaicius2;
				break;

				case 'minus':
				$suma = $skaicius1 - $skaicius2;
				break;

			}

				$data = $suma;
				return $data;

		} else {
			$data = 'Uzpildykite abu laukelius';
			return $data;
		}
	}
}



$sumele = new sumele; 
$suma = $sumele->sum();


echo json_encode($suma);



