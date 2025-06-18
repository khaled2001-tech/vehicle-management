<?php

session_start(); 
include('general.php');




$sql="SELECT * FROM `vehicles`";
    
$result = mysqli_query($con ,$sql);
$vehicle=mysqli_fetch_all($result,MYSQLI_ASSOC);

$usr_id=$_SESSION['user_id'];

$sql2="SELECT * FROM `user` WHERE id = $usr_id";
$result2 = mysqli_query($con ,$sql2);
$use=mysqli_fetch_all($result2,MYSQLI_ASSOC);





if(isset($_GET["nuw_first_name"])){
     if(!empty($_GET["nuw_first_name"])){
       $sql3="UPDATE `user` SET `first_name`=\"".$_GET["nuw_first_name"] ."\" WHERE `id`=".$usr_id ;
       mysqli_query($con ,$sql3);  
       $showMessage = true;
       $_SESSION['user_name'] =$_GET["nuw_first_name"];
     }

}

if(isset($_GET["nuw_Last_name"])){
    if(!empty($_GET["nuw_Last_name"])){
       $sql4="UPDATE `user` SET `next_name`=\"".$_GET["nuw_Last_name"] ."\" WHERE `id`=".$usr_id ;
       mysqli_query($con ,$sql4); 
       $showMessage = true; 
      
    }
     header("Refresh:1; url=" . strtok($_SERVER["REQUEST_URI"], '?'));
}
if(isset($_GET["nuw_Birth"])){
    if(!empty($_GET["nuw_Birth"])){
       $sql5="UPDATE `user` SET `birth`=".$_GET["nuw_Birth"] ." WHERE `id`=".$usr_id ;
       mysqli_query($con ,$sql5);  
       $showMessage = true;
      
    }
     header("Refresh:1; url=" . strtok($_SERVER["REQUEST_URI"], '?'));
}
if(isset($_GET["nuw_phone_number"])){
    if(!empty($_GET["nuw_phone_number"])){
       $sql6="UPDATE `user` SET `phone_number`=".$_GET["nuw_phone_number"] ." WHERE `id`=".$usr_id ;
       mysqli_query($con ,$sql6); 
       $showMessage = true;
      
    }
     header("Refresh:1; url=" . strtok($_SERVER["REQUEST_URI"], '?'));
       
}


if(isset($_GET["buying"])){
 $sql7="UPDATE `user` SET `purchased_vehicles`=".$_GET["buying"] ." WHERE `id`=".$usr_id ;
       mysqli_query($con ,$sql7); 
       
       $showMessage = true;
        header("Refresh:1; url=" . strtok($_SERVER["REQUEST_URI"], '?'));
       
}

if(isset($_GET["Rent"])){
     $sql8="UPDATE `user` SET `rented_vehicles`=".$_GET["Rent"] ." WHERE `id`=".$usr_id ;
       mysqli_query($con ,$sql8);
       
       $showMessage = true;
      header("Refresh:1; url=" . strtok($_SERVER["REQUEST_URI"], '?'));
}



if(isset($_GET["logout"])){

     session_unset();
    session_destroy(); 
    header("Location: user_login.php");
    exit; 
   
   
       
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   <!-- -------------------------------------------------- -->
   <style>
    body{

        background-color:rgba(101, 163, 233, 0.41);
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
       

    }
    .d1{
        
        width: 1149px;
        margin: auto;
    }
    .d2{
        background-color:#FFFFFF ;
        width: 350px;
        text-align: center;
        height: 590px;
        display: inline-block;
        margin: 15px;
        
       
    }
    .d2 h2{
        color: white;
        background-color:rgb(68, 124, 188);
        padding: 23px;
        margin-top: -5px;
        transition: background-color 1s ease;
        
    }
    .d2 img{
        width: 100%;
        margin-top: -21px;
    }
    .d2 button{
        color: white;
        background-color: #F70803;
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
        color: white;
        
    }
    .d2:hover h2{
        background-color:rgb(9, 0, 74);
        
    }


    input:focus {
  outline: none; 
  border: 1px solid #86b7fe;
  box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

#successMessage {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 9999;
      background-color:rgba(20, 83, 45, 0.91); 
      color: #ffffff;
      padding: 15px 25px;
      border-radius: 6px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      font-weight: bold;
      opacity: 1;
      transition: opacity 1s ease-out;
       width:404px
       
    }

   </style>
   <!-- -------------------------------------------------- -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>









<div class="offcanvas offcanvas-start" id="demo">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title">Settings</h1>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
 <h3>Modify student data</h3>


<form action="view_Vehicles.php">
<div class="container mt-3">
  <p>Add multiple inputs or addons:</p>
  <div class="input-group mb-3">
    <input type="text" name="nuw_first_name" class=" form-control-lg"  placeholder="first name:<?php echo $use[0]['first_name'] ?> ">
    <input type="text" name="nuw_Last_name"   class="form-control-lg " placeholder="Last name:<?php echo $use[0]['next_name'] ?> ">
    <input type="text" name="nuw_Birth"   class="form-control-lg"  placeholder="Birth:<?php echo $use[0]['birth'] ?> ">
    <input type="text" name="nuw_phone_number"   class="form-control-lg" placeholder="phone number:<?php echo $use[0]['phone_number'] ?> ">
  
  </div>
  <input class="btn btn-primary" type="submit" value="changing"  >
  
  </form>



  </div>



<a style="margin :20px ;margin-top: 260px;width:304px;" class="btn btn-secondary" href="view_Vehicles.php?logout=t" >Link</a>
 
</div>


<?php if (isset($showMessage) && $showMessage): ?>
 
  <div id="successMessage">
    ✔ The operation was completed successfully
  </div>

  <script>
    setTimeout(function() {
      const msg = document.getElementById('successMessage');
      if (msg) {
        msg.style.opacity = '0'; 
        setTimeout(() => {
          msg.style.display = 'none'; 
        }, 1000); 
      }
    }, 900);
  </script>
<?php endif; 

?>




<div class="pos-f-t" style="position: sticky;
top: 0;">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h4 class="text-white">Collapsed content</h4>
      <span class="text-muted">Toggleable via the navbar brand.</span>
    </div>
  </div>

  <nav class="navbar navbar-light" style="background-color:rgb(77, 159, 218);" >

<div >
  <button class="navbar-toggler"  type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
   <span class="navbar-toggler-icon"></span>
  </button>
</div>   
<h1 style=" margin-right: 30px; color: white;font-weight: bold;font-size: 34px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4); ">Welcome <?php echo $_SESSION['user_name'] ?></h1>
  </nav>
</div>

    <div class="d11">
        <h1 style="bold;font-size: 44px;">Vehicle management project</h1>
        
    </div>
    <br>

    <div class="d1">


    <?php foreach($vehicle as $ve){?>
        <div class="d2">
            <h2>OUTLANDER</h2>
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
            
           <td><a href="view_Vehicles.php?buying=<?php echo $ve["id"] ?>" class="btn btn-primary">Buying</a></td>
            <td><a href="view_Vehicles.php?Rent=<?php echo $ve["id"] ?>" class="btn btn-primary">Rent</a></td>
           
        </div>
    <?php }?>
    
    </div>
    
</body>
</html>