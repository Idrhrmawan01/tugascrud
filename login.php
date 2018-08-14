<?php 
$title="login";
$error=null;
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
	$user=$_POST['username'];
	$password=$_POST['password'];
	$sql="SELECT * FROM login WHERE username='{$user}' AND password='{$password}'";
	$result=mysqli_query($conn, $sql);
	if ($result && $result->num_rows > 0) {
		session_start();
		$_SESSION['isLogin'] = 1;
		header('location: index.php');
	} else 
	$error ="Username atau Password Salah";
}

include_once 'header.php'; ?>
<div id="login">
	<h2>Login Form</h2>
	<form action="" method="post">
		<label>Username :</label>
		<input id="name" name="username" placeholder="username" type="text">
		<label>Password</label>
		<input type="password" name="password" id="password" placeholder="*********">
		<input type="submit" name="submit" value="Login">
		<span><?php echo $error; ?></span>
	</form>
</div>
<?php include_once 'footer.php'; ?>