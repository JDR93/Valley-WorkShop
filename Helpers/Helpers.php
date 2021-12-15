<?php

    function headerAdmin($data=""){
        $view_header = "Views/template_admin/header_admin.php";
        require_once($view_header);
    }
    function footerAdmin($data=""){
        $view_footer = "Views/template_admin/footer_admin.php";
        require_once($view_footer);
    }
  

    //Obteniendo url principal
    function base_url(){
        return BASE_URL;
    }

    //Dentado de array data
    function dep($data){
        $format = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }

    // Generador de passwords
    function passGenerator($length = 10){
        $pass = "";
        $longitudPass = $length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmniopqrstuvwxyz1234567890";
        $logitudCadena = strlen($cadena);

        for($i=1;$i<=$longitudPass;$i++){
            $pos = rand(0,$logitudCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }

    //Generador de token
    function token(){
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
        return $token;
    }

    //Dar formato a la moneda
    function formatMoney($cantidad){
        $cantidad = number_format($cantidad,0,SPM,SPD);
        return SMONEY.$cantidad;
    }


?>