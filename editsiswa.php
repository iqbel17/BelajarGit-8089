<?php

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');
require_once('lib/m_nationality.php');

if(!isset($_POST['kirim'])){
	exit('acces forbiden');
}
$siswa = new Siswa();
if (!copy($_FILES['in_foto']['tmp_name'], 'img/'.$_POST['in_nis'].'.png')) {
	exit('Error upload Files');
}
$data['input_name'] = $_POST ['in_nama'];
$data['input_email'] = $_POST ['in_email'];
$data['input_nationality'] = $_POST  ['in_nation'];
$data['foto']='img/'.$_POST['in_nis'].'.png';
//print_r($_FILES);
$siswa->updateSiswa($_POST['in_nis'],$data);
echo "data siswa berhasil diupdate";
echo "<a href='esiswa.php?a=".$_POST['in_nis']."'>detail Siswa</a>";

?>