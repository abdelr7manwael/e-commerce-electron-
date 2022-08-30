<?php
require_once "../classes/Mysql.php";


class Category extends MySql{
    public function getAll(){
        $query = "SELECT * FROM Categories";
        $result = parent::connect()->query($query);
        $categories = [];

        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                array_push($categories,$row);
            }
        }
        return $categories;
    }
}
?>