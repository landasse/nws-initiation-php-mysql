<?php
require_once "../includes/db.php";

$query = $bdd->query("SELECT * FROM evenements ORDER BY id DESC");
$propositions = $query->fetchAll(PDO::FETCH_OBJ);
    
include '../partials/header.php';
   
?>

<div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Entreprise<th>
                    <th>SIRET<th>
                    <th>Adresse<th>
                    <th>Télephone<th>
                    <th>Email<th>
                    <th>URL<th>
                    <th>Adresse evenement<th>
                    <th>Categories evenement<th>
                    <th>Presentation event<th>
                </tr>
            </thead>
                        
            <tbody>
                            
                <?php foreach ($propositions as $proposition) : ?>
                <tr>
                    <th><?php echo $proposition->entreprise ?><th>
                    <th><?php echo $proposition->siret ?><th>
                    <th><?php echo $proposition->adresse ?><th>
                    <th><?php echo $proposition->telephone ?><th>
                    <th><?php echo $proposition->email ?><th>
                    <th><?php echo $proposition->url ?><th>
                    <th><?php echo $proposition->adresseevenement ?><th>
                    <th><?php echo $proposition->categoriesevenement ?><th>
                    <th><?php echo $proposition->presentationevent ?><th>
                    <td><a href="update.php?id=<?php echo $proposition->id ?>">modifier</a></td>
                    <td><a href="delete.php?id=<?php echo $proposition->id ?>">🗑️</a></td>
                    
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
</div>

<?php
require '../partials/footer.php'; ?>