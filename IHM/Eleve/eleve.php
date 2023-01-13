<!DOCTYPE html>
<html>

<head>

    <style>
        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 15px;
        }
    </style>
</head>

<body>

    <h2>Gestion des Eleves</h2>
    <table>
        <tr>
            <th>CNE</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Group</th>
            <th><a href="./form.php">Ajouter un eleve</a></th>
        </tr>

        <?php
        include_once '../../Acces_DB/Eleve.php';
        $select = select();
        // var_dump($select);
        foreach ($select as $key => $row) {
            $key++;
        ?>
            <tr>
                <td><?php echo $row["cne"]; ?></td>
                <td><?php echo $row["nom"]; ?></td>
                <td><?php echo $row["prenom"]; ?></td>
                <td><?php echo $row["groupe"]; ?></td>
                <td><a href="form.php?action=edit&id=<?php echo $row["cne"] ?>">Edit</a>
                    <a href="./eleve.php?x=delete&id=<?php echo $row["cne"] ?>&Nom=<?php echo $row["nom"]; ?>">delete</a>
                    <a href="./eleve.php?x=Absences&id=<?php echo $row["cne"] ?>">Absences</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="">Retour</a>
    <?php
    if (isset($_GET['x'])) {
        if ($_GET['x'] == "Absences") {
            echo '<form action="" method="POST">
                <input type="number" name="semaine"  /><br /><br />
                <input type="submit" name="search" value="Valider">
                <input type="submit" name="Annuler" value="Annuler">
            </form>';
            if (isset($_POST["search"])) {
                $id = $_REQUEST['id'];
                $semaine = $_REQUEST["semaine"];
                $search = search($id);
                $get_search = get_search($id);
                // var_dump($search);
                echo '<p>Dans la semaine' . $semaine . ' leleve ayanat le CNE ' . $id . ' a ' . $get_search['nbr_abs'] . ' absences </p>
                    <h1>liste absences de eleve ' . $id . '</h1>
                    <table>
                        <tr>
                            <th>semaine</th>
                            <th>nbr absences</th>
                        </tr>
                        ';
                foreach ($search as $key => $value) {
                    $key++;
                    echo '<tr>
                                <td> ' . $value['semaine'] . '</td>
                                <td> ' . $value['nbr_abs'] . '</td>
                            </tr>';
                }
                echo '</table>';
            } else if (isset($_POST["Annuler"])) {
                header('Location:eleve.php');
            }
        } else if ($_GET['x'] == "delete") {
            $id = $_GET['id'];
            $nom = $_GET['Nom'];
            echo "<form action='../../Traitement/Eleve.php?action=delete&id=$id' method='post'>
                       êtes-vous sûr de vouloir supprimer l'élève <strong>$nom</strong><br>
                        Oui <input type='radio' name='conf' value='oui'>
                        Non <input type='radio' name='conf' value='non' checked>
                        <input type='submit' value='Ok'>
                    </form>";
        }
    }
    ?>
</body>

</html>