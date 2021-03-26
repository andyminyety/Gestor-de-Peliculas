<?php

    session_start();
    
    $GLOBALS["sessionName"] = "Películas";

    function Agregar($item){

        $Películas = GetList();

        if(count($Películas) == 0){

            $item["id"] = 1;

        }else{

            $LastPelis = GetLastPelis($Películas);
            $item["id"] = $LastPelis["id"] + 1;
        }      

        array_push($Películas, $item);

       $_SESSION[$GLOBALS["sessionName"]] = $Películas;         
    }

    function Editar($item){      

        $Películas = GetList();
        $Pelis = GetById($item["id"]);

        if($Pelis != null && count($Pelis) > 0 ){
      
            $index = GetIndexPelis($Películas,"id",$item["id"]);
            $Películas[$index] = $item;

            $_SESSION[$GLOBALS["sessionName"]] = $Películas;    
        }           
    }

    function GetList(){

        $Películas = isset($_SESSION[$GLOBALS["sessionName"]]) ? $_SESSION[$GLOBALS["sessionName"]] : [];
        
        return $Películas;
    }

    function GetById($Id){

        $Películas = GetList();

        $Pelis = SearchProperty($Películas,"id",$Id);     
        
        return $Pelis[0];
    }
?>