<?php

    //obtener la Url y asiganarla en una variable, si no hay datos la url seria home.
    $url = !empty($_GET['url']) ? $_GET['url'] : "home/home";
    $arrayUrl = explode("/",$url); //convertir la url en un array de datos, adicionalmente convertir el / en ,
    $controlador = $arrayUrl[0]; //se crea la variable para el controlador con el valor del array 0
    $metodo = $arrayUrl[0]; //se crea la variable metodo y se iguala con el array de datos en 0
    $parametros = ""; // se crea la variable parametros y se iguala a nada para su posterior validacion

   /*  se valida si es diferente de vacio la ubicacion del array en 1, si no es vacio se hace una 
    validacion nueva para saber si los datos enviados en la posición 1 es diferente a nada, 
    de esta forma le asignamos el valor 1 del array a metodo */
    if(!empty($arrayUrl[1])){
        if($arrayUrl[1]!= ""){
            $metodo = $arrayUrl[1];
        }
    }

    /* se valida si es diferente de vacio la ubicacion del array en 2, si no es vacio se hace una 
    validacion nueva para saber si los datos enviados en la pocision 2 es diferente a nada,
    de esta forma creamos un ciclo para validar la cantidad de parametors que estan enviados y se concatenan con el nuevo valor segun la posicion del iterador*/
    if(!empty($arrayUrl[2])){
        if($arrayUrl[2]!= ""){
            for ($i=2; $i <count($arrayUrl); $i++) { 
                    $parametros.= $arrayUrl[$i].',';
            }
            $parametros = trim($parametro,',');
        }
    }
?>