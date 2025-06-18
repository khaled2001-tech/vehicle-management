<?php
include('general.php');

$sql="SELECT * FROM `employee`";
    
$result = mysqli_query($con ,$sql);
$employees=mysqli_fetch_all($result,MYSQLI_ASSOC);


  if(isset($_GET["Delete"])){
          
        $sql2="DELETE FROM `employee` WHERE id =".$_GET["Delete"];     
        mysqli_query($con ,$sql2);
        header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
        exit();      
}


if(isset($_GET["add"])){
          
        $sql12=" INSERT INTO `employee`(`first_name`, `last_name`, `phone_number`, `emal`, `salary`, `birth`, `nationality`, `holidays`, `gender`) 
                         VALUES ('".$_GET["add_fn"]."','".$_GET["add_ls"]."','".$_GET["add_ph"]."','".$_GET["add_em"]."','".$_GET["add_sl"]."','".$_GET["add_bi"]."','".$_GET["add_na"]."','".$_GET["add_ho"]."','".$_GET["add_g"]."')" ;
       mysqli_query($con ,$sql12); 
       header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
      exit;     
}



if(isset($_GET["fn"])){
      if(!empty($_GET["fn"])){
        $sql4="UPDATE `employee` SET `first_name`=\"".$_GET["fn"] ."\" WHERE `id`=".$_GET["Id"] ;
        mysqli_query($con ,$sql4); 
      }
        
}

if(isset($_GET["ls"])){
      if(!empty($_GET["ls"])){
        $sql4="UPDATE `employee` SET `last_name`=\"".$_GET["ls"] ."\" WHERE `id`=".$_GET["Id"] ;
        mysqli_query($con ,$sql4); 
      }
        
}

if(isset($_GET["ph"])){
      if(!empty($_GET["ph"])){
        $sql4="UPDATE `employee` SET `phone_number`=\"".$_GET["ph"] ."\" WHERE `id`=".$_GET["Id"] ;
        mysqli_query($con ,$sql4); 
      }
        
}

if(isset($_GET["em"])){
      if(!empty($_GET["em"])){
        $sql4="UPDATE `employee` SET `emal`=\"".$_GET["em"] ."\" WHERE `id`=".$_GET["Id"] ;
        mysqli_query($con ,$sql4); 
      }
        
}

if(isset($_GET["sl"])){
      if(!empty($_GET["sl"])){
        $sql4="UPDATE `employee` SET `salary`=\"".$_GET["sl"] ."\" WHERE `id`=".$_GET["Id"] ;
        mysqli_query($con ,$sql4); 
      }
        
}

if(isset($_GET["bi"])){
      if(!empty($_GET["bi"])){
        $sql4="UPDATE `employee` SET `birth`=\"".$_GET["bi"] ."\" WHERE `id`=".$_GET["Id"] ;
        mysqli_query($con ,$sql4); 
      }
        
}

if(isset($_GET["na"])){
      if(!empty($_GET["na"])){
        $sql4="UPDATE `employee` SET `nationality`=\"".$_GET["na"] ."\" WHERE `id`=".$_GET["Id"] ;
        mysqli_query($con ,$sql4); 
      }
        
}

if(isset($_GET["ho"])){
      if(!empty($_GET["ho"])){
        $sql4="UPDATE `employee` SET `holidays`=\"".$_GET["ho"] ."\" WHERE `id`=".$_GET["Id"] ;
        mysqli_query($con ,$sql4); 
      }
        
}

if(isset($_GET["g"])){
      if(!empty($_GET["g"])){
        $sql4="UPDATE `employee` SET `gender`=\"".$_GET["g"] ."\" WHERE `id`=".$_GET["Id"] ;
        mysqli_query($con ,$sql4); 
      }
        
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
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.52);
  width: 100%;
  max-width: 700px;
}

</style>



</head>
<body>
  
