<?php
        


        try {
            $db = new PDO('mysql:host=localhost;dbname=james_minichat;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } catch(Exception $e){
                die("error : " .$e->getMessage());
            }

        
        $max = isset($_GET['range'])?$_GET['range']:'10';

        if($max !='all'){
            $query = "SELECT pseudo,message FROM minichat ORDER BY ID DESC LIMIT 0,$max";
        } else {
            $query = "SELECT pseudo,message FROM minichat ORDER BY ID DESC";
        } 

        //$query = "SELECT pseudo,message FROM minichat ORDER BY ID DESC LIMIT 0,$max";
        

        
        

        $req = $db->query($query);
        while($data = $req->fetch()){
            echo '<b>' .$data['pseudo'] .'</b>: ' .$data['message'] .'<br />'; 
        }



        
        
        
        ?>