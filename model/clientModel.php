<?php

class Clients extends Conectar
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function get_clients(){
        $sql = "SELECT *  FROM clients as c INNER JOIN ubdepartamento udep ON c.departament_id = udep.idDepa INNER JOIN ubprovincia uprov ON c.province_id = uprov.idProv INNER JOIN ubdistrito udis ON c.district_id = udis.idDist";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insert_client($document_number,$name,$document_type,$direction,$phone,$email,$departament,$province,$district)
    {
        if (empty($document_number) || empty($name) || empty($document_type) || empty($phone) || empty($departament) || empty($province) || empty($district)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{
            
            $query = "SELECT * FROM clients WHERE document_number = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$document_number);
            $query->execute();

            if($query->rowCount() > 0){
                
                $response = [
                    "status" => "error",
                    "message" => "Ya existe un cliente con el mismo número de documento."
                ];

            }else{

                    $query = "INSERT INTO clients(document_number,name,document_type,direction, phone, email,departament_id,province_id,district_id,created_at,updated_at) VALUES(?,?,?,?,?,?,?,?,?,now(),now())";
                    $query = $this->db->prepare($query);
                    $query->bindValue(1,$document_number);
                    $query->bindValue(2,$name);
                    $query->bindValue(3,$document_type);
                    $query->bindValue(4,$direction);
                    $query->bindValue(5,$phone);
                    $query->bindValue(6,$email);
                    $query->bindValue(7,$departament);
                    $query->bindValue(8,$province);
                    $query->bindValue(9,$district);
                    $query->execute();

                    $response = [
                        "status" => "success",
                        "message" => "Cliente agregado con exito"
                    ];

            }
           
        }
        echo json_encode($response);
    }


    public function update_client($id,$document_number,$name,$document_type,$direction,$phone,$email,$departament,$province,$district){

        if(empty($document_number) || empty($name) || empty($document_type) || empty($direction) || empty($phone) || empty($email) || empty($departament) || empty($province) || empty($district)){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{

            $query = "SELECT * FROM clients WHERE document_number = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$document_number);
            $query->execute();

            if($query->rowCount() > 0){

                $query = "UPDATE clients SET document_number = ?, name= ?, direction = ?, phone = ?, email = ?, departament_id = ?, province_id = ?, district_id = ?, updated_at = now() WHERE id = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$document_number);
                $query->bindValue(2,$name);
                $query->bindValue(3,$direction);
                $query->bindValue(4,$phone);
                $query->bindValue(5,$email);
                $query->bindValue(6,$departament);
                $query->bindValue(7,$province);
                $query->bindValue(8,$district);
                $query->bindValue(9,$id);
                $query->execute();


                $response = [
                    "status" => "success",
                    "message" => "El cliente ha sido actualizado con exito, excepto el número de documento porque ya existe."
                ];


            }else{
                $query = "UPDATE clients SET document_number = ?, name= ?, document_type = ?, direction = ?, phone = ?, email = ?, updated_at = now() WHERE id = ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$document_number);
                $query->bindValue(2,$name);
                $query->bindValue(3,$document_type);
                $query->bindValue(4,$direction);
                $query->bindValue(5,$phone);
                $query->bindValue(6,$email);
                $query->bindValue(7,$id);
                $query->execute();

                $response = [
                    "status" => "success",
                    "message" => "Cliente actualizado con exito."
                ];
            }

        }

        echo json_encode($response);
    }

    public function delete_client($id){

        if(empty($id)){

            $response = [
                "status" => "error",
                "message" => "No existe campo ID"
            ];

        }else{

            $query = "SELECT * FROM clients WHERE id = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$id);
            $query->execute();

            if($query->rowCount() > 0){

                $query = "DELETE FROM clients WHERE id= ?";
                $query = $this->db->prepare($query);
                $query->bindValue(1,$id);
                $query->execute();
    
                $response = [
                    "status" => "success",
                    "message" => "Cliente eliminado con exito"
                ];
                
                
            }else{

                $response = [
                    "status" => "error",
                    "message" => "Cliente no existe"
                ];

            }

            

        }

        echo json_encode($response);

    }

    public function get_departaments(){

        $sql = "SELECT * FROM ubdepartamento";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_provinces($id_departamento){

        $sql = "SELECT * FROM ubprovincia where idDepa = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$id_departamento);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_districts($id_provincia){

        $sql = "SELECT * FROM ubdistrito where idProv = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$id_provincia);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }




}
