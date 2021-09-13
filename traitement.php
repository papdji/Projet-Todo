<?php
try {
    $connecteur = new PDO("mysql:host=localhost;dbname=Todo App", "root", "");
    echo "connexion reussi";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$requete = $connecteur->prepare("SELECT * FROM Taches");
$requete->execute();
$tuples = $requete->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET["ajout_tache_btn"])){
    $nom = $_GET['ajout_tache'];
    $statut = $_GET['ajout_statut'];
    // echo $nom . "=>" .$statut;    
    if (!empty($nom) and !empty($statut)){
        // procédons à l'insertion
        $requete = $connecteur->prepare("INSERT INTO Taches VALUES(NULL, :nom, :statut)");
        $requete->bindParam(":nom", $nom);
        $requete->bindParam(":statut", $statut);
        $requete->execute();
        header("Location: index.php");
    }
}

if (isset($_GET["id_todo_suppr"])){
    $requete = $connecteur->prepare("DELETE FROM Taches WHERE id_todo=:id");
    $requete->bindParam(":id", $_GET["id_todo_suppr"]);
    $requete->execute();
    header("Location: index.php");

}

?>