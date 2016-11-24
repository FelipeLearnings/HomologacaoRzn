<?php

require_once '\xampp\htdocs\Homologacao\phpUtils\conn.php';
require_once '\xampp\htdocs\Homologacao\BO\BoHomologacaoDb.php';

$sql = QUERY_SELECT_ALL;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_all()) {
        foreach ($row as $item) {

            $instancia = new Homolocacao();

            $instancia->id                      = $item[0];
            $instancia->AnalistaLocal           = $item[1];
            $instancia->AnalistaExterno         = $item[2];
            $instancia->ibm                     = $item[3];
            $instancia->nomeDoPosto             = $item[4];
            $instancia->ipDoConcentrador        = $item[5];
            $instancia->tipoDeInternet          = $item[6];
            $instancia->modeloDoPosto           = $item[7];
            $instancia->quantidadeDeImpressora  = $item[8];
            $instancia->quantidadeDeTvs         = $item[9];
            $instancia->sincronizadoNoPuppet    = $item[10];
            $instancia->macAddress              = $item[11];
            array_push($instancia->arrayValoresPosto, $instancia);

            print_r($instancia->arrayValoresPosto[0]);
        }
    }
} else {
    echo "0 results";
}

$conn->close();




