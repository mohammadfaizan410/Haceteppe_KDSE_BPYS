<?php
session_start();
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
if (isset($_SESSION['userlogin'])) {
}
require_once("config-students.php");
?>


<?php
if(isset($_GET)){
    $nameOrEmail = $_GET['nameOrEmail'];

    $sql = "SELECT id, name, surname, email FROM teachers  WHERE email = '$nameOrEmail'";
    $sql2 = "SELECT id, name, surname, email FROM students  WHERE email = '$nameOrEmail'";
    $smtmselect = $db->prepare($sql);
    $smtmselect2 = $db->prepare($sql2);
    $searchResults = $smtmselect->execute();
    $searchResults2 = $smtmselect2->execute();

    if($searchResults || $searchResults2){
        $values1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        $values2 = $smtmselect2->fetchAll(PDO::FETCH_ASSOC);
        $allValues = array_merge($values1, $values2);
        echo json_encode($allValues);
    }
    else {
        echo "could not find anyone with those credentials";
    }
}

?>

