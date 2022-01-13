<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<button type="button" class="btn btn-outline-secondary"><a href="add.php">Add</a></button>
<br><br>
<table border="" width="100%">
 <tbody>
    <tr>
       <th>ID</th>
       <th>Nama Mobil</th>
       <th>Tanggal</th>
       <th>Status</th>
       <th>Action</th>
    </tr>
    <?php
    include 'config.php';
    $a=mysqli_query($conn,"SELECT * FROM peminjaman");
    foreach ($a as $b)
    {
    ?>
    <tr>
       <td><?= $b['id']; ?></td>
       <td><?= $b['nama_mobil']; ?></td>
       <td><?= $b['tanggal']; ?></td>
       <td><?= $b['status']; ?></td>
       <td>
            <a href="update.php?id=<?= $b['id']; ?>"><b><i>Edit</i></b></a> | 
            <a href="index.php?id=<?= $b['id']; ?>" onclick="return confirm('Are you sure?')"><b><i>Delete</i></b></a>
        </td>
    </tr>  
    <?php } ?>                          
 </tbody>
</table>


<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql="DELETE FROM peminjaman WHERE id='$id'";
    if($conn->query($sql) === false)
    { // Jika gagal insert data tampilkan pesan dibawah 'Perintah SQL Salah'
      trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } 
    else 
    { 
      echo "<script>alert('Delete Success!')</script>";
      echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
    }
}

?> 