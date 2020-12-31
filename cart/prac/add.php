<?php
include("config.php");
if(isset($_POST['submit']))
{

  $name=$_POST['name'];
  $price=$_POST['price'];
  $category=$_POST['category'];
  
 mySQLi_query($mysqli,"INSERT INTO products (name,category,price)
      VALUES ('$name','$category',$price)");
echo "<script>alert(' Product Added'); window.location='index.php'</script>";
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<br/><br/>
<div class="container">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="index.php">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="cart.php">cart</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="add.php">Add products</a>
    </li>
  </ul>

            <form method="post" enctype="multipart/form-data" class="form-horizontal">
               <br/><br/> 
              <div class="hr-dashed"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Product Name</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="name" id="name" value="" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-8">
                          <input type="Text" class="form-control" name="price" id="price" value="" required="required">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">category</label>
                        <div class="col-sm-8">
                          <input type="Text" class="form-control" name="category" id="category" value="" required="required">
                        </div>
                      </div>


                      <div class="col-sm-12 col-sm-offset-2">
                      <input class="btn btn-primary" type="submit" name="submit" value="Add">
                      </div>

              

            </form>

</div>

	</div>
</body>
</html>

