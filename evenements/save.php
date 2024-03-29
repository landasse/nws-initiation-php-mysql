<?php

require_once "../includes/db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $evenements_id = $_POST['evenements_id'];

    
    $entreprise = $_POST['entreprise'];
    $siret = $_POST['siret'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $url = $_POST['url'];
    $adresseevenement = $_POST['adresseevenement'];
    $categoriesevenement = $_POST['categoriesevenement'];
    $presentationevent = $_POST['presentationevent'];

    
    $update_query = $bdd->prepare("UPDATE evenements SET 
        entreprise = :entreprise,
        siret = :siret, 
        adresse = :adresse, 
        telephone = :telephone,
        email = :email,
        url = :url,
        adresseevenement = :adresseevenement, 
        categoriesevenement = :categoriesevenement,
        presentationevent = :presentationevent
        WHERE id = :evenements_id");

  
    $update_query->execute([
        ':entreprise' => $entreprise,
        ':siret' => $siret, 
        ':adresse' => $adresse, 
        ':telephone' => $telephone, 
        ':email' => $email,
        ':url' => $url,
        ':adresseevenement' => $adresseevenement,
        ':categoriesevenement' => $categoriesevenement,
        ':presentationevent' => $presentationevent,
        ':evenements_id' => $evenements_id
    ]);

    
    header("Location: index.php?sucess=updated");
    exit;
} else {
   
    echo "Méthode non autorisée.";
    exit;
}
?>
