<?php
require_once "../includes/db.php";

if(isset($_GET['id'])) {
    $evenements_id = $_GET['id'];

    $query = $bdd->prepare("SELECT * FROM evenements WHERE id = :id");
    $query->execute(array('id' => $evenements_id));
    $evenements = $query->fetch(PDO::FETCH_OBJ);

    if(!$evenements) {
        echo "Événement non trouvé.";
        exit;
    }
} else {
    echo "ID de l'événement non spécifié.";
    exit;
}

include '../partials/header.php';

$titre = "Modifier événement";
$Description = "Modifiez les informations de l'événement";

?>

<main class="container">
    <h1><?php echo $titre ?></h1>
    <h5><?php echo $Description ?></h5>
    
    <form action="save.php" method="POST">
       
        <label for="entreprise">👩‍💼Nom de l'entreprise</label>
        <input type="text" id="entreprise" name="entreprise" value="<?php echo $evenements->entreprise ?>" placeholder="Indiquez le nom de votre entreprise">

        <label for="siret">📃Numéro de siret</label>
        <input type="number" id="siret" name="siret" value="<?php echo $evenements->siret ?>" placeholder="Indiquez votre numéro de Siret">

        <label for="adresse">📍Adresse</label>
        <input type="text" id="adresse" name="adresse" value="<?php echo $evenements->adresse ?>" placeholder="Indiquez l'adresse de votre entreprise">

        <label for="phonenumber">📱Téléphone</label>
        <input type="number" id="phonenumber" name="telephone" value="<?php echo $evenements->telephone ?>" placeholder="Indiquez le numéro de téléphone">

        <label for="email">📩Email</label>
        <input type="email" id="email" name="email" value="<?php echo $evenements->email ?>" placeholder="Indiquez l'email">

        <label for="url">📎Url</label>
        <input type="text" id="url" name="url" value="<?php echo $evenements->url ?>" placeholder="Indiquez l'url de votre site">

        <label for="adresse evenement">📌Adresse de l'événement</label>
        <input type="text" id="adresse evenement" name="adresseevenement" value="<?php echo $evenements->adresseevenement ?>" placeholder="Indiquez l'adresse de l'événement proposé">

        <label for="categories evenement">🎈Catégorie de l'événement</label>
        <select id="categories evenement" name="categoriesevenement" placeholder="Choississez la catégorie d'événement">
            <option value="Apéroooo" <?php if($evenements->categoriesevenement == "Apéroooo") echo "selected"; ?>>Apéroooo</option>
            <option value="Culturelle" <?php if($evenements->categoriesevenement == "Culturelle") echo "selected"; ?>>Culturelle</option>
            <option value="Loisirs" <?php if($evenements->categoriesevenement == "Loisirs") echo "selected"; ?>>Loisirs</option>
            <option value="Sportive" <?php if($evenements->categoriesevenement == "Sportive") echo "selected"; ?>>Sportive</option>
        </select>

        <label for="presentation event">✨Présentation de l'événement</label>
        <input type="text" id="presentation event" name="presentationevent" value="<?php echo $evenements->presentationevent ?>" placeholder="Décrivez en quelques mots votre événement">

        <button type="submit">Modifier et sauvegarder</button>
        <input type="hidden" name="evenements_id" value="<?php echo $evenements_id ?>">
    </form>
</main>

<?php
require '../partials/footer.php';
?>
