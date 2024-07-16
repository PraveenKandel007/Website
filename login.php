

<html>
    <head>
        <title>Pixels Adminpannel</title>
        <!-- <link rel="stylesheet" href="style.css"> -->
        
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'poppins',sans-serif;
}


.loginbody {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background-image: url("https://images.pexels.com/photos/1616516/pexels-photo-1616516.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  
}

.login {
    position: relative;
    max-width: 400px;
    background-color:#6c757d ;
    border: 2px solid #adb5bd;
    border-radius: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2rem 3rem;
    
   
}

h1 {
    font-size: 2rem;
    color: #fff;
    text-align: center;
}

.inputbox {
    position: relative;
    margin: 30px 0;
    max-width: 310px;
    border-bottom: 2px solid #fff;
}

.inputbox label {
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    color: #fff;
    font-size: 1rem;
    pointer-events: none;
    transition: all 0.5s ease-in-out;
}

input:focus ~ label, 
input:valid ~ label {
    top: -5px;
}

.inputbox input {
    width: 100%;
    height: 60px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1rem;
    padding: 0 35px 0 5px;
    color: #fff;
}



.forget {
    margin: 35px 0;
    font-size: 0.85rem;
    color: #fff;
    display: flex;
    justify-content: space-between;
 
}

.forget label {
    display: flex;
    align-items: center;
}

.forget label input {
    margin-right: 3px;
}

.forget a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
}

.forget a:hover {
    text-decoration: underline;
}

a{
    text-decoration: none;
    color: Black;
}

#submit {
    
    width: 100%;
    height: 40px;
    border-radius: 40px;
    background-color: rgb(255, 255,255, 1);
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: all 0.4s ease;
}

button:hover {
  background-color: rgb(255, 255,255, 0.5);
}
</style>
    </head>



<body class="loginbody">
  <section class="login">
    <form  method="POST">
      <h1> Admin Panel Login</h1>
      <div class="inputbox">
       
        <input type="text" name="username"required />
        <label for="">Username</label>
      </div>
      <div class="inputbox">
     
        <input type="password" name="password"required />
        <label for="">Password</label>
      </div>
      
      <input type="submit" name="save" id="submit" value="Login"/>
     
    </form>
  </section>
</body>

</html>
<?php
include 'connect.php';
if(!empty($_POST['save'])){
    $username=$_POST['username'];
    $password=$_POST['password'];


    $query="select * from login_details where username='$username' and passwords='$password'";
    $result =mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    if($count>0){
      header('location:admin.php');
    }else{
      echo"<script>alert('Wrong credentials');</script>";
    }

    
}

?>