<?php

$mpdf=new mPDF();
$mpdf->Bookmark('Start of the document');
$mpdf->WriteHTML('<h1>Tutaj kiedyś coś będzie</h2>');
$mpdf->WriteHTML('<strong>Haa! dupadupa</strong>');
$mpdf->Output();
exit;

?>