<?php  
SESSION_start();
include 'koneksi.php';
$email = $_POST ['email'];
$pass = $_POST ['password'];

if (!empty($email) && !empty($pass)) {
	$sql = "select * from user where email = '$email' AND password = '$pass'";
	$query = mysqli_query($konek, $sql);
	if (mysqli_num_rows($query) > 0) {
		$row = mysqli_fetch_assoc($query);
		$_SESSION['email'] = $email;
		$_SESSION['name'] = $row['name'];
		$_SESSION['foto'] = $row['foto'];
		header("location: ../admin/index.php");
	} else {
		echo "Email dan Password Tidak Terdaftar";
	}
}else{
	echo "Email Kosong";
}

?>