<?php 
session_start();
require_once 'src/helper.php';
require_once 'src/product.php';
$database = new Malumot('localhost','root',12345,'coffee_shop');
$pdo = $database -> connect();

User:: $pdo = $pdo;?>
jreijf
rwjwij
eoiwjv
egowij
<?php
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['token'])){
    if($_POST['token']==$_COOKIE[$_SESSION['username']]){
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $creator = $_POST['token'];

    Product:: add_product($name,$price,$creator);
    } else{  
        header("Location: index.php");
        exit(); }
}else{echo "mahsulot qoshilmadi";}


if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['logout'])){

  User::logout();
}


class User{
    public $user_name ;
    public $user_surname ;
    public $user_password ;

    public static $pdo ;
    



public static function add_user($name,$surname,$password){
    $stmt = self::$pdo->prepare(
        "INSERT INTO users (user_name, user_surname,user_password) 
            VALUES (:user_name, :user_surname,:user_password)");
    
    $stmt->execute([
        'user_name' => $name,
        'user_surname' => $surname,
        'user_password' => $password ]);
    $row = $stmt-> rowCount();
    
    return $row;
}

public static function get_single_user($id){
    $stmt = self::$pdo->prepare("SELECT * FROM users WHERE user_id = ?");
        $stmt -> setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmt->execute([$id]);
        $user = $stmt->fetch();
        return $user;
}

public static function delete_single_user($id){
    $stmt = self::$pdo->prepare("DELETE  FROM users WHERE user_id = ?");
    
        $stmt->execute([$id]);
      }
public static function update_user($id,$name,$surname,$password){
    $stmt = self::$pdo->prepare(
        "UPDATE users SET user_name = '$name', user_surname = '$surname', user_password= $password WHERE user_id = $id");
        
    $stmt->execute();
    $row = $stmt-> rowCount();
    
    return $row;
    
    }
public static function get_list_users(){
        $stmt = self::$pdo->prepare("SELECT * FROM users ");
            $stmt -> setFetchMode(PDO::FETCH_CLASS, 'User');
            $stmt->execute();
            $user = $stmt->fetchAll();
            return $user;
}


public static function login($username, $password) {
    $stmt = self::$pdo->prepare(
        "SELECT COUNT(*) AS count FROM users 
        WHERE user_name = :username AND user_password = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);
    $users = $stmt->fetch();

    if ($users['count'] > 0) {
        return true;
    } else {
        return false;
    }
}
public static function logout(){
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit(); 
}

}
Product::add_product('sendwich',31000,'Nurullo');

// $ali = User::login('Yoldosh',45);
// var_dump($ali);


?>






