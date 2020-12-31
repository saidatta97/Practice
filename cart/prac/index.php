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
      <a class="nav-link active" href="index.php">Active</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="cart.php">cart</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="add.php">Add Product</a>
    </li>
  </ul>
</div>

	<h1 align="center">Products</h1>
	<br/><br/>
	<div style="margin-left: 25px;margin-right: 25px;">
	<table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Add to Cart</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	include("config.php");	
$ret="select * from products";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res1=$stmt->get_result();
// $cnt=1;
while($row1=$res1->fetch_object())
	  {
	  	?>
<tr>
<td><?php echo $row1->name;?></td>
<td><?php echo $row1->category;?></td>
<td><?php echo $row1->price;?></td>
<td><a href="addcart.php?id=<?php echo $row1->id;?>"><i class="fa fa-edit"></i>ADD</a>&nbsp;&nbsp;
<a href="manage_books.php?del=<?php echo $row1->id;?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a></td>
										</tr>

									<?php } ?>

 
    </tbody>
  </table>
  </div>
</body>
</html>