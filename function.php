<?php

    function errorMassege($mass, $type='danger'){
         return '<p class="alert alert-' . $type .' ">' . $mass . '<button class="close" data-dismiss="alert">&times;</button></p>';
         }
    function connectTbl($db){
        $host       = 'localhost';
        $db_name    = 'root';
        $db_pass    = '';
        return new mysqli($host, $db_name, $db_pass, $db);
        }
    function imgUpload($img_name, $img_path){
        $image_name = $_FILES[$img_name]['name'];
        $image_tmp_name = $_FILES[$img_name]['tmp_name'];
        $unique_img_name = md5(time() . rand()) . $image_name;
        return move_uploaded_file($image_tmp_name, $img_path . $unique_img_name);
        }

    function uniqueName($img_name){
        $image_name = $_FILES[$img_name]['name'];
        return md5(time() . rand()) . $image_name;
        }

    function idSelection($id_name, $tbl_name){
        global $view_id;
        if (isset($_GET[$id_name])){
        $view_id = $_GET[$id_name];
        }
        return connectTbl('student_db')->query("SELECT * FROM  $tbl_name  WHERE id = $view_id")->fetch_assoc();
    }

