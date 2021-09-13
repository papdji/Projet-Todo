<?php
require_once("traitement.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <h1>Todo App</h1>
    </header>
    <section>
        <form action="traitement.php" method="get">
            <label for="">Tâche à ajouter</label>
            <input type="text" name="ajout_tache" id="" placeholder="tâches à faire">
        <select name="ajout_statut" id="">
            <option value="A faire">A faire</option>
            <option value="En cour">En cour</option>
            <option value="Terminée">Terminée</option>
        </select>
            <input type="submit" name="ajout_tache_btn" value="ajouter">
            
        </form>
    </section><br>
    <section>
        <table>
            <thead>
                <th>N°</th>
                <th>Nom</th>
                <th>Statut</th>
                <th>Modifié</th>
                <th>Suppression</th>
            </thead>
            <?php foreach($tuples as $tuple): ?>
            <tr>
                <td><?php echo $tuple["id_todo"]; ?></td>
                <td><?php echo $tuple["nom"]; ?></td>
                <td><?php echo $tuple["statut"]; ?></td>
                <td>Modifié</td>
                <td><a href="traitement.php?id_todo_suppr=<?php echo $tuple['id_todo']; ?>">Supprimer</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</body>
</html>