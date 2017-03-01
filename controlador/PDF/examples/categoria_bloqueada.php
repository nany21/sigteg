<?php
    ob_start();
    include(dirname(__FILE__).'/res/categoria_bloqueada.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once(dirname(__FILE__).'/../html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'letter', 'ES');
//      $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('Reporte de categoria_bloqueada.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>