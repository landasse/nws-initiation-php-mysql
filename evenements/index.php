<?php
require_once "../includes/db.php";

$query = $bdd->query("SELECT * FROM evenements ORDER BY id DESC");
$propositions = $query->fetchAll(PDO::FETCH_OBJ);
    
include '../partials/header.php';

     $titre = "Proposition événement";

    $Description = "Envie de présenter un évent ?";


if (isset($_GET['sucess'])) 
{
    $message_type = "success";
    if ($_GET['sucess'] === "created") {
        $message = "La question à été ajoutée avec succès.";
    }
    if ($_GET ['sucess'] === "deleted"){
        $message = "La question à été supprimée avec succès.";
    }
    if ($_GET['sucess'] === "updated"){
        $message = "La question à été modifié avec succès";
    }
}
 
?>


<main class="container">

<?php

if (isset($message)) : ?>
  <p data-notice="<?= $message_type ?>">
  <span><?= $message ?></span>
  <i data-feather="x" data-close></i>
  
</p>
<?php endif; ?>



    <h1><?php echo $titre ?> </h1>
    <br>
    <h5> <?php echo $Description ?> </h5>
    <br>

    

    <form action="create.php" method="POST">

        <label for="entreprise">👩‍💼Nom de l'entreprise</label>
        <input type="text" id="entreprise" name="entreprise" placeholder="Indiquez le nom de votre entreprise">

        <label for="siret">📃Numéro de siret</label>
        <input type="number" id="siret" name="siret"placeholder="Indiquez votre numéro de Siret">

        <label for="adresse">📍Adresse</label>
        <input type="text" id="adresse" name="adresse"placeholder="Indiquez l'adresse de votre entreprise">

        <label for="phonenumber">📱Téléphone</label>
        <input type="number" id="phonenumber" name="telephone"placeholder="Indiquez le numéro de téléphone">

        <label for="email">📩Email</label>
        <input type="email" id="email" name="email"placeholder="Indiquez l'email">

        <label for="url">📎Url</label>
        <input type="text" id="url" name="url"placeholder="Indiquez l'url de votre site">

        <label for="adresse evenement">📌Adresse de l'événement</label>
        <input type="text" id="adresse evenement" name="adresseevenement"placeholder="Indiquez l'adresse de l'évenement proposé">

        <label for="categories evenement">🎈Catégorie de l'évenement</label>
        <select id="categories evenement" name="categoriesevenement"placeholder="Choississez la catégorie d'événement">
            <option value="Apéroooo">Apéroooo</option>
            <option value="Culturelle">Culturelle</option>
            <option value="Loisirs">Loisirs</option>
            <option value="Sportive">Sportive</option>
        </select>

        <label for="presentation event"> ✨Présentation de l'événement</label>
        <input type="text" id="presentation event" name="presentationevent"placeholder="Décrivez en quelques mots votre événement">

        <button> Envoyer </button>

    </form>

</main>

<?php
require '../partials/footer.php'; ?>