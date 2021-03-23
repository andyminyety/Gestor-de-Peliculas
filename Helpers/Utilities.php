<?php

    $Generos = [1=> "Acción", 2=>"Terror", 3=>"Comedia", 4=>" Suspenso", 5=>" Documentales"];
 

    function GetLastPelis($list){

        $countList = count($list);
        $LastPelis = $list[$countList -1];

        return $LastPelis;

    }

    function SearchProperty($list, $property, $value){

        $filters = [];

        foreach($list as $item){

            if($item[$property] == $value){
                array_push($filters, $item);
            }
        }

        return $filters;
    }

    function GetIndexPelis($list, $property, $value){

        foreach($list as $key => $item){

            if($item[$property] == $value){             
                return $key;                
                break;
            }
        }
    }

    function GetIndexDelete($list, $property, $value){
        $index = 0;

        foreach($list as $key => $item){

            if($item[$property] == $value){                           
                $index = $key;
            }
        }
        return $index; 
    }
?>