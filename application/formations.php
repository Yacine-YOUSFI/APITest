<?php
$formations= json_decode (file_get_contents("http://localhost/APItest/formations"));
//print_r($formations);
ob_start();
?>

<table class="table">

    <tr>
        <td>Identifiant</td>
        <td>Nom</td>
        <td>Description</td>
        <td>Image</td>
        <td>Catégorie</td>

    </tr>
<?php
foreach ($formations as $formation) :
?>
 <tr>
        <td><?= $formation->id ?></td>
        <td><?= $formation->libelle ?></td>
        <td><?= $formation->description ?></td>
        <td><?= $formation->image ?></td>
        <td><?= $formation->categorie ?></td>

    </tr>

<?php endforeach; ?>
</table>

<?php
$content = ob_get_clean();
require_once("template.php");
?>
