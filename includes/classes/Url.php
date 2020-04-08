<?php 


class URL{
    public static function redirect($page){
        header("Location: $page");
    }
}