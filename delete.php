<?php
$db="arun";
$coll="sales";

$conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$query = new MongoDB\Driver\Query([]); 

$rows = $conn->executeQuery("arun.sales", $query);
$storevalues=array();
$product_type=array("Mobile","LCD","LED","Laptop");
$count=0;   
if(isset($_GET['prod_type']))
{
$prod_type=$_GET['prod_type'];
$product_type=array($prod_type);
}
foreach ($rows as $row1) 
{
    $storevalues[$count]=$row1->storeLocation;
    $count++; 
}
?>



<!DOCTYPE html>
<html>
<head>
    <title> Delete</title>
    <script>
        function ine()
        {
            window.location="index.php";
        }
    </script>

    <style>
        .well
        {
            background: rgba(0,0,0,0.7);
            border: none;
            padding:50px 50px 50px 50px;
        color: white;
        font-size: 20px;
width:360px;

        }
        .wellfix
        {
            background: rgba(0,0,0,0.7);
            border: none;
            height: 150px;
        }
    body
    {
      background-image: url('14.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
    p
    {
      font-size: 13px;
    }
    .l{
      
      color:    white;
      font-size: 40px;
      font-variant: small-caps;
      
      text-align: center;
      padding-top: 50px;
    }
  button {
background-color:black;
border: none;
border-radius: 20px;
color: white;
padding: 15px 35px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
}

    </style>







































    <?php if(isset($_POST['submit_mobile']))
    {
        $SL=$_POST['storelocation'];
        $BN=$_POST['brandname'];
       $LN=$_POST['name'];
        //$RM=$_POST['ram'];
        //$PO=$_POST['processor'];
        //$PR=$_POST['price'];
        //$QT=$_POST['qty'];



         $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $bulk = new MongoDB\Driver\BulkWrite;
       $bulk->update( ['storeLocation'=>$SL],
                    ['$pull'=>['electronics.0.Mobile'=>
                            array('brand'=>$BN,
                                   'name'=>$LN )
                                    ]]);



                $mng -> executeBulkWrite('arun.sales', $bulk);
        echo  "successfully updateed";
        header("location:delete.php");
            }
?>

    <?php if(isset($_POST['submit_laptop']))
    {
        $SL=$_POST['storelocation'];
        $BN=$_POST['brandname'];
       $LN=$_POST['name'];
        //$RM=$_POST['ram'];
        //$PO=$_POST['processor'];
        //$PR=$_POST['price'];
        //$QT=$_POST['qty'];


         $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(['storeLocation'=>$SL],
                    ['$pull'=>['electronics.2.Laptop'=>
                            array('brand'=>$BN,
                                   'name'=>$LN)
                                    ]]);



                $mng -> executeBulkWrite('arun.sales', $bulk);
        echo  "successfully updateed";
        header("location:delete.php");
            }
?>

<?php if(isset($_POST['submit_LCD']))
    {
        $SL=$_POST['storelocation'];
        $BN=$_POST['brandname'];
       $LN=$_POST['name'];
        //$PR=$_POST['price'];
        //$QT=$_POST['qty'];



         $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update( ['storeLocation'=>$SL],
                    ['$pull'=>['electronics.1.TV.LCD'=>
                            array('brand'=>$BN,
                                  'name'=>$LN)
                                    ]]);



                $mng -> executeBulkWrite('arun.sales', $bulk);
        echo  "successfully updateed";
        header("location:delete.php");
            }
?>

<?php if(isset($_POST['submit_LED']))
    {
        $SL=$_POST['storelocation'];
        $BN=$_POST['brandname'];
        $LN=$_POST['name'];
       // $PR=$_POST['price'];
        //$QT=$_POST['qty'];



         $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update( ['storeLocation'=>$SL],
                    ['$pull'=>['electronics.1.TV.LED'=>
                            array('brand'=>$BN,
                                  'name'=>$LN)
                                    ]]);



                $mng -> executeBulkWrite('arun.sales', $bulk);
        echo  "successfully updateed";
        header("location:delete.php");
            }
?>




</head>
<body>
<form method="POST" action="">
<center>
    
    <?php 
    if(isset($prod_type))
    {
        ?>
          <label class="l" ><center>Supply Store Management</center></label>
    <input type="label" value="Product Type" style="width:200px;"readonly>
    <select name="producttype" id="producttype" style="width:200px;" >
    <option value="<?php echo $prod_type; ?>"><?php echo $prod_type; ?></option>
</select><br>
    <?php
}
else
{
?>  
    <input type="label" value="Product Type" style="width:200px;"readonly>
    <select name="producttype" id="producttype" style="width:200px;" onchange="window.location='delete.php?prod_type='+this.value">
        <option value='' disabled selected>--Select--</option>
<?php
foreach ($product_type as $value)
 {
    ?>
    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
    <?php
}
?>  
</select><br>
<?php 
}
 ?>
    <input type="label" value="Store location" style="width:200px;" readonly>
    <select name="storelocation" style="width:200px;">
    <option value='' disabled selected>--Select--</option>
<?php
foreach ($storevalues as $value)
 {
    ?>
    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
    <?php
}
?>  
</select><br>

<?php
if(isset($prod_type))
   if($prod_type == "Mobile")  
   {
    ?>
    <!--<label class="l" ><center>Supply Store Management</center></label>-->
<center>    <div class="container">
    <div class="well " align="center">
     <input type="label" value="Brand Name" style="width:200px;"readonly>
    <input type="text" name="brandname" style="width:200px;"><br>
    <input type="label" value="Name" style="width:200px;"readonly>
    <input type="text" name="name" style="width:200px;"><br>
    <!--<input type="label" value="Ram" style="width:200px;">
    <input type="text" name="ram" style="width:200px;"><br>
    <input type="label" value="Price" style="width:200px;">
    <input type="text" name="price" style="width:200px;"><br>
    <input type="label" value="Quantity" style="width:200px;">
    <input type="text" name="qty" style="width:200px;"><br>-->
    <center>    <input type="submit" value="Delete" name="submit_mobile"></center>
    <?php
   }
   else if($prod_type == "LED")  
   {
    ?>
    <!--<label class="l" ><center>Supply Store Management</center></label>-->
<center>    <div class="container">
    <div class="well " align="center">
     <input type="label" value="Brand Name" style="width:200px;"readonly>
    <input type="text" name="brandname" style="width:200px;"><br>
   <input type="label" value="Name" style="width:200px;"readonly>
    <input type="text" name="name" style="width:200px;"><br>
   <!-- <input type="label" value="Price" style="width:200px;">
    <input type="text" name="price" style="width:200px;"><br>
    <input type="label" value="Quantity" style="width:200px;">
    <input type="text" name="qty" style="width:200px;"><br>-->
    <center>    <input type="submit" value="Delete" name="submit_LED"></center>
    <?php
   }
    else if($prod_type == "LCD")  
   {
    ?>
    <!--<label class="l" ><center>Supply Store Management</center></label>-->
<center>    <div class="container">
    <div class="well " align="center">
     <input type="label" value="Brand Name" style="width:200px;"readonly>
    <input type="text" name="brandname" style="width:200px;"><br>
    <input type="label" value="Name" style="width:200px;"readonly>
    <input type="text" name="name" style="width:200px;"><br>
   <!-- <input type="label" value="Price" style="width:200px;">
    <input type="text" name="price" style="width:200px;"><br>
    <input type="label" value="Quantity" style="width:200px;">
    <input type="text" name="qty" style="width:200px;"><br>-->
    <center>    <input type="submit" value="Delete" name="submit_LCD"></center>
    <?php
   }
   else if($prod_type == "Laptop")  
   {
    ?>
    <!--<label class="l" ><center>Supply Store Management</center></label>-->
<center>    <div class="container">
    <div class="well " align="center">
     <input type="label" value="Brand Name" style="width:200px;"readonly>
    <input type="text" name="brandname" style="width:200px;"><br>
    <input type="label" value="Name" style="width:200px;"readonly>
    <input type="text" name="name" style="width:200px;"><br>
    <!--<input type="label" value="processor" style="width:200px;">
    <input type="text" name="processor" style="width:200px;"><br>
    <input type="label" value="Price" style="width:200px;">
    <input type="text" name="price" style="width:200px;"><br>
    <input type="label" value="Quantity" style="width:200px;">
    <input type="text" name="qty" style="width:200px;"><br>-->
    <center>    <input type="submit" value="Delete" name="submit_laptop"></center>
    <?php
   }
?>

  

   
   <button type="button" name="bcak" value="back" id=back onclick="ine()">Back</button>
<!--<center>    <input type="submit" value="update" name="submit2"></center>
<center>    <input type="submit" value="delete" name="submit3"></center>-->
</center>
</form>
</body>
</html>