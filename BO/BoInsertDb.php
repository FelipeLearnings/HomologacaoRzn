<?php

include "../phpUtils/conn.php";

/**
 * Created by PhpStorm.
 * User: Felipe Gerbelli
 * Date: 23/11/2016
 * Time: 15:04
 */
class dbInsert
{
    public $AnalistaLocal;
    public $AnalistaExterno;
    public $ibm;
    public $nomeDoPosto;
    public $ipDoConcentrador;
    public $tipoDeInternet;
    public $modeloDoPosto;
    public $quantidadeDeImpressora;
    public $quantidadeDeTvs;
    public $sincronizadoNoPuppet;
    public $macAddress;

    public function __construct()
    {

    }

    public function dbInsert()
    {
        $readHomologacao = new $this();

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
                          $readHomologacao->AnalistaLocal, 
                          $readHomologacao->AnalistaExterno, 
                          $readHomologacao->ibm, 
                          $readHomologacao->nomeDoPosto,
                          $readHomologacao->ipDoConcentrador, 
                          $readHomologacao->tipoDeInternet,
                          $readHomologacao->modeloDoPosto,
                          $readHomologacao->quantidadeDeImpressora,
                          $readHomologacao->quantidadeDeTvs,
                          $readHomologacao->sincronizadoNoPuppet,
                          $readHomologacao->macAddress
                          )";
    }
}