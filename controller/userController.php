<?php
session_start();
require "../config/conexion.php";
require "../model/userModel.php";

$users = new Users();

$id = '';
$user = '';
$password = '';
$name = '';
$last_name = '';
$rol = '';
$permissions = '';
$option = '';

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['user'])){
    $user = $_POST['user'];
}

if(isset($_POST['password'])){
    $password = $_POST['password'];
}

if(isset($_POST['name'])){
    $name = $_POST['name'];
}

if(isset($_POST['last_name'])){
    $last_name = $_POST['last_name'];
}

if(isset($_POST['rol'])){
    $rol = $_POST['rol'];
}

if(isset($_POST['permissions'])){
    $permissions = $_POST['permissions'];
}

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

switch($option){
    case 'insert':
        $insert = $users->insert_user($user,$password,$name,$last_name,$rol,$permissions);
        
    break;
    case 'update':
        $update = $users->update_user($id,$user,$password,$name,$last_name,$rol,$permissions);
    break;
    case 'delete':
        $delete = $users->delete_user($id);
    break;
    case "permissions":
        
        $list_permissions = $users->permissions();
        
        $html = '';

        foreach($list_permissions as $row){
            $html = $html . '<div class="form-check-inline mr-4 mb-2"><input type="checkbox" class="form-check-input" value="'. $row['id'] .'" name="permissions[]" id="'. $row['name'] .'"><label class="form-check-label ml-0" for="'. $row['name'] .'">' . $row['name'] .' </label></div>';
        }

        echo $html;

        break;
    case "permissions_edit":
    
        $list_permissions = $users->permissions();
        $markeds = $users->list_permission_user($id);

        $values = array();

        foreach($markeds as $m){
            $values[] = $m["idpermission"];
        }
        
        $html = '';

        foreach($list_permissions as $row){
            
            $sw = in_array($row['id'],$values) ? 'checked':'';
            $html = $html . '<div class="form-check-inline mr-4 mb-2"><input type="checkbox" class="form-check-input" value="'. $row['id'] .'" '.$sw.' name="permissions[]" id="'. $row['name'] .'"><label class="form-check-label ml-0" for="'. $row['name'] .'">' . $row['name'] .' </label></div>';

        }

        echo $html;

        break;
    case "login":
        $login = $users->login($user,$password);
        break;
    default:
        $listAll = json_encode($users->get_users());
        echo '{"data":'.$listAll.'}';
    break;
}



?>