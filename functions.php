<?php
// koneksi ke database
$conn = mysqli_connect('localhost','root','','tugassearch');

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    } 
    return $rows;
}

function tambah($data) {
    global $conn;

    $nis = htmlspecialchars($data["nis"]);
    $nama = htmlspecialchars($data["nama"]);
    $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);

    $query = "INSERT INTO siswa
                  VALUES
                  ('', '$nis', '$nama', '$tempat_lahir')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function edit($data) {
    global $conn;

    $id = $data["id"];
    $nis = htmlspecialchars($data["nis"]);
    $nama = htmlspecialchars($data["nama"]);
    $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);

    $query = "UPDATE siswa SET
                  nis = '$nis', 
                  nama = '$nama',
                  tempat_lahir = '$tempat_lahir'
                WHERE id = $id
                  ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function search($keyword) {
    $query = "SELECT * FROM siswa
                WHERE 
                nama LIKE '%$keyword%' OR
                nis LIKE '%$keyword%' OR
                tempat_lahir LIKE '%$keyword%'
            ";
    return query($query);   
}

?>