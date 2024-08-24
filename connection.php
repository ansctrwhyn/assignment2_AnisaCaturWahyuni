<?php
function getConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "data_karyawan";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal : " . $conn->connect_error);
    }

    return $conn;
};
