<?php

$html = 'Wydział: <b>Informatyki i zarządzania</b>/STUDIUM............<br/>
		<p style="text-align:center"><b>KARTA PRZEDMIOTU</b></p>
		Nazwa w języku polskim <b>' . $nazwaPolska . '</b>';

$mpdf=new mPDF();
$mpdf->Bookmark('Start of the document');
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

?>