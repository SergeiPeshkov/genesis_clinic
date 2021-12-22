<?php
require '../../../wp-load.php';
function generateCsv($data, $delimiter = ',', $enclosure = '"') {
       $handle = fopen('php://temp', 'r+');
       foreach ($data as $line) {
               fputcsv($handle, $line, $delimiter, $enclosure);
       }
       rewind($handle);
       while (!feof($handle)) {
               $contents .= fread($handle, 8192);
       }
       fclose($handle);
       return $contents;
}

$rslt = $wpdb->get_results("SELECT email, name, surname FROM gnss_mb", "ARRAY_N");
header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
print "$header\n".generateCsv($rslt, ';');
?>