<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="css/test.css">
    <title>Document</title>
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
    <div class="content">
        <div class="register-new-student">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <h2>Managing Product</h2>
                        <hr>
                    </div>
                </div>
            </div>


     <table class="table table-dark" style="width: 70%; margin: auto;">
            <thead>
            <tr>
                <th class="tit" scope="col">ID</th>
                <th class="tit" scope="col">Name</th>
                <th class="tit" scope="col">Price ($)</th>
                <th class="tit" scope="col">Description</th>
                <th class="tit" scope="col">Editing</th>
            </tr>

            <?php
            require_once './database.php';
            $sql = "SELECT * FROM product";
            $stmt = $pdo->prepare($sql);
            foreach ($pdo->query($sql) as $row) {
            ?>
                <tr>
                    <td class="info"><?php echo $row['productid']?></td> 
                    <td class="info"><?php echo $row['proname']?></td> 
                    <td class="info"><?php echo $row['price']?></td> 
                    <td class="info"><?php echo $row['descrip']?></td> 
                    <td class="info">
                    </td>
                </tr>
            <?php
            }
            ?>  

            </thead>
    

        </table>
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <hr>
                <button type="submit"  value="Add" class="btn btn-success"><i class="fa fa-user-plus"></i> <a href="/add.php" style="text-decoration: none; color: white;">Create More</a></button>
            </div>
        </div>
  
       
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>