<?php
$tglid = $_POST['tgl'];   // department id

$sql = "SELECT id_jadwal,Tanggal_keberangkatan FROM jadwal WHERE serah_terima_inventaris=" . $tnggalid;

$result = mysqli_query($con, $sql);

$users_arr = array();

while ($row = mysqli_fetch_array($result)) {
    $userid = $row['id_jadwal'];
    $Tanggal_keberangkatan = $row['Tanggal_keberangkatan'];

    $users_arr[] = array("id_jadwal" => $userid, "Tanggal_keberangkatan" => $Tanggal_keberangkatan);
}

// encoding array to json format
echo json_encode($users_arr);
