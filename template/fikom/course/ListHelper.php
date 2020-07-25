<?php

function populateData($mysqli) {
	$finalData = [];

	$query = "SELECT * FROM courses ORDER BY semester ASC";

	$result = $mysqli->query($query);
	
	if ($result) {
		while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
			$generalArray = [];
			$peminatanArray = [];
			$minorArray = [];

			$generalRawData = json_decode($data['list'], true);
			$generalTotal = 0;
			foreach ($generalRawData as $general) {
				if ($general['id'] != "" && $general['name'] != "" && $general['sks'] != "") {
					$generalArray[$general['id']] = [
						$general['name'],
						$general['sks']
					];

					if (is_numeric($general['sks'])) {
						$generalTotal += (int) $general['sks'];
					} else {
						$sks = strval($general['sks']);
						$sks = substr($sks, (int) strpos($sks, "-") + 1, strlen($sks));
						$generalTotal += (int) $sks;
					}
				}
			}
			if ($generalArray) {
				$generalArray['total'] = [
					'Jumlah',
					$generalTotal
				];
			}

			$peminatanRawData = json_decode($data['list_peminatan'], true);
			foreach ($peminatanRawData as $peminatan) {
				if ($peminatan['id'] != "" && $peminatan['name'] != "" && $peminatan['sks'] != "") {
					$peminatanArray[$peminatan['id']] = [
						$peminatan['name'],
						$peminatan['sks']
					];
				}
			}

			$minorRawData = json_decode($data['list_minor'], true);
			foreach ($minorRawData as $minor) {
				if ($minor['id'] != "" && $minor['name'] != "" && $minor['sks'] != "") {
					$minorArray[$minor['id']] = [
						$minor['name'],
						$minor['sks']
					];
				}
			}

			$finalData['Semester ' . $data['semester']] = [
				'general' => $generalArray,
				'peminatan' => $peminatanArray,
				'minor' => $minorArray
			];
		}
	}

	// die(print_r($finalData));

	return $finalData;
}
?>