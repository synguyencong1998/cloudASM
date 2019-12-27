<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Add</title>
</head>

<body>
    <div class="content">
        <h1>Adding Product Form</h1>
        <?php 
        require("connect.php");   
        if(isset($_POST["submit"]))
            {
                $name = $_POST["proname"];
                $price = $_POST["price"];
                $descript = $_POST["descript"];
                $img = $_FILES["images"];
                if ($name == ""||$price == ""|| $descript == "") 
                    {
                        ?>
                        <script>
                            alert("Product information should not be blank!!");
                        </script>
                        <?php
                    }
                else
                    {
                        $sql = "select * from product where proname='$name'";
                        $query = pg_query($conn, $sql);
                        if(pg_num_rows($query)>0)
                        {
                        ?> 
                            <script>
                                alert("The product is available!!");
                            </script>
                        <?php
                        }
                        else
                        {
                            // image file directory
                            $target = "images/".basename($image);

                            $sql = "INSERT INTO product(proname, price, descript, img) VALUES ('$name','$price','$descript', '$img')";
                            pg_query($conn,$sql);

                            $uploads_dir = '/images';
                            foreach ($_FILES["images"]["error"] as $key => $error) {
                                if ($error == UPLOAD_ERR_OK) {
                                    $tmp_name = $_FILES["images"]["tmp_name"][$key];
                                    // basename() may prevent filesystem traversal attacks;
                                    // further validation/sanitation of the filename may be appropriate
                                    $name = basename($_FILES["images"]["name"][$key]);
                                    move_uploaded_file($tmp_name, "$uploads_dir/$name");
                                }
                            }

                            ?> 
                                <script>
                                    alert("Added successful!");
                                    window.location.href = "/managing.php";
                                </script>
                            <?php
                        }
                    }
            }
			?>
        <form action="add.php" method="POST" enctype="multipart/form-data">
            <input class="input-information" type="text" width="300" height="100" name="proname" placeholder="Name"> <br>
            <input class="input-information" type="text" width="300" height="100" name="price" placeholder="Price"> <br>
            <input class="input-information" type="text" width="300" height="100" name="descript" placeholder="Description"> <br>

            <div>Select images: <input type="file" name="file"></div><br>
            <button type="submit" value="Add" name="submit">Add</button>
        </form>
        
        <button><a href="/managing.php">Back</a></button>
    </div>
</body>

</html>