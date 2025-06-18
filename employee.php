<?php 
 
include('general.php');


      


        $sql="SELECT * FROM `vehicles`";
            
        $result1 = mysqli_query($con ,$sql);
        $vehicle=mysqli_fetch_all($result1,MYSQLI_ASSOC);




       

        if(isset($_GET["delete"])){
          
        $sql="DELETE FROM `vehicles` WHERE id =".$_GET["Id"];     
        mysqli_query($con ,$sql);
        header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
        exit();      
}
if(isset($_GET["add"])){
          
        $sql12=" INSERT INTO `vehicles`(`path_img`, `Description`, `price_buying`, `price_Rent`, `Type`) 
                         VALUES ('".$_GET["add_path"]."','".$_GET["add_description"]."','".$_GET["add_purchase"]."','".$_GET["add_rental"]."','".$_GET["add_name"]."')" ;
       mysqli_query($con ,$sql12); 
       header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
      exit;     
}






if(isset($_GET["fpathn"])){
      if(!empty($_GET["fpathn"])){
        $sql4="UPDATE `vehicles` SET `path_img`=\"".$_GET["fpathn"] ."\" WHERE `id`=".$_GET["Id"] ;
        mysqli_query($con ,$sql4); 
      }
        
}
if(isset($_GET["name"])){
    if(!empty($_GET["name"])){
       $sql5="UPDATE `vehicles` SET `Type`=\"".$_GET["name"] ."\" WHERE `id`=".$_GET["Id"] ;
       mysqli_query($con ,$sql5);  
    }
       
}
if(isset($_GET["description"])){
    if(!empty($_GET["description"])){
       $sql6="UPDATE `vehicles` SET `Description`=\"".$_GET["description"] ."\" WHERE `id`=".$_GET["Id"];
       mysqli_query($con ,$sql6);
    } 
       
       
}


if(isset($_GET["purchase"])){
    if(!empty($_GET["purchase"])){
 $sql7="UPDATE `vehicles` SET `price_buying`=".$_GET["purchase"] ." WHERE `id`=".$_GET["Id"] ;
       mysqli_query($con ,$sql7);
    } 
       
       
}

if(isset($_GET["rental"])){
    if(!empty($_GET["rental"])){
     $sql8="UPDATE `vehicles` SET `price_Rent`=".$_GET["rental"] ." WHERE `id`=".$_GET["Id"] ;
       mysqli_query($con ,$sql8); 
    }
       
       
}




?>





    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>saad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<style>


.form-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0);
  margin-left: 370px;
  margin-top:40px;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

.form-box {
  background: #fff;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 0 20px rgba(0,0,0,0.4);
  width: 100%;
  max-width: 700px;
}

    .d1{
        
        width: 1149px;
        margin: auto;
    }
    .d2{
  
        width: 350px;
        text-align: center;
        height: 590px;
        display: inline-block;
        margin: 15px;
        border: 2px solid #333;           
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);                         
        border-radius: 8px;  
       
    }
    .d2 h2{
        padding: 23px;
        margin-top: -5px;
        transition: background-color 1s ease;
        
    }
    .d2 img{
        width: 100%;
        margin-top: -21px;
    }
    .d2 button{
      
        border: 0px;
        border-radius: 5px;
        padding: 10px 20px;
        
    }
    div {
        overflow: hidden;

        word-wrap: break-word;
        
    }

    .d0{
        text-align: left;
        margin: 10px auto;
        width: 180px;
    }

    .d11{
        text-align: center;
       
        
    }



</style>




</head>

<body>

<?php
if(isset($_GET["addition"])){
    
    
?>

<form action="employee.php">
<div class="container mt-3">
  <p>Add multiple inputs or addons:</p>
  <div class="input-group mb-3">
    <span class="input-group-text">Enter the values</span>
    <input type="text" class="form-control mb-2" name="add_path"   placeholder="Image path within the file" required>
    <input type="text" class="form-control mb-2" name="add_name"  placeholder=" Type and name of the vehicle" required>
    <input type="text" class="form-control mb-2" name="add_description"  placeholder="Vehicle description" required>
    <input type="text" class="form-control mb-2" name="add_purchase"  placeholder="Vehicle purchase price" required>
    <input type="text" class="form-control mb-2" name="add_rental"  placeholder="Daily vehicle rental price" required>
   
  </div>
  <input name="add" class="btn btn-primary" type="submit" value="Send"  >

  </form>
<?php             
    
}
?>
<br>

<a style="margin:20px" href="employee.php?addition=edd" class="btn btn-primary">Add a new vehicle</a>
<br><br>
<hr>



    <?php foreach($vehicle as $ve){?>
        <div class="d2">
            
            <img src="Vehicles_img/<?php echo $ve["path_img"] ?>" alt="">
            <div class="d3">
                <br>
            <h4><?php echo $ve["Type"] ?></h4>
            <p><?php echo $ve["Description"] ?></p>
        </div>
            
            
            <div class="d0">
                <p><i class="fa fa-bookmark" style="font-size:14px;padding-right: 15px; color:#C0322B"></i>Purchase price: $<?php echo $ve["price_buying"] ?></p>
            <p><i class="fa fa-bookmark" style="font-size:14px;padding-right: 15px; color:#C0322B"></i>Daily rental price: $<?php echo $ve["price_Rent"] ?></p>
            </div>
            
           
            <td></td>
          
           <a href="employee.php?showForm=<?php echo $ve['id']; ?>" class="btn btn-primary">amendment</a>
        </div>
    <?php }?>

<!-- <a href="#" onclick="hideForm()" class="btn btn-secondary mt-2">Closing</a>
    <form action=""> <input name="Id" class="btn btn-primary" onclick="showForm(); return false;" type="submit" value="<?php echo $ve["id"] ?>"  ></form>
   
    -->
</div>

<?php
if(isset($_GET["showForm"])){
    
    
?>

<div class="form-overlay">
  <div class="form-box">
    <form action="" >
<h5>Do you want to delete the vehicle?</h5>
<input type="hidden" name="Id" value="<?php echo $_GET["showForm"]; ?>"> 
  <button name="delete" style="background-color:rgb(136, 46, 55); color: white;" class="btn btn mt-2">Delete</button>
    
  <hr>
</form>
<form action="" >
    <h5> Enter the new modificationt</h5>
    <input type="text" class="form-control mb-2" name="fpathn"   placeholder="Image path within the file" >
    <input type="text" class="form-control mb-2" name="name"  placeholder=" Type and name of the vehicle" >
    <input type="text" class="form-control mb-2" name="description"  placeholder="Vehicle description" >
    <input type="text" class="form-control mb-2" name="purchase"  placeholder="Vehicle purchase price" >
    <input type="text" class="form-control mb-2" name="rental"  placeholder="Daily vehicle rental price" >
   <input type="hidden" name="Id" value="<?php echo $_GET["showForm"]; ?>"> 
  <br><br>
  <hr>
    <button  class="btn btn-primary mt-2">Send</button>
    <a href="employee.php"  class="btn btn-secondary mt-2">Closing</a>
    </form>
  </div>
</div>

</body>



<?php             
    
}
?>



<form action="employee.php" method="GET">
  <input type="hidden" name="Id" value="123"> <!-- الرقم المراد إرساله -->
  <input type="submit" name="delete" value="Delete Vehicle">
</form>