<?php


require_once '../phpUtils/conn.php';
require_once '../BO/HomologacaoDto.php';

if (!defined('QUERY_SELECT_ALL')) define('QUERY_SELECT_ALL', 'SELECT * FROM homologacao'); /* usar query por arquivo*/

class HomologacaoCrud{

    private $conn;

    public function __construct(){
        $this->conn = DbConnection::initDbConn();
    }

    public function create(HomolocacaoDto $homolocacaoDto){

        $sqlInsert = "INSERT INTO homologacao
                        (
                          AnalistaLocal,
                          AnalistaExterno,
                          ibm,
                          nomeDoPosto,
                          ipDoConcentrador,
                          tipoDeInternet,
                          modeloDoPosto,
                          quantidadeDeImpressora,
                          quantidadeDeTvs,
                          sincronizadoNoPuppet,
                          macAddress
                         ) VALUES (
                              $homolocacaoDto->AnalistaLocal,
                              $homolocacaoDto->AnalistaExterno,
                              $homolocacaoDto->ibm,
                              $homolocacaoDto->nomeDoPosto,
                              $homolocacaoDto->ipDoConcentrador,
                              $homolocacaoDto->tipoDeInternet,
                              $homolocacaoDto->modeloDoPosto,
                              $homolocacaoDto->quantidadeDeImpressora,
                              $homolocacaoDto->quantidadeDeTvs,
                              $homolocacaoDto->sincronizadoNoPuppet,
                              $homolocacaoDto->macAddress
                          )";

        //TODO: 1. falta abrir conn
        //      2. falta inserir no banco via sql (usar $sqlInsert)
    }

    public function findAll(){
        $result = $this->conn->query(QUERY_SELECT_ALL);
        $arr    = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_all()) {
                foreach ($row as $item) {

                    $instancia = new HomolocacaoDto();

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
                    array_push($arr, $instancia);
                }
            }

            $this->conn->close();

            if(count($arr)>0)
                return $arr;
            throw new Exception('Detect inconsistent state!');
        } else {
            throw new Exception('There is no value!');
        }
    }


}