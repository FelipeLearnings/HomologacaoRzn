<?php
/**
 * Created by PhpStorm.
 * User: Felipe Gerbelli
 * Date: 21/11/2016
 * Time: 09:30
 */
include "VIEW/ViewShowAll.php";
?>

<html>
<head>
    <title>Registro de Homologacao</title>
    <!-- For-Mobile-Apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/personal.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/personal.js"></script>
</head>

<body>
<div class="row">
    <div class="col-md-12">
        <table class="table-bordered table-striped">
            <thead>
            <tr>
                <th class="text-center">Analista Local</th>
                <th class="text-center">Analista Remoto</th>
                <th class="text-center">IBM</th>
                <th class="text-center">Nome Do Posto</th>
                <th class="text-center">IP do Concentrador</th>
                <th class="text-center">Tipo de Internet</th>
                <th class="text-center">Modelo do posto</th>
                <th class="text-center">Quantidade de impressora</th>
                <th class="text-center">Quantidade de Tvs</th>
                <th class="text-center">Sincronizado no Puppet?</th>
                <th class="text-center">MAC</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $LINHA_DINAMICA_MODELO =
                '<tr>
                        <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;">{{NOME_ANALISTA_LOCAL}}</td>
                        <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;">{{NOME_ANALISTA_REMOTO}}</td>
                        <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;">{{IBM}}</td>
                        <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;">{{NOME_DO_POSTO}}</td>
                        <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;">{{IP_DO_CONCENTRADOR}}</td>
                        <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;">{{MAC_ADDRESS}}</td>
                        <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;">{{TIPO_DE_INTERNET}}</td>
                        <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;">{{MODELO_DO_POSTO}}</td>
                        <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;">{{QUANTIDADE_DE_IMPRESSORA}}</td>
                        <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;">{{QUANTIDADE_DE_TVS}}</td>
                        <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;">{{SINCRONIZADO_NO_PUPPET}}</td>
                    </tr>
                    ';
            $LINHA_DINAMICA_INCLUDE = '
                <div class="form-group row">
                <tr>
                    <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;"><input type="text" class="form-control text-center" id="analistaLocal" placeholder="Analista Local"></td>
                    <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;"><input type="text" class="form-control text-center" id="analistaExterno" placeholder="Analista Remoto"></td>
                    <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;"><input type="text" class="form-control text-center" id="IBM" placeholder="IBM"></td>
                    <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;"><input type="text" class="form-control text-center" id="nomeDoPosto" placeholder="Nome do Posto"></td>
                    <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;"><input type="text" class="form-control text-center" id="ipDoConcentrador" placeholder="IP Concentrador"></td>
                    <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;"><input type="text" class="form-control text-center" id="tipoDeInternet" placeholder="Tipo de Internet"></td>
                    <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;"><input type="text" class="form-control text-center" id="modeloDoPosto" placeholder="Modelo do posto"></td>
                    <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;"><input type="text" class="form-control text-center" id="quantidadeDeImpressora" placeholder="Impressoras"></td>
                    <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;"><input type="text" class="form-control text-center" id="quantidadeDeTvs" placeholder="Tvs"></td>
                    <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;"><input type="text" class="form-control text-center" id="sincronizadoNoPuppet" placeholder="Puppet"></td>
                    <td class="text-center" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;"><input type="text" class="form-control text-center" id="MAC" placeholder="Mac Address"></td>
                </tr>
                <tr>
                <td class="text-center" colspan="11" style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;"><button id="novoItemNaLista" class="btn btn-primary">Cadastrar Novo</button></td>
                </tr>
            ';


            $instancia = new Homolocacao();

            print_r($instancia->arrayValoresPosto);

            foreach ($instancia->arrayValoresPosto as $value) {
                $nomeAnalistaLocal = str_replace('{{NOME_ANALISTA_LOCAL}}', $value->AnalistaLocal, $LINHA_DINAMICA_MODELO);
                $nomeAnalistaRemoto = str_replace('{{NOME_ANALISTA_REMOTO}}', $value->AnalistaExterno, $nomeAnalistaLocal);
                $ibm = str_replace('{{IBM}}', $value->ibm, $nomeAnalistaRemoto);
                $nomeDoPosto = str_replace('{{NOME_DO_POSTO}}', $value->nomedoPosto, $ibm);
                $ipDoConcentrador = str_replace('{{IP_DO_CONCENTRADOR}}', $value->ipdoConcentrador, $nomeDoPosto);
                $mac = str_replace('{{MAC_ADDRESS}}', $value->mac, $ipDoConcentrador);
                $tipodeInternet = str_replace('{{TIPO_DE_INTERNET}}', $value->tipodeInternet, $mac);
                $modelodoPosto = str_replace('{{MODELO_DO_POSTO}}', $value->modelodoPosto, $tipodeInternet);
                $quantidadedeImpressora = str_replace('{{QUANTIDADE_DE_IMPRESSORA}}', $value->quantidadedeImpressora, $modelodoPosto);
                $quantidadedeTvs = str_replace('{{QUANTIDADE_DE_TVS}}', $value->quantidadedeTvs, $quantidadedeImpressora);
                $sincronizadonoPuppet = str_replace('{{SINCRONIZADO_NO_PUPPET}}', $value->sincronizadonoPuppet, $quantidadedeTvs);
                echo $sincronizadonoPuppet;
            }
            echo $LINHA_DINAMICA_INCLUDE;
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
