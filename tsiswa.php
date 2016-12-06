<?php
require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');
require_once('lib/m_nationality.php');

//perubahan line 7
$siswa = new Siswa();
$nation = new nationality();

$data_nation = $nation->readAllNationality();
if(isset($_POST['kirim'])){


	$name =$_POST['in_name'];
	$nis =$_POST['in_nis'];
	$email = $_POST ['in_email'];
	$nat = $_POST ['in_nation'];

	$tambah = $siswa->createSiswa($nat, $nis, $name, $email,'');
	echo "data siswa berhasil ditambah <br /><br />";


} ?>

<h1>Tambah Data Siswa</h1>
<form action="tsiswa.php" method="post">
NIS:<br />
<input type="text" name="in_nis"><br />
Nama Lengkap:<br />
<input type="text" name="in_name"><br />
Email:<br />
<input type="text" name="in_email"><br />
kewarganegaraan::<br />
	<select name="in_nation">
	<option value=""> --pilih negara--</option>
	<?php foreach($data_nation as $n): ?>
	<option value="<?php echo $n['id_nationality'] ?>">
	<?php echo $n['nationality'] ?>	
	</option>
	<?php endforeach?> 
</select> 
<br />
<input type="submit" name="kirim" value="simpan">
<input type="submit" name="hapus" value="hapus">
</form>

<br />
<a href="siswa.php">Kembali </a>
