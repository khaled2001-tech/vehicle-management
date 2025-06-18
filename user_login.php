<?php 
session_start(); 
include('general.php');
$v=FALSE;
if(isset($_GET['login'])){
        $email = $_GET['email'];
        $password = $_GET['password'];
    
        
        $sql = "SELECT *
                FROM user
                WHERE email = '$email' AND password = '$password'";
      
        $result = mysqli_query($con ,$sql);
      
        if(mysqli_num_rows($result) == 1 ){
            $arr = mysqli_fetch_all($result , MYSQLI_ASSOC);
            $_SESSION['user_name'] =  $arr[0]['first_name'];    
            $_SESSION['user_id'] =  $arr[0]['id'];         
            header('location:view_Vehicles.php');
        }else{
          $v=True;
        }
      }


      if(isset($_GET["send"])){

         $fn= $_GET["fn"];
        
         $ln= $_GET["ln"];
        
         $p= $_GET["p"];
        
         $gender= $_GET["gender"];
        
         $pn= $_GET["pn"];
         $e= $_GET["e"];
         $b= $_GET["b"];
        
     $sql12=" INSERT INTO `user`(`first_name`, `next_name`, `password`, `email`, `gender`, `phone_number`, `birth`) 
                         VALUES ('".$_GET["fn"]."','".$_GET["ln"]."','".$_GET["p"]."','".$_GET["e"]."','".$_GET["gender"]."','".$_GET["pn"]."','".$_GET["b"]."')" ;
       mysqli_query($con ,$sql12); 
       $showMessage = true;
       
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

</head>
<style>

    .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}

.blurred {
  filter: blur(5px);
  pointer-events: none;
}

.form-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
  display: none;
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
  max-width: 400px;
}

#successMessage {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 9999;
      background-color:rgba(20, 83, 45, 0.89); 
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

<script>
function showForm() {
  document.getElementById('formOverlay').style.display = 'flex';
  document.getElementById('mainContent').classList.add('blurred');
}

function hideForm() {
  document.getElementById('formOverlay').style.display = 'none';
  document.getElementById('mainContent').classList.remove('blurred');
}

</script>



</head>






<body>
    



<section class="vh-100">
  <div  class="container-fluid h-custom">
    <div  class="row d-flex justify-content-center align-items-center h-100">
      <div  class="col-md-9 col-lg-6 col-xl-5">
        <img src="user_img/log.png"
          class="img-fluid" alt="Sample image">
      </div >
      <div style="background: linear-gradient(to right,rgba(0, 123, 255, 0.14),rgba(110, 66, 193, 0.1)); padding: 100px;border: 1px solid #ccc;border-radius: 18px; " class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form  action="" >

          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in </p>
          </div>

<br><br>

        
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          
          <div data-mdb-input-init class="form-outline mb-3">
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>
<?php
if($v){
  echo "<p style=\"font-size: 20px\"  class=\"text-danger \">
          Your account was not found.
         </p>";
}
  ?>
         

          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="submit"  class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Login" name="login"> 


            
          </div>

        </form>
        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                class="link-danger" onclick="showForm()">Register</a></p>
      </div>
    </div>
  </div>
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
    }, 3000);
  </script>
<?php endif; ?>


<div id="formOverlay" class="form-overlay">
  <div class="form-box">
    <h5> Enter your information to create your account</h5>
<form action="" >
    <input type="text" class="form-control mb-2" name="fn"   placeholder="first name" required>
    <input type="text" class="form-control mb-2" name="ln"  placeholder="Last name " required>
    <input type="password" class="form-control mb-2"   placeholder="password" required>
    <input type="password" class="form-control mb-2" name="p"  placeholder="Confirm password" required>
    <input type="email" class="form-control mb-2" name="e"  placeholder="Email" required>
    <input type="text" class="form-control mb-2" name="pn"   placeholder="Phone number" required>
    <input type="text" class="form-control mb-2" name="b"   placeholder="Birth" required>
    <p>Gender:</p>
    <label>
  <input type="radio" name="gender" value="male" checked>
  male
</label>

<label>
  <input type="radio" name="gender" value="female">
  gender
</label>
  <br><br>
    <button name="send" class="btn btn-primary mt-2">send</button>
    <a href="#" onclick="hideForm()" class="btn btn-secondary mt-2">closing</a>
    </form>
  </div>
</div>

<div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    
    <div class="text-white mb-3 mb-md-0">
      Vehicle management project@2025
    </div>
   
</section>



















</body>