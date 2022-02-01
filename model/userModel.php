<?php

class Users extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_users(){
        $sql = "SELECT id,user,name,last_name,rol FROM users";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_user($user,$password,$name,$last_name,$rol,$permissions)
    {

        if (empty($user) || empty($password) || empty($name) || empty($last_name) || $rol == null) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{
            
            $query = "SELECT * FROM users WHERE user = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$user);
            $query->execute();

            if($query->rowCount() > 0){
                
                $response = [
                    "status" => "error",
                    "message" => "Ya existe el usuario registrado en la base de datos."
                ];

            }else{

                    $query = "INSERT INTO users(user,password,name,last_name, rol,created_at,updated_at) VALUES(?,?,?,?,?,now(),now())";
                    $query = $this->db->prepare($query);

                    $passwordEncrypted = password_hash($password,PASSWORD_DEFAULT);

                    $query->bindValue(1,$user);
                    $query->bindValue(2,$passwordEncrypted);
                    $query->bindValue(3,$name);
                    $query->bindValue(4,$last_name);
                    $query->bindValue(5,$rol);
                    $query->execute();

                    if(!empty($permissions)){
                        $last_id = $this->db->lastInsertId();

                        foreach($permissions as $p){

                            $prm = "INSERT INTO users_permissions(id,iduser,idpermission) VALUES(null,?,?)";
                            $prm = $this->db->prepare($prm);
                            $prm->bindValue(1,$last_id);
                            $prm->bindValue(2,$p);
                            $prm->execute();

                        }
                    }

                    $response = [
                        "status" => "success",
                        "message" => "Usuario registrado con exito"
                    ];

            }
           
        }

        echo json_encode($response);
    }


    public function update_user($id,$user,$password,$name,$last_name,$rol,$permissions){

        if(empty($user) || empty($password) || empty($name) || empty($last_name) || $rol == null){
            
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
            
        }else{

            $query = "SELECT * FROM users WHERE user = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$user);
            $query->execute();

            if($query->rowCount() > 0){

                $query = "UPDATE users SET  password = ?, name= ?, last_name = ?, rol = ?, updated_at = now() WHERE id = ?";
                $query = $this->db->prepare($query);
                $passwordEncrypted = password_hash($password,PASSWORD_DEFAULT);
                $query->bindValue(1,$passwordEncrypted);
                $query->bindValue(2,$name);
                $query->bindValue(3,$last_name);
                $query->bindValue(4,$rol);
                $query->bindValue(5,$id);
                $query->execute();

                $sql_delete = "DELETE FROM users_permissions WHERE iduser = ?";
                $sql_delete = $this->db->prepare($sql_delete);
                $sql_delete->bindValue(1,$id);
                $sql_delete->execute();

                if(!empty($permissions)){
                    foreach($permissions as $p){
                  
                        $prm = "INSERT INTO users_permissions(id,iduser,idpermission) VALUES(null,?,?)";
                        $prm = $this->db->prepare($prm);
                        $prm->bindValue(1,$id);
                        $prm->bindValue(2,$p);
                        $prm->execute();
    
                    }
                }




                $response = [
                    "status" => "success",
                    "message" => "El usuario ha sido actualizado con exito, excepto el usuario porque ya existe."
                ];

            }else{
                $query = "UPDATE users SET user = ?, password = ?, name= ?, last_name = ?, rol = ?, updated_at = now() WHERE id = ?";
                $query = $this->db->prepare($query);
                $passwordEncrypted = password_hash($password,PASSWORD_DEFAULT);
                $query->bindValue(1,$user);
                $query->bindValue(2,$passwordEncrypted);
                $query->bindValue(3,$name);
                $query->bindValue(4,$last_name);
                $query->bindValue(5,$rol);
                $query->bindValue(6,$id);
                $query->execute();

                $response = [
                    "status" => "success",
                    "message" => "Usuario actualizado con exito."
                ];
            }

        }

        echo json_encode($response);
    }

    public function delete_user($id){

        if(empty($id)){

            $response = [
                "status" => "error",
                "message" => "No existe campo ID"
            ];

        }else{

            $query = "SELECT * FROM users WHERE id = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$id);
            $query->execute();

            if($query->rowCount() > 0){

                $query = "DELETE FROM users WHERE id= ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$id);
                $query->execute();

                $sql_delete = "DELETE FROM users_permissions WHERE iduser = ?";
                $sql_delete = $this->db->prepare($sql_delete);
                $sql_delete->bindValue(1,$id);
                $sql_delete->execute();
    
                $response = [
                    "status" => "success",
                    "message" => "Usuario eliminado con exito"
                ];
                
                
            }else{

                $response = [
                    "status" => "error",
                    "message" => "Usuario no existe"
                ];

            }

            

        }

        echo json_encode($response);

    }

    public function login($user, $password)
    {
        if (empty($user) || empty($password)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios."
            ];
            
        } else {
            $sql = "SELECT * FROM users WHERE user = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $user);
            if (!$sql->execute()) {
                $response = [
                    "status" => "error",
                    "message" => "Error del sistema, comunicate con al Admnistrador de Sistemas."
                ];
            } else {
                if ($sql->rowCount() > 0) {
                    $data                = $sql->fetch(PDO::FETCH_ASSOC);
                    $passwordEncrypted = $data['password'];

                    if (password_verify($password, $passwordEncrypted) == true) {

                        $_SESSION['id']              = $data['id'];
                        $_SESSION['user']              = $data['user'];
                        $_SESSION['name']     = $data['name'];
                        $_SESSION['last_name']     = $data['last_name'];
                        $_SESSION['rol']     = $data['rol'];

                        require_once("userModel.php");

                        $user = new Users();

                        $markeds = $user->list_permission_user($data['id']);
                        $values=array();

                        foreach($markeds as $row){
                            $values[]= $row["idpermission"];
                        }

                        in_array(1,$values)?$_SESSION['caja']=1:$_SESSION['caja']=0;
                        in_array(2,$values)?$_SESSION['almacen']=1:$_SESSION['almacen']=0;
                        in_array(3,$values)?$_SESSION['compras']=1:$_SESSION['compras']=0;
                        in_array(4,$values)?$_SESSION['ventas']=1:$_SESSION['ventas']=0;
                        in_array(5,$values)?$_SESSION['reportes']=1:$_SESSION['reportes']=0;
                        in_array(6,$values)?$_SESSION['usuarios']=1:$_SESSION['usuarios']=0;
                        in_array(7,$values)?$_SESSION['configuracion']=1:$_SESSION['configuracion']=0;
                        

                        $response = [
                            "status" => "success",
                            "url" => "main?module=dashboard"
                        ];
                    } else {
                        $response = [
                            "status" => "error",
                            "message" => "Error en los datos ingresados."
                        ];
                    }

                } else {
                    $response = [
                        "status" => "error",
                        "message" => "Error en los datos ingresados."
                    ];
                }
            }
        }

        echo json_encode($response);

    }

    public function permissions(){

        $sql = "SELECT * FROM permissions";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    }


    public function list_permission_user($id){

        $sql = "SELECT * FROM users_permissions WHERE iduser = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$id);
        $sql->execute();
        return $result = $sql->fetchAll();

    }



}