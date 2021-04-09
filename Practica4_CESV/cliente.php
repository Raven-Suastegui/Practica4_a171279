<?php
    require_once "lib/nusoap.php";
    $cliente = new nusoap_client("http://localhost/Practica4_CESV/server.php");

    $error = $cliente->GetError();
    if ($error){
        echo "<h2>FATAL Error</h2><pre>" .$error ."</pre>";
    }
    $result = $cliente->call("GetPeliculas",array("datos" => "Titulos"));
    if ($cliente->fault) {
        echo "<h2>Fault</h2><pre>";
        print_r($result);
        echo "</pre>";
    }
    else {
        $error = $cliente->GetError();
        if ($error){
            echo "<h2>Error</h2><pre>" .$error ."</pre>";
        }
        else {
            echo "<h2>Titulos</h2><pre>";
            echo $result;
            echo "</pre>";
        }
    }
?>