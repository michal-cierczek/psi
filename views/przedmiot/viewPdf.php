<?php

$html = 'Wydział: <b>Informatyki i zarządzania</b>/STUDIUM............<br/>
		<p style="text-align:center"><b>KARTA PRZEDMIOTU</b></p>
		Nazwa w języku polskim: <b>' . $nazwaPolska . '</b><br/>
		Nazwa w języku angielskim: <b>'. $nazwaAngielska . '</b><br/>
		Kierunek studiów (jeśli dotyczy): <b>' . $kierunekNazwa . '</b><br/>
		Specjalność (jeśli dotyczy): <b>' . $kierunekSpec . '</b><br/>
		Stopień studiów: <b>' . ($kierunekStopien == 1 ? 'I' : 'II') . '</b><br/>
		Kod przedmiotu: <b>' . $kodKursu . '</b><br/>
		Grupa kursów: <b>' . ($grupaKursow == 1 ? 'TAK / <s>NIE</s>' : '<s>TAK</s> / NIE') . '<b><br/>
		<br/>KURSY TODO<br/>
		<p style="text-align:center"><b>WYMAGANIA WSTĘPNE W ZAKRESIE WIEDZY, UMIEJĘTNOŚCI I INNYCH KOMPETENCJI</b></p>
		' . $wymaganie . '
		<p style="text-align:center"><b>CELE PRZEDMIOTU</b><p>
		' .  '
		';




$mpdf=new mPDF();
$mpdf->Bookmark('Start of the document');
$mpdf->WriteHTML($html);
foreach($kursy as $kurs){
	foreach($kurs as $element) $mpdf->WriteHTML($element);
}
	
$mpdf->Output();
exit;

?>