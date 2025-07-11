<?php
    require_once 'autoload.php';

    use Reports\ExcelReport;
    use Reports\PDFReport;

    $pdfReport = new PDFReport("GENISIS");
    echo $pdfReport->generate();

    echo '        ';

    $excelReport = new ExcelReport("ALKALINE");
    echo $excelReport->generate();
?>