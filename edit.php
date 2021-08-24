<?php
include 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$sis = query("SELECT * FROM siswa WHERE id = $id")[0];

 // cek apakah tombol submit sudah ditekan atau belum
 if(isset($_POST["submit"]) ) {
  
    // cek apakah data berhasil di edit atau tidak
    if(edit($_POST) > 0){
        echo "
            <script>
                alert('data berhasil diedit');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diedit');
                document.location.href = 'index.php';
            </script>
        ";
    }
 }
?>
<!DOCTYPE type>
<html>
<head>
    <title>Edit data siswa</title>
</head>
<body>
    <h1>Edit data siswa</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $sis["id"]; ?>">
        <ul>
            <li>
                <label for="nis">Nis :</label>
                <input type="text" name="nis" id="nis" required value="<?= $sis["nis"]; ?>">
            </li>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required value="<?= $sis["nama"]; ?>">
            </li>
            <li>
                <label for="tempat_lahir">Tempat lahir :</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" required value="<?= $sis["tempat_lahir"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Edit Data</button>
            </li>
        </ul>
    </form>
</body>
</html>