<?php

class Product{

public static $pdo;

public $order_id ;
public $product_id ;
public $afitsant_id ;

public static function get_all_products(){

    
}

public static function book_single($pr_id){

    $stmt = self::$pdo->prepare("INSERT INTO sold_products (product_id) VALUES ($pr_id)");
    
    $stmt->execute();
    $row = $stmt-> rowCount();
    
    return $row;

}
public static function add_product($product_name,$product_price,$created_by){
    $stmt = self::$pdo->prepare(
        "INSERT INTO products (product_name, product_cost,created_by) 
            VALUES (:product_name, :product_cost,:created_by)");
    
    $stmt->execute([
        'product_name' => $product_name,
        'product_cost' => $product_price,
        'created_by' => $created_by ]);
    $row = $stmt-> rowCount();
    
    return $row;
}

}


