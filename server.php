<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'city');
	$country = "";
	$city = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$country = $_POST['country'];
		$city = $_POST['city'];
		mysqli_query($db, "INSERT INTO info(country, city) VALUES ('$country', '$city')"); 
		$_SESSION['message'] = "city saved"; 
		header('location: index.php');
	}
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$country=$n['country'];
			$city = $n['city'];

		}
	}
	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$country = $_POST['country'];
	$city = $_POST['city'];

	mysqli_query($db, "UPDATE info SET country='$country', city='$city' WHERE id=$id");
	$_SESSION['message'] = "city updated!"; 
	header('location: index.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "city deleted!"; 
	header('location: index.php');
}
	?>