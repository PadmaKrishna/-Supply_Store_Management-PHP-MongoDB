<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sipply store</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <script>
        function ins()
        {
            window.location="insert.php";
        }
        function vie()
        {
             window.location = "view.php";
        }
        function del()
        {
            window.location="delete.php";
        }
        //function delall()
        //{
          //  window.location="deleteall.php";
        //}
        function updat()
        {
            window.location="update.php";
        }
        //function lis()
        //{
          //  window.location="list.php";
        //}
    

    </script>
<style type="text/css">
    .form {
        margin: 0 auto;
        width: 210px;
    }
    .form label{
        display: inline-block;
        text-align: right;
        float: left;
    }
    .form input{
        display: inline-block;
        text-align: left;
        float: right;
    }
</style>
    <style>
        .well
        {
            background: rgba(0,0,0,0.7);
            border: none;
            padding:50px 50px 50px 50px;
        color: white;
        font-size: 60px;
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
      font-size: 26px;
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
font-size: 48px;
}

    </style>
    
    
</head>

<body>

    <!--<img src="i.jpg" width="200" height="100">-->
<br><br><br>
    <label class="l" ><center>Supply Store Management</center></label>
<center>    <div class="container">
      
      <br><br>

<?php
session_start();
?>

    <div class="well " align="center">
    <form action="" method="POST">
        <!--<label>ENTER NEW DATABASE NAME : </label><input type="text" name="dbname" id="dbname" ><br>
        <br>
    <label>     ENTER COLLECTION NAME:</label><input type="text" name="dbcoll" id="dbcoll" ><br><br>

        <center><button name="submit" value="create" id="submit" style="background-color:grey;" >Create</button></center>   </div>-->
        
        <br>
        <button type="button" name="insert" value="insert" id=insert onclick="ins()">Insert</button>
        <button type="button" name="view" value="update" id=view onclick="updat()">Update</button>
        <button type="button" name="delete" value="delete" id=delete onclick="del()">Delete</button>
        <!--<button type="button" name="deleteall" value="deleteall" id=deleteall onclick="delall()">Delete All</button>-->
        
        <button type="button" name="view" value="view" id=view onclick="vie()">View</button>
        
      <!--  <button type="button" name="list" value="list" id=list onclick="lis()">List</button>-->

    </form>
</center>

<!--<?php
if(isset($_POST['submit']))
{
include "class.php";
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$_SESSION['database']=$_POST['arun'];
$_SESSION['collection']=$_POST['sales'];
$dbcoll=$_POST['dbcoll'];
$db=$_POST['dbname'];
$createCollection = new CreateCollection($dbcoll);


try 
{
    $command = $createCollection->getCommand();
    $cursor = $manager->executeCommand($db, $command);
    echo "database:\t\t\t".$db."\t\t\t\thave been created successfully<br>";
    echo $dbcoll."\t\t\tcollection has been created in database\t\t\t".$dbcoll;
     echo "<br>click here to insert into database\t\t\t\t\t\t\t\t\t\t\t\t<button><a href=insert.php>insert</a></button>";
} 
catch(Exception $e)
{
    echo "error creating database";
    exit;
}
}

?>-->
</div>
</body>
</html>
