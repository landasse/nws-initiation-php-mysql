<h1>create.php</h1>
<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

require_once "../includes/db.php";

$query = $bdd->prepare("
INSERT INTO evenements 
SET 
entreprise=:entreprise,
siret=:siret, 
adresse=:adresse, 
telephone=:telephone, 
email=:email, 
url=:url, 
adresseevenement=:adresseevenement,
categoriesevenement=:categoriesevenement,
presentationevent=:presentationevent
");

$query->execute([
    "entreprise" => $_POST ['entreprise'],
    "siret" => $_POST ['siret'],
    "adresse" => $_POST ['adresse'],
    "telephone" => $_POST ['telephone'],
    "email" => $_POST ['email'],
    "url" => $_POST ['url'],
    "adresseevenement" => $_POST ['adresseevenement'],
    "categoriesevenement" => $_POST ['categoriesevenement'],
    "presentationevent" => $_POST ['presentationevent']
]);
header("Location: index.php?sucess=created");
exit();
?>