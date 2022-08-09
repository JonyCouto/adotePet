<?php
    include_once('config.php');
    function conectaDB($query){
        global $db;
        try{
            $conn = new PDO('mysql:host='.$db->host.';dbname='.$db->db, $db->usuario, $db->senha);
            return consultaDB($conn, $query);
        } catch(PDOExcepction $e){
            echo 'Opa, erro na hora de conectar no banco';
        }
    }
    function consultaDB($conn, $query){
        try{
            $dados = $conn->prepare($query);
            $dados->execute();
            if ($dados->rowCount() > 1){
                $itens = $dados->fetchAll(PDO::FETCH_OBJ);
            } else {
                $itens = $dados->fetch(PDO::FETCH_OBJ);
            }
            return $itens;
        } catch(PDOException $e){
            echo 'Opa, erro ao executar a query';
        }
    }
    conectaDB('SELECT * FROM banner');
?>