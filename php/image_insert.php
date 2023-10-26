<?php
    include("../config/config.php");
    header("Access-Control-Allow-Methods: POST");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_FILES['fname']['name'];
        $path = $_FILES['fname']['tmp_name'];
        $destintion = "../uploads/" .$name;
        $isUploaded = move_uploaded_file($path,$destintion);

        if($isUploaded){
            $res = $config->image_insert($name,$path);

            if($res){
                $arr['data'] = "Cloth image insert successfully...";
            }else{
                $arr['data'] = "Cloth image insertion failed....";
            }
        }else{
            $arr['error'] = "Uploadation Failed...";
        }
    }else{
        $arr['error'] = "Only POST HTTP Methods are Allowed...";
    }

    echo json_encode($arr);
?>