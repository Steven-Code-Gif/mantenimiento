<?php

define('FALLA',array(
    'equipo detenido',
    'equipo no funciona',
    'equipo no funciona adecuadamente',
    'equipo presenta calentamiento',
    'equipo presenta ruido',
    'equipo presenta vibracion'
));

define('DIA',array('domingo','lunes','martes','miercoles','jueves','viernes','sabado'));

function price($value){
    return number_format($value,2).'$';
}