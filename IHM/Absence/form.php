<?php 
    $action="insert";
    if (isset($_GET['id'])) {
        include_once '../../Acces_DB/Absence.php';
        $id = $_GET['id'];
        $Get_Absence = Get_Absence($id);
        $action ="edit";
    }
    else{
        $Get_Absence = array("","","","");
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
        <form action="../../Traitement/Absence.php?action=<?=$action?>" method="post">
            semaine: 
            <?php  if ($action=="insert") { ?>
                 <input type="number" name="semaine"  /><br /><br />
                 cne:<select name="cne" id="">
                <option value="none">...select...</option>
                <?php
                    // include_once '../../Acces_DB/Absence.php';
                    include_once '../../Acces_DB/Eleve.php';
                    $select = select();
                    // var_dump($select);
                    foreach ($select as $key => $row) {
                        $key++;
                ?>
                    <option name="" value="<?php echo $row['cne'];?>"><?php echo $row['cne'];?></option>
                <?php }?>
            </select><br><br>
            <?php } else if($action =="edit"){?>
                <label><?php if (isset($_GET['id'])) { echo $Get_Absence["semaine"];}?></label><br /><br />
                cne:<label><?php if (isset($_GET['id'])) { echo $Get_Absence["cne"];}?></label><br /><br />
            <?php } ?>
            nbr absences: <input type="text" name="nbr_abs" value="<?php   if (isset($_GET['id'])) {echo $Get_Absence["nbr_abs"];}?>"/><br /><br />
            <?php  if ($action=="insert") { ?>
                <input type="submit" name="submit" value="Envoyer" />
            <?php } else if($action =="edit"){?>
                <input type='submit' name='edit' value='Modifier' />
            <?php } 
            ?>
            <input type="submit" value="Annuler" />
            <input type="hidden" name="id" value="<?php if (isset($_GET['id'])) { echo $Get_Absence["cne"];}?>">
        </form>
    </center>
</body>

</html>