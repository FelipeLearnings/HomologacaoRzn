$(document).ready(function () {
    $("#novoItemNaLista").on("click", function (event) {

        var analistaLocal = $("#analistaLocal").val();
        var analistaRemoto = $("#analistaRemoto").val();
        var IBM = $("#IBM").val();
        var nomedoPosto = $("#nomedoPosto").val();
        var ipdoConcentrador = $("#ipdoConcentrador").val();
        var tipordeInternet = $("#tipodeInternet").val();
        var modelodoPosto = $("#modelodoPosto").val();
        var quantidadedeImpressora = $("#quantidadedeImpressora").val();
        var quantidadedeTvs = $("#quantidadedeTvs").val();
        var sincronizadonoPuppet = $("#sincronizadonoPuppet").val();
        var MAC = $("#MAC").val();

        var arr_infos = {
            analistaLocal:            analistaLocal,
            analistaRemoto:           analistaRemoto,
            IBM:                      IBM,
            nomedoPosto:              nomedoPosto,
            ipdoConcentrador:         ipdoConcentrador,
            tipordeInternet:          tipordeInternet,
            modelodoPosto:            modelodoPosto,
            quantidadedeImpressora:   quantidadedeImpressora,
            quantidadedeTvs:          quantidadedeTvs,
            sincronizadonoPuppet:     sincronizadonoPuppet,
            MAC:                      MAC
        };
        // console.log(arr);
        // console.log(arr_infos);

        //Joson
        
        $.ajax({
            type: "POST",
            url: "/Homologacao/phpUtils/dbProcess.php",
            data: arr_infos,
            dataType: 'JSON',
            success: function (response) {
                console.log(response);
                //
                // for (var i in response) {
                //     console.log(response[i].MAC);
                // }
            }
        });
        //Joson
    });
    
    //Click na lista
});