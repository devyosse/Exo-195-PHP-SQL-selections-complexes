<?php

/**
 * Utilisez la base de données que vous avez utilisé dans l'exo 194.
 * Utilisez aussi le CSS que vous avez écris ( div contenant l'utilisateur ).
 * Pour chaque sélection, vous utiliserez un div par utilisateur:
 * ex:  <div class="classe-css-utilisateur">
 *          utilisateur 1, données ( nom, prenom, etc ... )
 *      </div>
 *      <div class="classe-css-utilisateur">
 *          utilisateur 2, données ( nom, prenom, etc ... )
 *      </div>
 *
 * -- Sélections complexes --
 * Une seule requête est permise pour chaque point de l'exo.
 */

// TODO Commencez par créer votre objet de connexion à la base de données, vous pouvez aussi utiliser l'objet statique ou autre qu'on a créé ensemble.
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'bdd_cours';

try{
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){
    echo $e->getMessage();
}
/* 1. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' */
// TODO votre code ici.
$stmt = $conn->prepare("SELECT * from user WHERE nom='Conor'");
$state = $stmt->execute();

if ($state){
    foreach ($stmt->fetchAll() as $user){
        echo "<strong>Utilisateur: </strong>"
            . $user['id']
            . "<div>" . $user['nom'] . "</div>"
            . "<div>" . $user['prenom'] . "</div>" . "<br>";
    }
}

echo "<br>";
/* 2. Sélectionnez et affichez tous les utilisateurs dont le prénom est différent de 'John' */
// TODO Votre code ici.
$stmtt = $conn->prepare("SELECT * from user WHERE nom != 'John'");
$statee = $stmtt->execute();

if ($statee){
    foreach ($stmtt->fetchAll() as $user){
        echo "<strong>Utilisateur: </strong>"
            . $user['id']
            . "<div>" . $user['nom'] . "</div>"
            . "<div>" . $user['prenom'] . "</div>" . "<br>";
    }
}
echo "<br>";
/* 3. Sélectionnez et affichez tous les utilisateurs dont l'id est plus petit ou égal à 2 */
// TODO Votre code ici.

$stmttt = $conn->prepare("SELECT * from user WHERE nom != 'John'");
$stateee = $stmttt->execute();

if ($stateee){
    foreach ($stmttt->fetchAll() as $user){
        echo "<strong>Utilisateur: </strong>"
            . $user['id']
            . "<div>" . $user['nom'] . "</div>"
            . "<div>" . $user['prenom'] . "</div>" . "<br>";
    }
}
echo "<br>";
/* 4. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand ou égal à 2 */
// TODO Votre code ici.
$stmtttt = $conn->prepare("SELECT * from user WHERE id >= 2");
$stateeee = $stmtttt->execute();

if ($stateeee){
    foreach ($stmttt->fetchAll() as $user){
        echo "<strong>Utilisateur: </strong>"
            . $user['id']
            . "<div>" . $user['nom'] . "</div>"
            . "<div>" . $user['prenom'] . "</div>" . "<br>";
    }
}
echo "<br>";
/* 5. Sélectionnez et affichez tous les utilisateurs dont l'id est égal à 1 */
// TODO Votre code ici.
$stmttttt = $conn->prepare("SELECT * from user WHERE id = 1");
$stateeeee = $stmttttt->execute();

if ($stateeeee){
    foreach ($stmtttt->fetchAll() as $user){
        echo "<strong>Utilisateur: </strong>"
            . $user['id']
            . "<div>" . $user['nom'] . "</div>"
            . "<div>" . $user['prenom'] . "</div>" . "<br>";
    }
}
echo "<br>";
/* 6. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand que 1 ET le nom est égal à 'Doe' */
// TODO Votre code ici.
$stmt6 = $conn->prepare("SELECT * from user WHERE id > 1 AND nom='Doe'");
$state6 = $stmt6->execute();

if ($state6){
    foreach ($stmt6->fetchAll() as $user){
        echo "<strong>Utilisateur: </strong>"
            . $user['id']
            . "<div>" . $user['nom'] . "</div>"
            . "<div>" . $user['prenom'] . "</div>" . "<br>";
    }
}
echo "<br>";
/* 7. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Doe' ET le prénom est 'John'*/
// TODO Votre code ici.
$stmt7 = $conn->prepare("SELECT * from user WHERE nom='Doe' AND prenom='John'");
$state7 = $stmt7->execute();

