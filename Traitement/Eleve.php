<?php
    include('../Acces_DB/Eleve.php');
    if($_GET['action']){
        if($_GET['action'] == "edit"){
            if (isset($_POST["edit"]) ) {
                $edit = edit();
                header('Location:../IHM/Eleve/eleve.php');
            }
        }
        else if($_GET['action'] == "insert"){
            if (isset($_POST["submit"])) {
                $insert = insert();
            }
        }
        else if($_GET['action'] == "delete"){
            $conf=$_POST['conf'];
            if ($conf=="oui") {
                $id = $_REQUEST['id'];
                $delete = delete($id);
                header('Location:../IHM/Eleve/eleve.php');
            }
            else if($conf=="non"){
                header('Location:../IHM/Eleve/eleve.php');
            }
        }
    }
 
?>
