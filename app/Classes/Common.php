<?php

namespace HeyZues\Classes;

class Common{

public function getError($level){
        if($level == '2002') {
            return "Error al conectarse a la base de datos";
        } elseif($level == 1) {
            return "Residente";
        } elseif($level == 2) {
            return "Requisitor";
        } elseif($level == 3) {
            return "Comprador";
        } elseif($level == 4) {
            return "Administrador";
        }elseif($level == 5) {
            return "Desarrollador";
        }elseif($level == 6) {
            return "Control de Proyectos";
        }
		elseif($level == 8) {
            return "Facturacion y Cobranza";
        }		
        elseif($level == -1) {
            return "Banned";
        }
    }
}