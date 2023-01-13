<?php
    include("Connexion.php");
    $dbc = get_db();
    function select_abs()
    {
        global $dbc;
        $SqlSelect = "SELECT * FROM `absence`";
        $result = $dbc->query($SqlSelect);
        $array = array();
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
        return $array;
    }
    function search()
    {
        global $dbc;
        $semaine = $_POST["semaine"];
        $sqlSearch = "SELECT * FROM `absence` ab 
                        INNER JOIN eleve el 
                        on ab.cne=el.cne
                        where ab.semaine='$semaine'";
        $result = $dbc->query($sqlSearch);
        function sort_($a, $b)
        {
            return strcmp($a["nbr_abs"], $b["nbr_abs"]);
        }
        $array = array();
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
        usort($array, "sort_");
        return $array;
    }
    function Insert(){
        global $dbc;
        $nbr_abs = $_POST["nbr_abs"];
        $semaine = $_POST["semaine"];
        $cne = $_POST["cne"];
        $sql = "INSERT INTO `absence`(`semaine`, `cne`, `nbr_abs`) VALUES ('$semaine','$cne','$nbr_abs')";
        $result = $dbc->query($sql);
        if ($result) {
            echo "good";
            header('location:../IHM/Absence/absence.php');
        } else {
            echo "error ";
        }
        return $result;
    }
    function Get_Absence($id){
        global $dbc;
        $sqlGet = "SELECT * FROM `absence` where cne = '$id'";
        $result = $dbc->query($sqlGet);
        $row = $result->fetch_assoc();
        return $row;
    }
    function edit(){
        global $dbc;
        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $nbr_abs = $_POST["nbr_abs"];
            $sqlUpdate = "UPDATE `absence` SET `nbr_abs`='$nbr_abs' WHERE cne = '$id' ";
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
    function delete($id)
    {
        global $dbc;
        $sqlDelete = "DELETE FROM `absence` WHERE cne = '$id' ";
        $res = $dbc->query($sqlDelete);
        if ($res) {
            echo "good";
            // header("location:index.php");
        } else {
            echo "error ";
        }
        return $res;
    }
?>
