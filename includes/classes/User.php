<?php
    session_start();

    class User{
        public static function isLogged(){
            if(isset($_SESSION['isLogged']) && $_SESSION['isLogged'] === true){
                return true;
            }
            return false;
        }
    }