<?php
include_once '../connection.php';

function filterData(&$str) {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

$filename = "members-data_" . date('Y-m-d') . ".xls";

$fields = array('cin', 'nom', 'prenom', 'date_embauche', 'tel', 'adresse', 'date_naissance', 'role', 'rendement', 'id_serre');
$excelData = implode("\t", $fields) . "\n";

$query = $conn->query("SELECT * FROM employe ORDER BY idemp ASC");

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $rowData = array();
        foreach ($fields as $field) {
            $rowData[] = $row[$field];
        }
        array_walk($rowData, 'filterData');
        $excelData .= implode("\t", $rowData) . "\n";
    }
}

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
echo $excelData;
exit;
?>
