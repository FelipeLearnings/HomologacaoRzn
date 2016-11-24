<?php

include "conn.php";
include "../VIEW/ViewShowAll.php";
include "../BO/BoInsertDb.php";

$readAllHomologacao = new Homolocacao();

if (isset($_POST["analistaLocal"])) {
    $readAllHomologacao->analistaLocal = $_POST["analistaLocal"];
}
if (isset($_POST["analistaRemoto"])) {
    $readAllHomologacao->analistaRemotos = $_POST["analistaRemoto"];
}
if (isset($_POST["IBM"])) {
    $IBM = $_POST["IBM"];
}
if (isset($_POST["nomedoPosto"])) {
    $nomedoPosto = $_POST["nomedoPosto"];
}
if (isset($_POST["ipdoConcentrador"])) {
    $ipdoConcentrador = $_POST["ipdoConcentrador"];
}
if (isset($_POST["tipordeInternet"])) {
    $tipordeInternet = $_POST["tipordeInternet"];
}
if (isset($_POST["modelodoPosto"])) {
    $modelodoPosto = $_POST["modelodoPosto"];
}
if (isset($_POST["quantidadedeImpressora"])) {
    $quantidadedeImpressora = $_POST["quantidadedeImpressora"];
}
if (isset($_POST["quantidadedeTvs"])) {
    $quantidadedeTvs = $_POST["quantidadedeTvs"];
}
if (isset($_POST["sincronizadonoPuppet"])) {
    $sincronizadonoPuppet = $_POST["sincronizadonoPuppet"];
}
if (isset($_POST["MAC"])) {
    $MAC = $_POST["MAC"];
}

$Insert = new dbInsert();

$Insert->dbInsert();


echo json_encode($arr_Infos);