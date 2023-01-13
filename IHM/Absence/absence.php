<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <form action="absence.php" method="POST">
        <input type="number" name="semaine" />
        <input type="submit" name="search" value="Valider">
        <input type="submit" name="Annuler" value="Annuler">
    </form><br><br>
    <table>
        <tr>
            <th>CNE</th>
            <th>Semaine</th>
            <th>nbr</th>
            <th><a href="./form.php">Ajouter absence</a></th>
        </tr>
        <?php
        include_once '../../Acces_DB/Absence.php';
        $select = select_abs();
        // var_dump($select);
        foreach ($select as $key => $row) {
            $key++;
        ?>
            <tr>
                <td><?php echo $row["cne"]; ?></td>
                <td><?php echo $row["semaine"]; ?></td>
                <td><?php echo $row["nbr_abs"]; ?></td>
                <td>
                    <a href="form.php?action=edit&id=<?php echo $row["cne"] ?>">Edit</a>
                    <a href="./absence.php?action=delete&id=<?php echo $row["cne"] ?>&semaine=<?php echo $row["semaine"]; ?>">delete</a>
                    <!-- <a href="./absence.php?x=delete&id=<?php echo $row["cne"] ?> ?>">delete</a> -->
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="../../index.php">Retour</a><br>
    <?php
        if (isset($_POST["search"]) && !empty($_POST["search"])) {
            // $id = $_REQUEST['id'];
            $semaine = $_POST["semaine"];
            $search = search();
            // $sort=sort($search['nbr_abs']);
            echo '<p>les absences de la semaine'.$semaine.'</p><br>
                <table>
                    <tr>
                        <th>CNE</th>
                        <th>Nom et Prenom</th>
                        <th>Nomber absence</th>
                    </tr>
                
            ';
            foreach ($search as $key => $value) {
                $key++;
                echo '<tr>
                            <td> ' . $value['cne'] . '</td>
                            <td> ' . $value['nom'] .' '. $value['prenom'] .'</td>
                            <td> ' . $value['nbr_abs']. '</td>
                        </tr>';
            }
            echo '</table>';

        }
        else if (isset($_POST["Annuler"]) && empty($_POST["search"])) {
            header('Location:absence.php');
        }
        if(isset($_GET['action'])){
            if ($_GET['action'] == "delete") {
                $id = $_GET['id'];
                $semaine = $_GET['semaine'];
                echo "<form action='../../Traitement/Absence.php?action=delete&id=$id' method='post'>
                        êtes-vous sûr de vouloir supprimer l'bsence de la semaine $semaine de l'eleve qui porte le code $id<br>
                            Oui <input type='radio' name='conf' value='oui'>
                            Non <input type='radio' name='conf' value='non' checked>
                            <input type='submit' value='Ok'>
                        </form>";
            }
        }
    ?>
</body>

</html>