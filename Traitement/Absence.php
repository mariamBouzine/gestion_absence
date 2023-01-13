<?php
    include('../Acces_DB/Absence.php');
    if($_GET['action']){
        if($_GET['action'] == "edit"){
            if (isset($_POST["edit"]) ) {
                $edit = edit();
                header('Location:../IHM/Absence/absence.php');
            }
        }
        else if($_GET['action'] == "insert"){
            if (isset($_POST["submit"])) {
                $insert = insert();
                header('Location:../IHM/Absence/absence.php');
            }
        }
        else if($_GET['action'] == "delete"){
            $conf=$_POST['conf'];
            if ($conf=="oui") {
                $id = $_REQUEST['id'];
                $delete = delete($id);
                header('Location:../IHM//Absence/absence.php');
            }
            else if($conf=="non"){
                header('Location:../IHM//Absence/absence.php');
            }
        }
    }
 
?>
