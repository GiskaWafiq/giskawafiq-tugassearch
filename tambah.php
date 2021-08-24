<?php
include 'functions.php';

 // cek apakah tombol submit sudah ditekan atau belum
 if(isset($_POST["submit"]) ) {
  
    // cek apakah data berhasil di tambahkan atau tidak
    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }
 }
?>
<!DOCTYPE type>
<html>
<head>
    <title>Tambah data siswa</title>
</head>
<body>
    <h1>Tambah data siswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nis">Nis :</label>
                <input type="text" name="nis" id="nis" required>
            </li>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="tempat_lahir">Tempat lahir :</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>