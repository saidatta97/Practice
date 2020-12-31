<?php
  //session_start();
  include('config.php');
  // $id=$_SESSION['id'];
    // $user=$_SESSION['user'];
    //echo "<script>alert('$user');</script>";         
    // include("config.php");
    // $query="SELECT * from admin where id='$id' ";
    // $res=mysqli_query($mysqli,$query);
    // $row=mysqli_fetch_row($res);
  if(isset($_GET['del']))
  {

    $id1=intval($_GET['del']);
    //echo "<script>alert($id1);</script>" ;
    $adn="delete from cart where cart_id=?";
      $stmt= $mysqli->prepare($adn);
      $stmt->bind_param('i',$id1);
          $stmt->execute();
          $stmt->close();    
          echo "<script>alert('Data Deleted');</script>" ;
  }

  if(isset($_GET['emp']))
  {

    // $id1=intval($_GET['del']);
    //echo "<script>alert($id1);</script>" ;
    $adn="truncate table cart";
      $stmt= $mysqli->prepare($adn);
          $stmt->execute();
          $stmt->close();    
          echo "<script>alert('Data Deleted');</script>" ;
  }
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<br/><br/>
<div class="container">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="cart.php">cart</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
</div>

	<h1 align="center">Cart List</h1>
	<br/><br/>

  <a style="margin-left:50px;" href="cart.php?emp" onclick="return confirm('Do you want to delete');"><i class="fa fa-close">Empty the cart</i></a>
  <br/>
	
  <div style="margin-left: 25px;margin-right: 25px;">
    <br/>
	<table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>name</th>
        <th>category</th>
        <th>price</th>
        <th>Quantity</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	include("config.php");	
$ret="SELECT * FROM cart JOIN products ON (cart.poduct_id=products.id)";
$stmt= $mysqli->prepare($ret);
$stmt->execute();
$res=$stmt->get_result();
// $row=$res->fetch_object()
// $cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr>
<td><?php echo $row->name;?></td>
<td><?php echo $row->category;?></td>
<td><?php echo $row->price;?></td>
<td><?php echo $row->quantity;?></td>
<td><a href="edit.php?id=<?php echo $row->cart_id;?>"><i class="fa fa-edit"></i>Edit</a>&nbsp;&nbsp;
<a href="cart.php?del=<?php echo $row->cart_id;?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close">X</i></a></td>
										</tr>

									<?php } ?>

 
    </tbody>
  </table>
  <?php
    // $ret1="SELECT sum(price) FROM cart JOIN products ON (cart.poduct_id=products.id)";
    // $stmt1= $mysqli->query($ret1);
    // $stmt1->execute();
    // $res1=$stmt1->get_result();  
  include("config.php");
      // $sum=mysqli_query($mysqli,"SELECT sum(price) FROM cart JOIN products ON (cart.poduct_id=products.id)");

    $result = mysqli_query($mysqli,'SELECT sum(price) as price FROM products JOIN cart ON (products.id=cart.poduct_id)'); 
$row1 = mysqli_fetch_assoc($result); 
$sum = $row1['price'];

  $ret2="SELECT * FROM products JOIN cart ON (products.id=cart.poduct_id)";
$stmt2= $mysqli->prepare($ret2) ;
//$stmt->bind_param('i',$aid);
$stmt2->execute() ;//ok
$res2=$stmt2->get_result();
// $cnt=1;
$sum1=0;
while($row2=$res2->fetch_object())
    {


      if(strcmp($row2->name,"chair")==0)
     {
      // $sum1=$row2->price;
      
      $sum1=($row2->price * $row2->quantity);
      $disc=($sum1/100)*10;
      $sum1=$sum1-$disc;

     }
     

     // delivary charges
     if(strcmp($row2->category,"furniture")==0)
     {
      $sum1=$sum1+50;
     }


     //  if(strcmp($row2->name,"chair")==0)
     // {
     //  $disc=($sum1/100)*10;
     //  $sum1=$sum1-$disc;
     // }


    }

  ?>
<div style="float: right; margin-right: 170px;">
  <label>Total &nbsp;&nbsp;&nbsp; </label><b><?php echo $sum1 ?></b>
</div>

</body>
</html>