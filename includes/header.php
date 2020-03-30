<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registru Documente</title>
    <link rel="stylesheet" href="design/bootstrap.css">
    <link rel="stylesheet" href="design/style.css">
    <script>
        function setDate(){
            if(window.location.href.indexOf("index") == -1){
                let body = document.getElementById('body');
                body.style.background = "#fff";
            }
            if(window.location.href.indexOf("secretariat")>-1){
                let data = document.getElementById('dataIntrarii');
                let new_data = new Date();
                if(new_data.getMonth() == 11){
                    data.value = `${new_data.getFullYear()}-${new_data.getMonth()+1}-${new_data.getDate()}`;
                }
                data.value = `${new_data.getFullYear()}-0${new_data.getMonth()+1}-${new_data.getDate()}`;
            }
        
        }
        
    </script>
</head>
<body id="body" onload="setDate();">
