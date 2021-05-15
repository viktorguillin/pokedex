<?php
function imgSegunTipo($tipo){
    switch ($tipo){
        case 'agua':
            return 'img/tipo_agua.png';
            break;
        case 'fuego':
            return 'img/tipo_fuego.png';
            break;
        case 'hierba':
            return 'img/tipo_hierba.png';
            break;
    }
}

?>