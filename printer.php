<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'function.php';
 $lihat = query ("SELECT * FROM mahasiswa");

$mpdf = new \Mpdf\Mpdf();


$html = '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>Daftar Mahasiswa</h1>

<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>NO</th>
		<th>Gambar</th>
		<th>Nrp</th>
		<th>Nama</th>
		<th>email</th>
		<th>Jurusan</th>
	</tr>';
     $i=1;
    foreach($lihat as $setuju){

    	$html.='<tr>
    	            <td>'.$i++.'</td>
    	            <td><img src="img/'.$setuju["gambar"].'" width="50"></td>
    	            <td>'.$setuju["nrp"].'</td>
    	             <td>'.$setuju["nama"].'</td>
    	              <td>'.$setuju["email"].'</td>
    	               <td>'.$setuju["jurusan"].'</td>
                
    	       </tr>';

    }

	$html.='</table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar.php',\Mpdf\Output\Destination::INLINE);

