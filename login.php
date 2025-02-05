<?php
include('./config/constant.php');
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query="SELECT * FROM users WHERE email='$email' AND password='$password'";
   

    $result = mysqli_query($conn, $query);

    $rows = mysqli_num_rows($result);
    if ($rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $role = $row['role'];
            if($role=='admin'){
                header("Location:".HOMEURL."admin/index.php");
            }
            else if($role=='provider'){
                header("Location:".HOMEURL."provider/index.php");
            }
            else{
                header("Location:".HOMEURL."seeker/index.php");
            }
            echo $role . "<br>";
        }
    } else {
        echo "No rows found.";
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>

@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Libre+Baskerville:wght@400;700&display=swap');
    *{
        margin: 0;
        padding: 0;
        font-family: "inter"; 
       }
    .container {
        background-color: #fff;
        border-radius: 100px 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        margin: 0 auto;
        padding: 40px;
        margin-top: 50px;
        border: 2px solid #3795b3;
    }
@media (max-width: 600px) {
    .container .logo {
        width: 80%;
    }
}
    .logo {
        text-align: center;
        margin-bottom: 40px;
        background-color: transparent;
    }

    .logo img {
        width: 150px;
        height: auto;
    }

    .login_form h3 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #3795b3;
        text-align: center;
    }

    .login_form input[type="email"],
    .login_form input[type="password"] {
        border-bottom: 1px solid;
        border-top: none;
        border-left: none;
        border-right: none;
        border-radius: 4px;
        padding: 5px;
        width: 85%;
        margin-bottom: 20px;
        transition: background-color 0.3s ease;
    }

    .login_form input[type="submit"] {
        background-color: #279574;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
        width: 85%;
    }

    .login_form p {
        text-align: center;
        margin-top: 20px;
        color: #777;
        font-size: 12px;
    }


    </style>
</head>
<body>
<section class="log_in">
    <div class="container">
        <div class="logo">
            <img src="./Asset/logo.png" alt="">
        </div>
        <div class="login_form">
            <form action="login.php" method="post" onsubmit="return validateForm()">
                <h3>Log in</h3> <br>
                <p id="error"></p>
                <input type="email" id="email" name="email" placeholder="Email Address"  required> <br>
                <input type="password" id="password" name="password" placeholder="Password" required > <br>
                <input type="submit" value="Login">
                <p>Don't have an account? Sign up</p>
            </form>
        </div>
    </div>
   
</section>
<script>

function updateError(inputId, isValid,  Message ){
  var errorElement=document.getElementById("error");
  if(errorElement.textContent=isValid){
    document.getElementById(inputId).style.borderColor="green";
    errorElement.textContent="✅";
  }else{
    document.getElementById(inputId).style.borderColor="red";
    errorElement.textContent=Message;
  }

}
function addInputListener(inputId, regex, errorMessage){
    document.getElementById(inputId).addEventListener("input", function(){
        var value = this.value;
        var isValid = regex.test(value);
        updateError(inputId, isValid, errorMessage);
    });
}
addInputListener("email", /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/, "🚫invalid Email");
addInputListener("password", /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/, "🚫at least(6 characters, 1 uppercase, 1 lowercase, 1 number)");
document.getElementById("submit").addEventListener("click", function () {
    var isValid =
      document.getElementById("email").style.borderColor === "green" &&
      document.getElementById("password").style.borderColor === "green" 
    if (!isValid) {
      alert("Please fill the form correctly");
    }
  });
</script>
</body>
</html>

