<?php
require_once "../includes/db.php";

$query = $bdd->prepare("DELETE FROM evenements WHERE id=:id");

$query->execute([
    "id" => $_GET['id']
]);

header("Location: index.php?sucess=deleted");
exit();