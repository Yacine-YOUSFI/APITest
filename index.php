<?php
//wwww.monsite.fr/formations
//wwww.monsite.fr/formations/:categorie (PHP JavaScript ....)
//wwww.monsite.fr/formation/:id (6,7)
require_once("./api.php");
try {
if(!empty($_GET['demande'])){
    $url= explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));
    switch($url[0]){
        case "formations": 
            if(empty($url[1])){
            getFormations();
        }else{
            getFormationsByCategorie($url[1]);
        }
        break;
        case "formation": 
            if(!empty($url[1])){
                getFormationById($url[1]);
            }else{
                throw new Exception("vous n'avez pas renseigné le numéro de formation");
            }
        break;
        default: throw new Exception ("la demande n'est pas validé, vérifiez l'url");
    }
}else{
    throw new Exception ("problème de recuperation de données");
}
}catch( Exception $e){
    $erreur =[
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}