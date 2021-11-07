<?php

function getFormations(){
    $pdo=getConnection();
    $req= "select f.id, f.libelle, f.description, f.image, c.libelle as 'categorie' from formation f inner join categorie c on f.categorie_id=c.id" ;
    $stmt= $pdo->prepare($req);
    $stmt->execute();
    $formations= $stmt-> fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    //print_r($formations);
   sendJson($formations);
  
}

function getFormationsByCategorie($categorie){
    $pdo=getConnection();
    $req= "select f.id, f.libelle, f.description, f.image, c.libelle as 'categorie' from formation f inner join categorie c on f.categorie_id=c.id
    where c.libelle= :categorie" ;
    $stmt= $pdo->prepare($req);
    $stmt->bindValue(":categorie", $categorie,PDO::PARAM_STR);
    $stmt->execute();
    $formations= $stmt-> fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    //print_r($formations);
    sendJson($formations);
}

function getFormationById($id){
    $pdo=getConnection();
    $req= "select f.id, f.libelle, f.description, f.image, c.libelle as 'categorie' from formation f inner join categorie c on f.categorie_id=c.id
    where f.id= :id" ;
    $stmt= $pdo->prepare($req);
    $stmt->bindValue(":id", $id,PDO::PARAM_INT);
    $stmt->execute();
    $formations= $stmt-> fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    //print_r($formations);
    sendJson($formations);
}

//connecter a la base de donnée

function getConnection(){
    return new PDO("mysql:host=localhost;dbname=fh2prog;charset=utf8", "root", "");
}

function sendJson($infos){
    $json = json_encode($infos);

    //header("Content-type: application/json");
    
    echo $json;
}

?>