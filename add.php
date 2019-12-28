<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Adding into database</title>
    <script src="https://kit.fontawesome.com/3fa7701fe0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><i class="fas fa-user-plus"></i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </div>
              </nav>

    <div class="body">

        <form action="add.php" method="POST">
            <div class="container">
                    <form class="form-horizontal" action="/admin/add/student" method="POST">
            
                        <div class="register-new-student">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <h2>Create New Products</h2>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <!-- First Name -->
                        <div class="row">
                            <div class="col-md-3 field-label-responsive">
                                <label for="name">Name</label>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-user"></i></div>
                                        <input type="text" name="proname" class="form-control" id="name" placeholder="Name" required autofocus>
                                    </div>
                                </div>
                            </div>                       
                        </div>     
                        
                         <!-- First Name -->
                         <div class="row">
                                <div class="col-md-3 field-label-responsive">
                                    <label for="name">Price</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                            <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-money-check-alt"></i></div>
                                            <input type="text" name="price" class="form-control" id="name" placeholder="Price" required autofocus>
                                        </div>
                                    </div>
                                </div>                       
                            </div>      

                             <!-- First Name -->
                        <div class="row">
                                <div class="col-md-3 field-label-responsive">
                                    <label for="name">Description</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                            <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-user-edit"></i></div>
                                            <input type="text" name="descrip" class="form-control" id="name" placeholder="Description" required autofocus>
                                        </div>
                                    </div>
                                </div>                       
                            </div>     
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <button  class="btn btn-success"><a href="/managing.php" style="text-decoration: none; color: white;">Back</a></button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit"   value="Add" class="btn btn-success"><i class="fa fa-user-plus"></i> Create</button>
                                </div>
                            </div>
                        
                    </form>
            </div>
        </form>




    <?php 
        require("connect.php");   
        if(isset($_POST["submit"]))
            {
                $name = $_POST["proname"];
                $price = $_POST["price"];
                $descrip = $_POST["descrip"];
                if ($name == ""||$price == ""|| $descrip == "") 
                    {
                        ?>
                        <script>
                            alert("Please input product information!!");
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
                            $sql = "INSERT INTO product(proname, price, descrip) VALUES ('$name','$price','$descrip')";
                            pg_query($conn,$sql);
                            ?> 
                                <script>
                                    alert("Added into Database successful!!");
                                    window.location.href = "/managing.php";
                                </script>
                            <?php
                        }
                    }
            }
            ?>
            

           
    </div>
          
          

      

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>