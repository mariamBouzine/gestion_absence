<?php 
    include("Connexion.php");
    $dbc = get_db();
    // function ajouter Eleve
    function Insert(){
        global $dbc;
        $Cne = $_POST["Cne"];
        $Nom = $_POST["Nom"];
        $Prenom = $_POST["Prenom"];
        $Groupe = $_POST["Groupe"];
        $sql = "INSERT INTO `eleve`(`cne`, `nom`, `prenom`, `groupe`) VALUES ('$Cne','$Nom','$Prenom','$Groupe')";
        $result = $dbc->query($sql);
        if ($result) {
            echo "good";
            header('location:../IHM/Eleve/eleve.php');
        } else {
            echo "error ";
        }
        return $result;
    }
    // Function Afficher tout les eleves
    function select()
    {
        global $dbc;
        $SqlSelect = "SELECT * FROM `eleve`";
        $result = $dbc->query($SqlSelect);
        $array = array();
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
        return $array;
    }
    //Function supprimer eleve
    function delete($id)
    {
        global $dbc;
        $sqlDelete = "DELETE FROM `eleve` WHERE cne = '$id' ";
        $res = $dbc->query($sqlDelete);
        if ($res) {
            echo "good";
            // header("location:index.php");
        } else {
            echo "error ";
        }
        return $res;
    }
    function Get_Eleve($id){
        global $dbc;
        $sqlGet = "SELECT * FROM `eleve` WHERE cne = '$id' ";
        $result = $dbc->query($sqlGet);
        $row = $result->fetch_assoc();
        return $row;
    }
    //Function modifier eleve
    function edit(){
        global $dbc;
        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $Cne = $_POST["Cne"];
            $Nom = $_POST["Nom"];
            $Prenom = $_POST["Prenom"];
            $Groupe = $_POST["Groupe"];
            $sqlUpdate = "UPDATE `eleve` SET `cne`='$id',`nom`='$Nom',`prenom`='$Prenom',`groupe`='$Groupe'
                          WHERE cne = '$id' ";
            $res=$dbc->query($sqlUpdate);
            if($res){
                echo"good";
                // header("location:index.php");
            }
            else{
                echo "error ";
            }
            return $res;
        }
    }
    function get_search($id){
        global $dbc;
        $semaine =$_POST["semaine"];
        $sqlSearch = "SELECT * FROM `absence` WHERE cne = '$id' ";
        $result = $dbc->query($sqlSearch);
        $row = $result->fetch_assoc();
        return $row;
    }
    function search($id){
        global $dbc;
        $semaine =$_POST["semaine"];
        $sqlSearch = "SELECT * FROM `absence` WHERE semaine='$semaine' and cne = '$id' ";
        $result = $dbc->query($sqlSearch);
        $array = array();
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
        return $array;
    }
?>