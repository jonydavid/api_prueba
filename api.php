<?php

/**
 * AUTOR:  
 * CORREO: 
 * AÑO: 2021
 */
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD']=='GET')
{
    
    $result = array(
                        array('1', 'Asunción', 'Paraguay'),
                        array('2', 'Buenos Aires', 'Argentina'),
                        array('3', 'Rio de Janeiro', 'Brasil'),
                        array('4', 'Caracas', 'Venezuela'),
                        array('5', 'Bogota', 'Colombia'),
                        array('6', 'Gudalajara', 'Mexico'),
                        array('7', 'Tegucigalpa', 'Hondura'),
                        array('8', 'New York', 'Estados Unidos'),
                        array('9', 'Toronto', 'Canada'),
                        array('10', 'San Salvador', 'El Salvador'),
                        array('11', 'Atacama', 'Chile'),
                        array('12', 'Santa Cruz', 'Bolivia'),
                        array('13', 'Montevideo', 'Uruguay'),
                        array('14', 'Mendoza', 'Argentina'),
                        array('15', 'Lima', 'Peru'),
                        array('16', 'Quito', 'Ecuador'),
                        array('17', 'Madrid', 'España'),
                        array('18', 'Londres', 'Inglaterra'),
                        array('19', 'Paris', 'Francia'),
                        array('20', 'Tokio', 'Japan'),
                    );

    echo json_encode($result); 
}
else if($_SERVER['REQUEST_METHOD']=='POST')
{
    $data = json_decode(file_get_contents("php://input"));

    if (!empty($data->user) && !empty($data->pass)) 
    {
        $user = $data->user;
        $pass = $data->pass; 

        if($user != 'admin' || md5($pass) != md5("admin"))
        {
            http_response_code(200);
            echo json_encode( array("retorno" => "false"));
        }
        else
        {
            http_response_code(200);
            echo json_encode( array("retorno" => "true", "user" => $user) );
        }

    } 
    else 
    {
        http_response_code(400);
        echo json_encode(array("retorno" => "false"));
        exit;
    }
}
