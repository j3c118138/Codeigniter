<?php
$host   = "sql204.epizy.com";
$user   = "epiz_26777632";
$psw    = "IANlNIWSpOLoyg";
$db_name = "epiz_26777632_pabw";
$koneksi = mysqli_connect($host, $user, $psw, $db_name);

//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()) {
    echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
