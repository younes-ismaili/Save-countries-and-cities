<?php  include('server.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>City weather</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
	<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

<table>
	<thead>
		<tr>
			<th>Country</th>
			<th>City</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['country']; ?></td>
			<td><?php echo $row['city']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

<form>
<?php endif ?>
	<form method="post" action="server.php" >
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Country</label>
             <input type="text" name="country" value="<?php echo $country; ?>">
		</div>
		<div class="input-group">
			<label>City</label>
			<input type="text" name="city" value="<?php echo $city; ?>">
		</div>
		<div class="input-group">
		<center>
         <button class="btn" type="submit" name="save" >save</button>
	    <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
	    </center>
		</div>
	</form>
</body>
</html>