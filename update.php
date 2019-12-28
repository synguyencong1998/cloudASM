<?php
require("connect.php");

$id = $_POST['productid'];
if (isset($_POST['update'])) {
	$name = $_POST["proname"];
    $price = $_POST["price"];
	$descript = $_POST["descript"];
	if ($name == ""||$price == ""|| $descript == "") {
    ?>
		<script>
			alert("Product information should not be blank!!");
		</script>
		<?php
    } else {
		$sql = "select * from product where proname='$name'";
		$query = pg_query($conn, $sql);
		if(pg_num_rows($query)>1) {
		?> 
			<script>
				alert("The product is available!!");
			</script>
		<?php
		} else {
			if(isset($_FILES['images'])) {
                $img = './images/' . $_FILES['images']['name'];
                move_uploaded_file($_FILES['images']['tmp_name'], './images/' . $_FILES['images']['name']);
            }
			$sql = "UPDATE product SET proname='$name', price='$price', descript='$descript', img='$img' WHERE productid='$id'";
			$run = pg_query($conn, $sql);
			if ($run) { ?>
			<script type="text/javascript">
					alert ("Update info successfully!!");
					window.location.href = "/managing.php";
			</script>
			<?php 
			} else { ?>
			<script type="text/javascript">
					alert ("Update product failed!!");
					window.location.href = "/managing.php";
			</script>
			<?php } 
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Update</title>
</head>

<body>
    <div class="content">
        <h1>Update Information</h1>
        <form action="/update.php" method="POST" enctype="multipart/form-data">
			<?php
			$qry = "SELECT * FROM product WHERE productid = '$id'";
			$result = pg_query($conn, $qry);
			$row = pg_fetch_row($result);
			?>
			<input type="hidden" name="productid" value="<?= $row[0] ?>">
			<input class="input-information" type="text" name="proname" value="<?= $row[1] ?>">
			<input class="input-information" type="text" name="price" value="<?= $row[2] ?>">
			<input class="input-information" type="text" name="descript" value="<?= $row[3] ?>">
			<input class="input-information" type="file" name="images" value="<?= $row[4]?>">
			<input class="update-ip" type="submit" name="update" value="Update">
		</form>
        
        <button><a href="/managing.php">Back</a></button>
		<br><br>
    </div>
</body>

</html>