if ($state7){
    foreach ($stmt7->fetchAll() as $user){
        echo "<strong>Utilisateur: </strong>"
            . $user['id']
            . "<div>" . $user['nom'] . "</div>"
            . "<div>" . $user['prenom'] . "</div>" . "<br>";
    }
}
/* 8. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' OU le prénom est 'Jane' */
// TODO Votre code ici.
$stmt8 = $conn->prepare("SELECT * from user WHERE  prenom='Jane'");
$state8 = $stmt8->execute();

if ($state8){
    foreach ($stmt8->fetchAll() as $user){
        echo "<strong>Utilisateur: </strong>"
            . $user['id']
            . "<div>" . $user['nom'] . "</div>"
            . "<div>" . $user['prenom'] . "</div>" . "<br>";
    }
}
echo "<br>";
/* 9. Sélectionnez et affichez tous les utilisateurs en limitant les réultats à 2 résultats */
// TODO Votre code ici.
$stmt9 = $conn->prepare("SELECT * from user LIMIT 2");
$state9= $stmt9->execute();

if ($state9) {
    foreach ($stmt9->fetchAll() as $user) {
        echo "<strong>Utilisateur: </strong>"
            . $user['id']
            . "<div>" . $user['nom'] . "</div>"
            . "<div>" . $user['prenom'] . "</div>" . "<br>";
    }
    echo "<br>";
    /* 10. Sélectionnez et affichez tous les utilisateurs par ordre croissant, en limitant le résultat à 1 seul enregistrement */
// TODO Votre code ici.
    $stmt10 = $conn->prepare("SELECT * from user ORDER BY id DESC LIMIT 1");
    $state10 = $stmt10->execute();

    if ($state10) {
        foreach ($stmt10->fetchAll() as $user) {
            echo "<strong>Utilisateur: </strong>"
                . $user['id']
                . "<div>" . $user['nom'] . "</div>"
                . "<div>" . $user['prenom'] . "</div>" . "<br>";
        }
        }
    }
    echo "<br>";
    /* 11. Sélectionnez et affichez tous les utilisateurs dont le nom commence par C, fini par r et contient 5 caractères ( voir LIKE )*/
// TODO Votre code ici.
    $stmt11 = $conn->prepare("SELECT * from user WHERE nom LIKE 'C___r'");
    $state11 = $stmt11->execute();

    if ($state11) {
        foreach ($stmt11->fetchAll() as $user) {
            echo "<strong>Utilisateur: </strong>"
                . $user['id']
                . "<div>" . $user['nom'] . "</div>"
                . "<div>" . $user['prenom'] . "</div>" . "<br>";
        }
    }
    echo "<br>";
    /* 12. Sélectionnez et affichez tous les utilisateurs dont le nom contient au moins un 'e' */
// TODO Votre code ici.
    $stmt12 = $conn->prepare("SELECT * from user WHERE nom LIKE '%e%'");
    $state12 = $stmt12->execute();

    if ($state12) {
        foreach ($stmt12->fetchAll() as $user) {
            echo "<strong>Utilisateur: </strong>"
                . $user['id']
                . "<div>" . $user['nom'] . "</div>"
                . "<div>" . $user['prenom'] . "</div>" . "<br>";
        }
    }
    echo "<br>";

    /* 13. Sélectionnez et affichez tous les utilisateurs dont le prénom est ( IN ) (John, Sarah) ... voir IN , pas OR '' */
// TODO Votre code ici.
    $stmt13 = $conn->prepare("SELECT * from user WHERE prenom IN ('John', 'Sarah')");
    $state13 = $stmt13->execute();

    if ($state13) {
        foreach ($stmt13->fetchAll() as $user) {
            echo "<strong>Utilisateur: </strong>"
                . $user['id']
                . "<div>" . $user['nom'] . "</div>"
                . "<div>" . $user['prenom'] . "</div>" . "<br>";
        }
    }
    echo "<br>";

    /* 14. Sélectionnez et affichez tous les utilisateurs dont l'id est situé entre 2 et 4 */
// TODO Votre code ici.
    $stmt14 = $conn->prepare("SELECT * from user WHERE id BETWEEN 2 AND 4");
    $state14 = $stmt14->execute();

    if ($state14) {
        foreach ($stmt14->fetchAll() as $user) {
            echo "<strong>Utilisateur: </strong>"
                . $user['id']
                . "<div>" . $user['nom'] . "</div>"
                . "<div>" . $user['prenom'] . "</div>" . "<br>";

        }
    }
    echo "<br>";
}