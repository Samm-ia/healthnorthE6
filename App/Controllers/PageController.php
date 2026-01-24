<?php

namespace App\Controllers;

class Controller{

    public function route(): void //va analyser l'url et en fonctions va afficher les controllers
    {
        if (isset($_GET['action']))
        {
            switch($_GET['action']){
                case'about':
                    var_dump('on affiche les page about');
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