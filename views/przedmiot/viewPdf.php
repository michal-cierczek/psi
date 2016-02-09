<?php

$css =  '<style>
		table, td, .borders{
		    border: 1px solid black;
		}
		table {
		    border-collapse: collapse;
		}
		.centers{
			text-align: center;
			font-weight: bold;
		}
		</style>';

$html = $css . '<div class="borders">Wydział: <b>Informatyki i zarządzania</b>/STUDIUM............<br/>
		<div class="centers">KARTA PRZEDMIOTU</div>
		Nazwa w języku polskim: <b>' . $nazwaPolska . '</b><br/>
		Nazwa w języku angielskim: <b>'. $nazwaAngielska . '</b><br/>
		Kierunek studiów (jeśli dotyczy): <b>' . $kierunekNazwa . '</b><br/>
		Specjalność (jeśli dotyczy): <b>' . $kierunekSpec . '</b><br/>
		Stopień studiów: <b>' . ($kierunekStopien == 1 ? 'I' : 'II') . '</b><br/>
		Forma studiów: <b>' . $forma . '</b><br>
		Rodzaj przedmiotu: <b>' . $rodzaj . '</b><br>
		Kod przedmiotu: <b>' . $kodKursu . '</b><br/>
		Grupa kursów: <b>' . ($grupaKursow == 1 ? 'TAK / <s>NIE</s>' : '<s>TAK</s> / NIE') . '<b></div><br/><br/>';

//===================      KURSY      ==================
$html = $html .
		'<table>
			<tr>
				<td></td>';
				$forma = null;
				foreach($kursy as $kurs){
					switch($kurs['formaProwadzeniaZajec']){
						case 0: $forma = 'Ćwiczenia'; break;
						case 1: $forma = 'Laboratorium'; break;
						case 2: $forma = 'Wykład'; break;
						case 3: $forma = 'Seminarium'; break;
						case 4: $forma = 'Projekt'; break;
					}
					$html = $html . '<td>' . $forma . '</td>';
				}
$html = $html .
			'</tr><tr>
				<td>Liczba godzin zajęć zorganizowanych w Uczelni (ZZU)</td>';
				foreach($kursy as $kurs){
					$html = $html . '<td>' . $kurs['ZZU'] . '</td>';
				}
$html = $html .
			'</tr><tr>
				<td>Liczba godzin całkowitego nakładu pracy studenta (CNPS)</td>';
				foreach($kursy as $kurs){
					$html = $html . '<td>' . $kurs['CMPS'] . '</td>';
				}
$html = $html .
			'</tr><tr>
				<td>Forma zaliczenia</td>';
				foreach($kursy as $kurs){
					$html = $html . '<td>' . ($kurs['formaZaliczenia'] == 1 ? 'Egzamin' : 'Zaliczenie') . '</td>';
				}
$html = $html .
			'</tr><tr>
				<td>Dla grupy kursów zaznaczyć kurs końcowy (X)</td>';
				foreach($kursy as $kurs){
					$html = $html . '<td>' . ($kurs['czyKonczacy'] == 1 ? 'X' : '') . '</td>';
				}
$html = $html .		
			'</tr><tr>
				<td>Liczba punktów ECTS</td>';
				foreach($kursy as $kurs){
					$html = $html . '<td>' . $kurs['ECTS'] . '</td>';
				}
$html = $html .
			'</tr><tr>
				<td>w tym liczba punktów odpowiadająca zajęciom o charakterze praktycznym (P)</td>';
				foreach($kursy as $kurs){
					$html = $html . '<td>' . $kurs['pECTS'] . '</td>';
				}
$html = $html .
			'</tr><tr>
				<td>w tym liczba punktów ECTS odpowiadająca zajęciom wymagającym bezpośredniego kontaktu (BK)</td>';
				foreach($kursy as $kurs){
					$html = $html . '<td>' . $kurs['bKECTS'] . '</td>';
				}
$html = $html .
			'</tr>
		</table> <br/>
		';
//===================     WYMAGANIA   ==================
$html = $html . '<div class="borders"><p class="centers">WYMAGANIA WSTĘPNE W ZAKRESIE WIEDZY, UMIEJĘTNOŚCI I INNYCH KOMPETENCJI</p>
		' . $wymaganie . '</div><br/>' .
// ================== CELE PRZEDMIOTU ==================
		'<div class="borders"><p class="centers">CELE PRZEDMIOTU<p>';
