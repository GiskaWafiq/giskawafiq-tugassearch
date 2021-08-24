<?php 
include 'functions.php';
$siswa = query("SELECT * FROM siswa");

// tombol cari ditekan 
if(isset($_POST["search"]) ) {
    $siswa = search($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>
    
<h1>Daftar Siswa</h1>

<a href="tambah.php">Tambah data siswa</a>
<br><br>

<form action="" method="post">
    <input type="text" name="keyword" siza="50" autofocus placeholder="masukkan keyword search..." autocomplete="off">
    <button type="submit" name="search">Search</button>
</form>
<br>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Tindakan</th>
        <th>Nis</th>
        <th>Nama</th>
        <th>Tempat lahir</th>
    </tr>
    
    <?php $i = 1; ?>
    <?php foreach( $siswa as $row ) :?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="edit.php?id=<?= $row["id"]; ?>">edit</a>
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah Anda Yakin?');">hapus</a>
        </td>
        <td><?= $row["nis"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["tempat_lahir"]; ?></td>
    
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
</body>
</html>