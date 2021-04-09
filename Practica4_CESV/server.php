<?php
    require_once "lib/nusoap.php";
    function GetPeliculas ($datos){
        if ($datos == "Titulos"){
            return Join(",", array (
                "La Naranja Mecanica",
                "The Fountain",
                "Pulp Fiction",
                "Pi el Orden del caos"
            ));
        }
        else {
            return "No hay titulos";
        }
    }
    $server = new soap_server();
    $server->register("GetPeliculas");
    if (!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
    $server->service($HTTP_RAW_POST_DATA);
?>