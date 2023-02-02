<!DOCTYPE html>
<html>
<head>
	<title>tes</title>
</head>
<body>

	<p>Soal (masukkan nilai tiap-tiap pertanyaan dalam soal yang dipisah dengan koma, maksimal 10 pertanyaan) :</p>

	<form method="get" action="">
		P : <input name="p" type="text"> <br><br>
		T : <input name="t" type="text">
		<button type="submit" name="submit">HITUNG</button>
	</form>

	<br>

	<?php 

		if(isset($_GET['submit'])) 
        {
        	$p = $_GET['p'];
        	$value = $_GET['t'];
        	
        	$arrays = explode (",", $p);

        	$counter = 1;
			$input = array();

			foreach($arrays as $array) {
			    $input["Pertanyaan $counter"] = $array;
			    $counter++;
			}

	?>
	
	<pre><?php print_r ($input);  ?></pre>

	<pre>
	<?php

		echo "dengan Nilai Total Soal (T) = " . $value . '<br><br>';

		echo "JAWABAN" . '<br><br>';

		function findCombinations($array, $inputValue)
		{
		  $combinations = array();
		  $arrayCount = count($array);
		  for ($i = 0; $i < $arrayCount; $i++) {
		    for ($j = $i; $j < $arrayCount; $j++) {
		      if ($i == $j) {
		        continue;
		      }
		      $combination = array();
		      for ($k = $i; $k <= $j; $k++) {
		        $combination[array_keys($array)[$k]] = $array[array_keys($array)[$k]];
		      }
		      if (array_sum(array_values($combination)) == $inputValue) {
		        $combinations[] = $combination;
		      }
		    }
		  }
		  return $combinations;
		}

		// $originalArray = array("a" => 3, "b" => 9, "c" => 1);
		$combinations = findCombinations($input, $value);


		$lastIndex = key(array_slice($combinations, -1, 1, true)) + 1;

		echo "Jumlah semua Kombinasi (K) = " . $lastIndex . '<br><br>';

		echo "Daftar Kombinasi :";

		foreach ($combinations as $combination)
		{
		  print_r($combination);
		  echo "\n";
		}

		}
	?>
	</pre>

</body>
</html>