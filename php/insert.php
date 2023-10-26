<?php 
    header("Access-Control-Allow-Methods: POST");

    include("../config/config.php");
    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $qyt = $_POST['qyt'];
       
        $res = $config->insert($name,$price,$qyt);

        if($res){
            $arr['data'] = "Record Inserted Success.....";
        }else{
            $arr['data'] = "Record Insertion Failed....";
        }
    }else{
        $arr['error'] = "Only POST HTTP Methods are Allowed....";
    }
    //http://127.0.0.1/php_exam.php/php/insert.php
    //http://127.0.0.1/php_exam.php/php/image_insert.php

    echo json_encode($arr);
?>
