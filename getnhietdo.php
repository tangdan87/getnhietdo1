<?php

$html = file_get_contents('https://www.24h.com.vn/du-bao-thoi-tiet-c568.html');
$dom = new DOMDocument;
@$dom->loadHTML($html);


//============== lay tat ca cac noi dung ======================
	// foreach ($dom->getElementsByTagName('tr') as $node) {
	// 	foreach ($node->getElementsByTagName('td') as $node1) {
	// 		echo $node1->nodeValue.'----------------';
	// 	}
	// 	echo "<br/><br/><br/>";	
	// }

//============== lay theo json ================================
	$mang = array();
	$mangkethop = array();
	foreach ($dom->getElementsByTagName('tr') as $node) {
		foreach ($node->getElementsByTagName('td') as $node1) {
			array_push($mang, $node1->nodeValue);
			// echo $node1->nodeValue.'----------------';
		}
		array_push($mangkethop, $mang);
		$mang = array();
	}
	$mangjson = json_encode($mangkethop);
	echo $mangjson;
	// .'<br/>' .count($mangkethop);