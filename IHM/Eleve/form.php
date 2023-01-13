<?php 
    $action="insert";
    if (isset($_GET['id'])) {
        include_once '../../Acces_DB/Eleve.php';
        $id = $_GET['id'];
        $Get_Eleve = Get_Eleve($id);
        $action ="edit";
    }
    else{
        $Get_Eleve = array("","","","");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <center>
        <form action="../../Traitement/Eleve.php" method="post">
            CNE: 
            <?php  if ($action=="insert") { ?>
                 <input type="number" name="Cne"  /><br /><br />
            <?php } else if($action =="edit"){?>
                <label><?php if (isset($_GET['id'])) { echo $Get_Eleve["cne"];}?></label><br /><br />
            <?php } ?>
            NOM: <input type="text" name="Nom" value="<?php   if (isset($_GET['id'])) {echo $Get_Eleve["nom"];}?>"/><br /><br />
            PRENOM: <input type="text" name="Prenom" value="<?php   if (isset($_GET['id'])) {echo $Get_Eleve["prenom"];}?>"/><br /><br />
            GROUPE: <input type="text" name="Groupe" value="<?php   if (isset($_GET['id'])) {echo $Get_Eleve["groupe"];}?>"/><br /><br />
            <?php  if ($action=="insert") { ?>
                <input type="submit" name="submit" value="Envoyer" />
            <?php } else if($action =="edit"){?>
                <input type='submit' name='edit' value='Modifier' />
            <?php } 
            ?>
            <input type="submit" value="Annuler" />
            <input type="hidden" name="id" value="<?php if (isset($_GET['id'])) { echo $Get_Eleve["cne"];}?>">
        </form>
    </center>
</body>

</html>