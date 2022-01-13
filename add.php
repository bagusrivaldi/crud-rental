<a href="index.php">Show Data</a>
<br><br>
<form method="post">
  ID : <input type="text" name="id" placeholder="Masukkan ID"><br><br>
  Nama Mobil : <input type="text" name="nama_mobil" placeholder="Masukkan Nama Mobil"><br><br>
  Tanggal : <input type="date" name="tanggal"><br><br>
  Status : <select name="status">
      <option value="sudah">Sudah Dikembalikan</option>
      <option value="belum">Belum Dikembalikan</option>
  </select><br><br>
  <input type="submit" name="add" value="Add">
  <input type="reset" name="reset" value="Cancel">
</form>
<?php
if (isset($_POST['add'])) {
  include 'config.php';
  $id = $_POST['id'];
  $nama_mobil = $_POST['nama_mobil'];
  $tanggal = $_POST['tanggal'];
  $status = $_POST['status'];

  $sql = "INSERT INTO peminjaman (id,nama_mobil,tanggal,status) VALUES ('$id','$nama_mobil','$tanggal','$status')";
  if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  } else {
    echo "<script>alert('Add Success!')</script>";
    echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
  }
}

?>