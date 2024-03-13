
<?php  
require_once 'index.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = User::login($username,$password);
    if($user){
        $token=base64_encode($username);
        setcookie($username , $token);
        $_SESSION["username"] = $username;
        $_SESSION["token"] = $token;
        header("Location: index.php");
        exit(); 
    
    }else{
        $error = "Invalid username or password!";
    }

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> login page</h1>
<?php if(isset($error)) { echo "<p>$error</p>"; } ?>
<form method= "POST" action="" >
  <label for="fname">Username:</label><br>
  <input type="text"  name="username" ><br>
  <label for="lname">Password:</label><br>
  <input type="text"  name="password" ><br><br>
  <input type="submit" value="Submit">
</form> 

    <script>
        
    </script>
</body>
</html>