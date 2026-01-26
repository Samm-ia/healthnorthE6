<?php

namespace App\Controllers;

class Controller{

    public function route(): void //va analyser l'url et en fonctions va afficher les controllers
    {
        if (isset($_GET['controller']))
        {
            switch($_GET['controller']){
                case'patient':
                    var_dump('on affiche les patients');
                    break;
                case'rendez_vous':
                     var_dump('on affiche les rdv patients');
                    break;
                default:

                break;
            }
        } else {

        }
    }
}

?>
