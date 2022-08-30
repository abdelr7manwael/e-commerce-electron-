<?php
require_once "../classes/Mysql.php";
class Product extends Mysql{

    //get all;
    public function getAll(){
        
        $query = "SELECT * FROM products";
        $result = parent::connect()->query($query);
        $products = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                array_push($products,$row);
            }
        }
        return $products;

    }
    //get once;

    public function getOne($id){
        $query = "SELECT * FROM products WHERE id = '$id'";
        $result = parent::connect()->query($query);
        $product = null;
        if($result->num_rows == 1){
            $product = $result->fetch_assoc();
        }
        return $product;
    }
    //create
    public function store(array $data){

        $data['name'] = mysqli_real_escape_string(parent::connect(), $data['name']);
        $data['desc'] = mysqli_real_escape_string(parent::connect(), $data['desc']);

        $query = "INSERT INTO `products`(`name`, `desc`, `price`, `picture`, `category_id`, `created_at`) VALUES 
        ('{$data['name']}', '{$data['desc']}', '{$data['price']}', '{$data['picture']}','{$data['category_id']}',
        CURRENT_TIME() )";

        $result = parent::connect()->query($query);
        
        if($result == true){

            return true;
        }
        return "false";   
    }
    //update
    public function update(array $data, $id){


        $data['name'] = mysqli_real_escape_string(parent::connect(), $data['name']);
        $data['desc'] = mysqli_real_escape_string(parent::connect(), $data['desc']);
        $query = "UPDATE `products` SET 
        `name`= '{$data['name']}',
        `desc`= '{$data['desc']}',
        `price`= '{$data['price']}',
        -- `picture`= '{$data['picture']}',
        `category_id`= '{$data['category_id']}' WHERE `id` = '$id'";

        $result = parent::connect()->query($query);
        if($result == true){

            return true;
        }
        return "false";
    }


    //delete
    public function delete($id){
        $query = "DELETE FROM products WHERE `id` = '$id'";

        $result = parent::connect()->query($query);
        if($result == true){

            return true;
        }
        return "false";

    }

}
?>