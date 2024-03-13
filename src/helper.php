<?php
require_once 'head.php';
// require_once 'footer.php';
require_once 'navbar.php';
require_once 'database.php';
require_once 'product.php';

$connection = new Malumot('localhost','root',12345,'coffee_shop');

$pdo = $connection -> connect();

Product:: $pdo = $pdo;

