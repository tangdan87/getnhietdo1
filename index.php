<?php

// $htmlContent = '<div class="my-con">Content goes here...</div>';

// preg_match('/<div class="my-con">(.*?)<\/div>/s', $htmlContent, $match);

// $stringfile = file_get_contents('http://ceur-ws.org/Vol-1716/');
// preg_match('/<span class="CEURVOLTITLE">(.*?)<\/span>/',$stringfile, $noidung);

// // echo $match[0];
// //echo $noidung[0];

// $giavang = file_get_contents('http://www.sjc.com.vn/giavang/textContent.php');
// preg_match('/<td class="br bb ylo2_text p12">(.*?)<\/td>/',$giavang, $noidung);

// preg_match('/<span style="font-size:larger">(.*?)<\/span>/', $giavang,$giamua);
//  echo $noidung[0] . ' ---mua:  ' .$giamua[0] . '---ban:  ' .$giamua[1];
//  echo "<br/>";
//  echo $noidung[1];



$html = file_get_contents('http://www.sjc.com.vn/giavang/textContent.php');
$dom = new DOMDocument;
@$dom->loadHTML($html);
$links = $dom->getElementsByTagName('table');

//============= eho 1 mang ===================

// $myObj->name = "John";
// $myObj->age = 30;
// $myObj->city = "New York";
// $myJSON = json_encode($myObj);
// echo $myJSON;

$myArr = array("John", "Mary", "Peter", "Sally");
$mang = array();
$mangkethop = array();

$myJSON = json_encode($mang);

// echo $myJSON;

foreach ($dom->getElementsByTagName('tr') as $node) {
	foreach ($node->getElementsByTagName('td') as $node1) {
		array_push($mang, $node1->nodeValue);
		// $mang1 = array($node1->nodeValue);
		// $json1 = json_encode($mang1);
		// echo $json1;
		// echo $node1->nodeValue.'---';

	}
	array_push($mangkethop, $mang);
	$mang = array();
	// echo "///////";
	// $mangjson = json_encode($mang);
	// $mang = array();
	// echo $mangjson;
}

$mangjson = json_encode($mangkethop);
echo $mangjson .'<br/>' .count($mangkethop);


//==================get by name =============

// foreach ($dom->getElementsByTagName('tr') as $node) {
// 	foreach ($node->getElementsByTagName('td') as $node1) {
// 		echo $node1->nodeValue.'---';
// 	}
// 	echo "///////";
// }

// foreach ($dom->getElementsByTagName('tr') as $node)
// {
//   echo $node->nodeValue.': '    .$node->getAttribute("td")."\n".           . '------' ;
// }





