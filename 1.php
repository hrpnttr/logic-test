<!DOCTYPE html>
<html>
<head>
	<title>test</title>
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

	<?php

		echo "dengan Nilai Total Soal (T) = " . $value . '<br><br>';

		echo "JAWABAN" . '<br><br>';

		$combinations = array();

		function getCombinations($input, $size, $start, $combination, &$combinations, $value)
		{
		    if (count($combination) == $size)
		    {
		        if (array_sum($combination) == $value)
		        {
		            array_push($combinations, $combination);
		        }
		        return;
		    }
		    for ($i = $start; $i <= count($input); $i++)
		    {
		        array_push($combination, $input["Pertanyaan " . $i]);
		        getCombinations($input, $size, $i + 1, $combination, $combinations, $value);
		        array_pop($combination);
		    }
		}

		for ($size = 1; $size <= count($input); $size++)
		{
		    getCombinations($input, $size, 1, array(), $combinations, $value);
		}

		$lastIndex = key(array_slice($combinations, -1, 1, true)) + 1;

		echo "Jumlah semua Kombinasi (K) = " . $lastIndex . '<br><br>';

		echo "Daftar Kombinasi :";

	?>

	<pre><?php print_r($combinations); } ?></pre>

</body>
</html>