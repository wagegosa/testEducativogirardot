<?php

use Illuminate\Support\Facades\DB;

    /**
     * Activa el ítem en el menú (sidebar)
     * @param $route
     * @return string
     */
    function setActive($route)
    {
        return (request()->is($route)) ? 'active' : '';
    }

    /**
     * Muestra/oculta el ítem en el menú
     * @param $route
     *
     * @return string
     */
    function setDisplay($route)
    {
        return (request()->is($route)) ? '' : 'hidden';
    }

    /**
     * Máscara para número de celualr
     */
    function setFormatPhone($phone)
    {
        return sprintf("(%s) %s-%s",
            substr($phone, 0, 3),
            substr($phone, 3, 3),
            substr($phone, 6));
    }

    /**
     * Captura el username del correo electrónico
     */
    function setUserName($email)
    {
        $parts = explode('@', $email);
        return $parts[0];
    }

    function setMySQLVersion()
    {
        return $mysql = DB::select('select version()')[0]->{'version()'};
    }

    function setMySQLNameVersion()
    {
        $obj = DB::select( DB::raw('SHOW VARIABLES LIKE "%version_comment%"') );
        // Array ( [0] => Array ( [Variable_name] => version_comment [Value] => MySQL Community Server (GPL) ) ) 
        
        $array = json_decode(json_encode($obj), true);
        foreach($obj as $key => $value){
            $json = $array[$key] = $value;
        }
        return $json->Value;

    }