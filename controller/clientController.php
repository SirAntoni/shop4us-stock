<?php 

require "../config/conexion.php";
require "../model/clientModel.php";

$clients = new Clients();

$id = '';
$document_number = '';
$name = '';
$document_type = '';
$phone = '';
$direction = '';
$email = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['document_number'])){
    $document_number = $_POST['document_number'];
}

if(isset($_POST['name'])){
    $name = $_POST['name'];
}

if(isset($_POST['document_type'])){
    $document_type = $_POST['document_type'];
}

if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
}

if(isset($_POST['direction'])){
    $direction = $_POST['direction'];
}

if(isset($_POST['email'])){
    $email = $_POST['email'];
}

if(isset($_POST['departament'])){
    $departament = $_POST['departament'];
}

if(isset($_POST['province'])){
    $province = $_POST['province'];
}

if(isset($_POST['district'])){
    $district = $_POST['district'];
}


switch ($option){
    case 'insert':
        $insert = $clients->insert_client($document_number,$name,$document_type,$direction,$phone,$email,$departament,$province,$district);
    break;
    case 'update':
        $update = $clients->update_client($id,$document_number,$name,$document_type,$direction,$phone,$email,$departament,$province,$district);
    break;
    case 'delete':
        $delete = $clients->delete_client($id);
    break;
    case 'select_clients':
        echo json_encode($clients->get_clients());
    break;
    case 'departaments':
        echo json_encode($clients->get_departaments());
    break;
    case 'provinces':
        echo json_encode($clients->get_provinces($departament));
    break;
    case 'districts':
        echo json_encode($clients->get_districts($province));
    break;
    default:
    $listAll = json_encode($clients->get_clients());
    echo '{"data":'.$listAll.'}';
    break;
}

?>