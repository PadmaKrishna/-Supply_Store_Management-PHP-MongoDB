<?php ini_set('display_errors', 0); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supply store</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>
        view
    </title>



<script>
        function ine()
        {
            window.location="index.php";
        }
    </script>









 <style>
       table {
  width:100%;
}
table, th, td {
  border: 1px solid gray;
    

  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
        .well
        {
            background: rgba(0,0,0,0.7);
            border: none;
            padding:50px 50px 50px 50px;
            color: white;
            font-size: 20px;
            width:900px;
        }
        .wellfix
        {
            background: rgba(0,0,0,0.7);
            border: none;
            height: 200px;
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
      padding-top: 70px;
    }
  button {
background-color:grey;
border: none;
border-radius: 12px;
color: white;
padding: 15px 32px;
text-align: left;
text-decoration: none;
display: inline-block;
font-size: 16px;
}
    </style>   
</head>
</head>
<body>
    <br><br><br>
        <label class="l" ><center>Supply Store Management</center></label>
<center>   
<div class="well">
<?php


$db="arun";
$coll="sales";

$conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$query = new MongoDB\Driver\Query([]); 

$rows = $conn->executeQuery("arun.sales", $query);
   
foreach ($rows as $row1) 
{
    echo "<table border"."="."0".">
         <tr>
         <th width "."="."100%".">Shop Name : ". $row1->shop_name ."</th>
         </tr></table>";
    echo "<table border"."="."0".">
         <tr>
         <th width "."="."100%".">Shop Location : ".$row1->storeLocation."</th>
         </tr></table>";
    $count1=1; 
      foreach($row1->electronics as $rowelectro)
      {
        if($count1==1)
          {
         echo "<table border"."="."0".">
         <tr>
         <th width "."="."100%"."><center>MOBILES</center></th>
         </tr></table>";
         echo "<table border "."="."0%".">
         <tr>
    <th width "."="."20%".">Brand</th>
    <th width "."="."20%".">Name</th>
    <th width "."="."20%".">Ram</th>
    <th width "."="."20%".">Price</th>
    <th width "."="."20%".">Quantity</th>
    </tr></table>";
           foreach ($rowelectro->Mobile as $row2)
             {
             echo "
            <table ><center>
             <tr>
           <td width "."="."20%".">".$row2->brand."</td>
           <td width "."="."20%".">".$row2->name."</td>
           <td width "."="."20%".">".$row2->ram."</td>
           <td width "."="."20%".">".$row2->price."</td>
           <td width "."="."20%".">".$row2->qty."</td>
           </tr></center>
            </table>";          
             } 
          }

      if($count1==2)
          {
              echo "<table border"."="."0".">
              <tr>
             <th width "."="."100%"."><center>TV - LCD</center></th>
              </tr></table>";
               echo "<table border "."="."0%".">
               <tr>
                   <th width "."="."20%".">Brand</th>
                   <th width "."="."20%".">Name</th>
                   <th width "."="."20%".">Price</th>
                   <th width "."="."20%".">Quantity</th>
               </tr></table>";
         foreach($rowelectro->TV->LCD as $rowlcd)
              {
                         echo "
                        <table ><center>
                          <tr>
                            <td width "."="."20%".">".$rowlcd->brand."</td>
                            <td width "."="."20%".">".$rowlcd->name."</td>
      
                            <td width "."="."20%".">".$rowlcd->price."</td>
                            <td width "."="."20%".">".$rowlcd->qty."</td>
                          </tr></center>
                        </table>";          
                          
              }



               echo "<table border"."="."0".">
              <tr>
             <th width "."="."100%"."><center>TV - LED</center></th>
              </tr></table>";
               echo "<table border "."="."0%".">
               <tr>
                   <th width "."="."20%".">Brand</th>
                   <th width "."="."20%".">Name</th>
                   <th width "."="."20%".">Price</th>
                   <th width "."="."20%".">Quantity</th>
               </tr></table>";
         foreach($rowelectro->TV->LED as $rowled)
              {
                         echo "
                        <table ><center>
                          <tr>
                            <td width "."="."20%".">".$rowled->brand."</td>
                            <td width "."="."20%".">".$rowled->name."</td>
      
                            <td width "."="."20%".">".$rowled->price."</td>
                            <td width "."="."20%".">".$rowled->qty."</td>
                          </tr></center>
                        </table>";                     
              }
            }
    if($count1==3)
          {
         echo "<table border"."="."0".">
         <tr>
         <th width "."="."100%"."><center>LAPTOPS</center></th>
         </tr></table>";
         echo "<table border "."="."0%".">
         <tr>
    <th width "."="."20%".">Brand</th>
    <th width "."="."20%".">Name</th>
    <th width "."="."20%".">Processor</th>
    <th width "."="."20%".">Price</th>
    <th width "."="."20%".">Quantity</th>
    </tr></table>";
           foreach ($rowelectro->Laptop as $rowlap)
             {
             echo "
            <table ><center>
             <tr>
           <td width "."="."20%".">".$rowlap->brand."</td>
           <td width "."="."20%".">".$rowlap->name."</td>
           <td width "."="."20%".">".$rowlap->processor."</td>
           <td width "."="."20%".">".$rowlap->price."</td>
           <td width "."="."20%".">".$rowlap->qty."</td>
           </tr></center>
            </table>";          
             } 
          }
      $count1++;
     }

echo "<br>--------------------------------------------------------------------------------------------------------------------------------------<br><br><br><br><br>"; 
}
if(isset($_POST['finish']))
{
header("location:view.php");
}
?>
<br>
<br>
<form action="" method="POST">
  <center><button type="submit" name="finish" value="finish" id=finish >Finish</button><center>
       <button type="button" name="bcak" value="back" id=back onclick="ine()">Back</button>
</form>
</div>
</center>
</body>
</html>