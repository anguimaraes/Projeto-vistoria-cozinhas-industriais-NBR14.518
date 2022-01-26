<?php 

include_once "../conexao.php";

	function abrirBanco(){
    $conexao = new mysqli("localhost", "root", "", "vistoria");
    return $conexao;
}

function selectAllShop(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM shop ORDER BY razaoSocial";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}

function selectAllLoja(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM loja ORDER BY nomeFantasia";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}

function formatoData($data){
            $array = explode("-", $data);
            // $data = 2016-04-14
            // $array[0]= 2016, $array[1] = 04 e $array[2]= 14;
            $novaData = $array[2]."/".$array["1"]."/".$array[0];
            return $novaData;
        }



?>