<?php
if(isset($_GET["addition"])){
    
    
?>

<form action="Admin.php">
<div class="container mt-3">
  <p>Add new employee data:</p>
  <div class="input-group mb-3">
    <span class="input-group-text">Enter the values</span>
    <input type="text" class="form-control mb-2" name="add_fn"   placeholder="first name" required>
    <input type="text" class="form-control mb-2" name="add_ls"  placeholder="last name" required>
    <input type="text" class="form-control mb-2" name="add_ph"  placeholder="phone number" required>
    <input type="Email" class="form-control mb-2" name="add_em"  placeholder="Email" required>
    <input type="text" class="form-control mb-2" name="add_sl"  placeholder="Year of birth" required>
    <input type="text" class="form-control mb-2" name="add_bi"  placeholder="nationality" required>
    <input type="text" class="form-control mb-2" name="add_na"  placeholder="Holidays" required>
    <input type="text" class="form-control mb-2" name="add_ho"  placeholder="Monthly salary" required>
    <input type="text" class="form-control mb-2" name="add_g"  placeholder="gender" required>
   
   

  </div>
  <input name="add" class="btn btn-outline-primary" type="submit" value="Send"  >

  </form>
  <a href="Admin.php" class="btn btn-outline-secondary">cancellation</a>
<?php             
    
}
?>

<a style="margin:20px" href="Admin.php?addition=edd" class="btn btn-outline-primary">Add a new vehicle</a>
<br><br>
<hr>

<form action="n1.php">
<table  class="table table-striped">
       <tr>
        <th>first name</th>
        <th>last name</th>
        <th>gender</th>
        <th>nationality</th>
        <th>Year of birth</th>
        <th>salary</th>
        <th>holidays</th>
        <th>emal</th>
        <th>phone number</th>
        <th colspan="2">Edit</th>

      </tr> 
      <?php foreach($employees as $em){?>
        <tr>
            <td><?php echo $em['first_name']; ?></td>
            <td><?php echo $em['last_name']; ?></td>
            <td><?php echo $em['gender']; ?></td>
            <td><?php echo $em['nationality']; ?></td>
            <td><?php echo $em['birth']; ?></td>
            <td><?php echo $em['salary']; ?></td>
            <td><?php echo $em['holidays']; ?></td>
            <td><?php echo $em['emal']; ?></td>
            <td><?php echo $em['phone_number']; ?></td>
            <td><a href="Admin.php?Delete=<?php echo $em['id'];?>" class="btn btn-outline-secondary">Delete</a></td>
            <td><a href="Admin.php?edit=<?php echo $em['id']; ?>" class="btn btn-outline-primary">Edit</a></td>
        

         </tr>   
        <?php }?>
<br>
    </table>


    </form>



<?php
    if(isset($_GET["edit"])){
?>

<div class="form-overlay">
  <div class="form-box">
    
<form action="" >
    <h5> Edit employee data</h5>
    <input type="text" class="form-control mb-2" name="fn"   placeholder="Enter the name of the first employee  : <?php echo  $employees[$_GET["edit"]-1]['first_name'];  ?>" >
    <input type="text" class="form-control mb-2" name="ls"  placeholder="Enter the employee's last name  : <?php echo $employees[$_GET["edit"]-1]['last_name'];  ?>" >
    <input type="text" class="form-control mb-2" name="ph"  placeholder="phone number  : <?php echo $employees[$_GET["edit"]-1]['phone_number'];  ?>" >
    <input type="Email" class="form-control mb-2" name="em"  placeholder="Email  : <?php echo $employees[$_GET["edit"]-1]['emal'];  ?>" >
    <input type="text" class="form-control mb-2" name="sl"  placeholder="Monthly salary  : <?php echo $employees[$_GET["edit"]-1]['salary'];  ?>" >
    <input type="text" class="form-control mb-2" name="bi"  placeholder="Year of birth  : <?php echo $employees[$_GET["edit"]-1]['birth'];  ?>" >
    <input type="text" class="form-control mb-2" name="na"  placeholder="nationality  : <?php echo $employees[$_GET["edit"]-1]['nationality'];  ?>" >
    <input type="text" class="form-control mb-2" name="ho"  placeholder="Number of vacation days due  : <?php echo $employees[$_GET["edit"]-1]['holidays'];  ?>" >
    <input type="text" class="form-control mb-2" name="g"  placeholder="gender  : <?php echo $employees[$_GET["edit"]-1]['gender'];  ?>" >
    <input type="hidden" name="Id" value="<?php echo $_GET["edit"]; ?>"> 
    <hr>
    <button  class="btn btn-primary mt-2">Send</button>
    <a href="Admin.php"  class="btn btn-secondary mt-2">Closing</a>
    </form>
  </div>
</div>















<?php             
    
}
?>


</body>
</html>