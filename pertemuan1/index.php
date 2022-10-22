<?php
 //koneksi
include('koneksi.php');
$sql = 'SELECT Nama, NIM, Tugas, UTS,  FROM mahasiswa';

$query= mysqli_query($conn, $sql);

if (!$query){
    die ('SQL Error: ' . mysqli_error($conn));
}

echo'<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin</title>
            <style>
            body {font-family}
            </style>
        </head>
        <body>
            <h1>hallo world</h1>
            <table border="1" cellpadding="10" cellspacing="0" >
                <thead>
                    <tr>
                        <th>NAMA</th>
                        <th>NIM</th>
                        <th>TUGAS</th>
                        <th>UTS</th>
                        <th>UAS</th>
                    </tr>
                </thead>
                <tbody>';
        echo
                </tbody>
            </table>
        </body>
        </html>
'
?>