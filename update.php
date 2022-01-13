<a href="index.php">Show Data</a>
<br><br>

<?php
include 'config.php';
$a=mysqli_query($conn,"SELECT * FROM peminjaman WHERE id='$_GET[id]'");
$b=mysqli_fetch_array($a,MYSQLI_ASSOC)
?>
<form method="post">
ID : <input type="text" name="id" value="<?= $b['id'] ?>"><br><br>
	Nama Mobil: <input type="text" name="nama_mobil" value="<?= $b['nama_mobil'] ?>"><br><br>
	Tanggal : <input type="date" name="tanggal" value="<?= $b['alamat'] ?>"><br><br>
	Status : <select name="status">
      <option value="sudah">Sudah Dikembalikan</option>
      <option value="belum">Belum Dikembalikan</option>
  </select><br><br>
<input type="submit" name="update" value="Update">
	<input type="reset" name="cancel" value="Cancel">
</form>
<?php
if(isset($_POST['update']))
{
  include 'config.php';
  $id=$_POST['id'];
  $nama_mobil=$_POST['nama_mobil'];
  $tanggal=$_POST['tanggal'];
  $status=$_POST['status'];

  $sql="UPDATE peminjaman SET id='$id',nama_mobil='$nama_mobil',tanggal='$tanggal',status='$status' WHERE id='$_GET[id]'";
  if($conn->query($sql) === false)
  { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
    trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  }  
  else 
  { // Jika berhasil alihkan ke halaman tampil.php
    echo "<script>alert('Update Success!')</script>";
  	echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
  }
}

?> 