$ktoryCel = 1; // nie można brać id z bazy bo są luki
foreach($cele as $cel ){
	$html = $html . 'C' . $ktoryCel . '. ' . $cel['opis'] . '<br/>';
	$ktoryCel++;
}
$html = $html . '</div><br/>';
// ================== PRZEDMIOTOWE EFEKTY KSZTAŁCENIA ========
$html = $html . '<div class="borders"><p class="centers">PRZEDMIOTOWE EFEKTY KSZTAŁCENIA</p>';

$textPrinted = false;
foreach($peki as $pek){
	if(!$textPrinted && $pek['kategoria'] == 0){
		$html = $html . 'Z zakresu wiedzy: <br/>';
		$textPrinted = true;
	}
	if($pek['kategoria'] == 0)
		$html = $html . $pek['symbol'] . ' ' . $pek['opis'] . '<br/>';
}
$textPrinted = false;
foreach($peki as $pek){
	if(!$textPrinted && $pek['kategoria'] == 1){
		$html = $html . '<br/>Z zakresu umiejętności: <br/>';
		$textPrinted = true;		
	}
	if($pek['kategoria'] == 1)
		$html = $html . $pek['symbol'] . ' ' . $pek['opis'] . '<br/>';
}
$textPrinted = false;
foreach($peki as $pek){
	if(!$textPrinted && $pek['kategoria'] == 2){
		$html = $html . '<br/>Z zakresu kompetencji społecznych:<br/>';
		$textPrinted = true;		
	}
	if($pek['kategoria'] == 2)
		$html = $html . $pek['symbol'] . ' ' . $pek['opis'] . '<br/>';
}
$html = $html . '</div><br/>';

//============= TREŚCI PROGRAMOWE =================
$html = $html . '<div class="borders"><p class="centers">TREŚCI PROGRAMOWE</p></div>';
$textPrinted = false;
$sumaGodzin = 0;

foreach($tresci as $tresc){ //ĆWICZENIA
	if($tresc['formaZajec'] != 0)
		continue;
	if(!$textPrinted){
		$html = $html . '<table>
							<tr>
								<th></th>
								<th style="width: 80%">Forma zajęć - Ćwiczenia</th>
								<th>Liczba godzin</th>
							</tr>';
		$textPrinted = true;
	}
	$html = $html . '<tr>
						<td>' . $tresc['symbol'] . '</td>
						<td>' . $tresc['opis'] . '</td>
						<td style="text-align:center">' . $tresc['liczbaGodzin'] . '</td>
					</tr>';
	$sumaGodzin = $sumaGodzin + $tresc['liczbaGodzin'];
}
if($textPrinted){
	$html = $html . '<tr>
						<td></td>
						<td>Suma godzin</td>
						<td style="text-align:center">' . $sumaGodzin . '</td>
					</tr>
				</table><br/>';
	$textPrinted = false;
	$sumaGodzin = 0;
}

foreach($tresci as $tresc){
	if($tresc['formaZajec'] != 1)
		continue;
	if(!$textPrinted){
		$html = $html . '<table>
						<tr>
							<th></th>
							<th style="width: 80%">Forma zajęć - Laboratorium</th>
							<th>Liczba godzin</th>
						</tr>';
		$textPrinted = true;
	}
	$html = $html . '<tr>
						<td>' . $tresc['symbol'] . '</td>
						<td>' . $tresc['opis'] . '</td>
						<td style="text-align:center">' . $tresc['liczbaGodzin'] . '</td>
					</tr>';
	$sumaGodzin = $sumaGodzin + $tresc['liczbaGodzin'];
}
if($textPrinted){
	$html = $html . '<tr>
						<td></td>
						<td>Suma godzin</td>
						<td style="text-align:center">' . $sumaGodzin . '</td>
					</tr>
				</table><br/>';
	$textPrinted = false;
	$sumaGodzin = 0;
}

foreach($tresci as $tresc){
	if($tresc['formaZajec'] != 2)
		continue;
	if(!$textPrinted){
		$html = $html . '<table>
						<tr>
							<th></th>
							<th style="width: 80%">Forma zajęć - Wykład</th>
							<th>Liczba godzin</th>
						</tr>';
		$textPrinted = true;
		}
	$html = $html . '<tr>
						<td>' . $tresc['symbol'] . '</td>
						<td>' . $tresc['opis'] . '</td>
						<td style="text-align:center">' . $tresc['liczbaGodzin'] . '</td>
					</tr>';
	$sumaGodzin = $sumaGodzin + $tresc['liczbaGodzin'];
}
if($textPrinted){
	$html = $html . '<tr>
						<td></td>
						<td>Suma godzin</td>
						<td style="text-align:center">' . $sumaGodzin . '</td>
					</tr>
				</table><br/>';
	$textPrinted = false;
	$sumaGodzin = 0;
}

