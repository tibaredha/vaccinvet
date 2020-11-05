<?php // imprimer directement avec ou sans boite de dialogue 
require('../PDF/fpdf.php');
class PDF_Javascript extends FPDF {
    var $javascript;
    var $n_js;
    function IncludeJS($script) {
        $this->javascript=$script;
    }
    function _putjavascript() {
        $this->_newobj();
        $this->n_js=$this->n;
        $this->_out('<<');
        $this->_out('/Names [(EmbeddedJS) '.($this->n+1).' 0 R ]');
        $this->_out('>>');
        $this->_out('endobj');
        $this->_newobj();
        $this->_out('<<');
        $this->_out('/S /JavaScript');
        $this->_out('/JS '.$this->_textstring($this->javascript));
        $this->_out('>>');
        $this->_out('endobj');
    }
    function _putresources() {
        parent::_putresources();
        if (!empty($this->javascript)) {
            $this->_putjavascript();
        }
    }
    function _putcatalog() {
        parent::_putcatalog();
        if (isset($this->javascript)) {
            $this->_out('/Names <</JavaScript '.($this->n_js).' 0 R>>');
        }
    }
}
define('FPDF_FONTPATH', 'font/');
class PDF_AutoPrint extends PDF_Javascript
{
function AutoPrint($dialog=false)
{
    //Embed some JavaScript to show the print dialog or start printing immediately
    $param=($dialog ? 'true' : 'false');
    $script="print($param);";
    $this->IncludeJS($script);
}
}
?>
<?php
$pdf=new PDF_AutoPrint();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 20);
$pdf->Text(90, 50, 'Print me!');
//Launch the print dialog true or false
$pdf->AutoPrint(true);
$pdf->Output();
?>