foreach($tresci as $tresc){
	if($tresc['formaZajec'] != 3)
		continue;
	if(!$textPrinted){
		$html = $html . '<table>
						<tr>
							<th></th>
							<th style="width: 80%">Forma zajęć - Seminarium</th>
							<th>Liczba godzin</th>
						</tr>';
		$textPrinted = true;
	}
	$html = $html . '<tr>
						<td>' . $tresc['symbol'] . '</td>
						<td>' . $tresc['opis'] . '</td>
						<td style="text-align:center">' . $tresc['liczbaGodzin'] . '</td>
					</tr>';
	$sumaGodzin = $sumaGodzin + $tresc['liczbaGodzin'];
}
if($textPrinted){
	$html = $html . '<tr>
						<td></td>
						<td>Suma godzin</td>
						<td style="text-align:center">' . $sumaGodzin . '</td>
					</tr>
				</table><br/>';
	$textPrinted = false;
	$sumaGodzin = 0;
}

foreach($tresci as $tresc){
	if($tresc['formaZajec'] != 4)
		continue;
	if(!$textPrinted){
		$html = $html . '<table>
						<tr>
							<th></th>
							<th style="width: 80%">Forma zajęć - Projekt</th>
							<th>Liczba godzin</th>
						</tr>';
		$textPrinted = true;
		}
		$html = $html . '<tr>
						<td>' . $tresc['symbol'] . '</td>
						<td>' . $tresc['opis'] . '</td>
						<td style="text-align:center">' . $tresc['liczbaGodzin'] . '</td>
					</tr>';
	$sumaGodzin = $sumaGodzin + $tresc['liczbaGodzin'];
}
if($textPrinted){
	$html = $html . '<tr>
						<td></td>
						<td>Suma godzin</td>
						<td style="text-align:center">' . $sumaGodzin . '</td>
					</tr>
				</table><br/>';
	$textPrinted = false;
	$sumaGodzin = 0;
}
//============= STOSOWANE NARZĘDZIA DYDAKTYCZNE =================
$html = $html . '<div class="borders"><p class="centers">STOSOWANE NARZĘDZIA DYDAKTYCZNE</p>';

$ktoreNarzedzie = 1;
foreach($narzedzia as $narzedzie){
	$html = $html . 'N' . $ktoreNarzedzie . '. ' . $narzedzie['opis'] .  '<br/>';
	$ktoreNarzedzie++;
}

$html = $html . '</div><br/>';

//=========== OCENA OSIĄGNIĘCIA PRZEDMIOTOWYCH EFEKTÓW KSZTAŁCENIA
$html = $html . '<div class="borders"><p class="centers">OCENA OSIĄGNIĘCIA PRZEDMIOTOWYCH EFEKTÓW KSZTAŁCENIA</p>';
		$html = $html . '<table>
						<tr>
						<td>Oceny :F – formująca (w trakcie semestru), P – podsumowująca (na koniec semestru)</td>
						<td>Numery efektu kształcenia</td>
						<td> Sposób oceny osiągnięcia efektu kształcenia</td>
						</tr>';
		$textPrinted = true;
		
		foreach($oceny as $ocena){
				$html = $html . '<tr>
						<td>' . $ocena['symbol'] . '</td> <td>';
						foreach($ocena->getPeks()->each() as $pek)
								$html = $html  . $pek['symbol'] . ', ';
						$html = $html . '</td>

						<td style="text-align:center">' . $ocena['opis'] . '</td>
					</tr>';
		}
		$html = $html . '</table>';
		$html = $html . '</div><br/>';
//=========== LITERAURA PODSTAWOWA I UZUPEŁNIAJĄCA ==============
$html = $html . '<div class="borders"><p class="centers">LITERATURA PODSTAWOWA I UZUPEŁNIAJĄCA</p>
				<b><u>LITERATURA PODSTAWOWA</u></b><br/>' .
				$litPodstawowa . '<br/>
				<b><u>LITERATURA UZUPEŁNIAJĄCA</u></b><br/>' .
				$litUzupelniajaca . '</div><br/>';

//=========== OPIEKUN PRZEDMIOTU
$html = $html . '<div class="borders"><p class="centers">OPIEKUN PRZEDMIOTU (IMIĘ, NAZWISKO, ADRES E-MAIL)</p>
				<b> ' . $userName . ' ' . $userSurname . ', ' . $userEmail .  '</b></div><br/>';

$mpdf=new mPDF();
$mpdf->Bookmark('Start of the document');
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

?>