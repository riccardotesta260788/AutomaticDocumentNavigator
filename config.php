<?php
/*Configuration file for self cration page navigation code
 * */


$conf_comune="Comune di Bistagno";
$conf_logo="/loghi/logo-com.png";
$conf_data_publicazione="22/01/2018";
//
$days_end="15";
$conf_data_stoppublicazione= date("d/m/y",strtotime("+".$days_end." days"));

//Menu links

$conf_links=[["Comune di Acqui Terme","www.comune.acquiterme.al.it"],
    ["Gare d'appalto Telematiche","https://appalti-acquese.maggiolicloud.it/PortaleAppalti/it/homepage.wp"]];

//Header
$conf_header="CUC";
$conf_main_content="COMUNE DI BISTAGNO: PROCEDURA NEGOZIATA RELATIVA AL 'CONSOLIDAMENTO RIPA SOTTOSTANTE VIA ADUA' EVENTO ALLUVIONALE NOVEMBRE 2016 ORDINANZA N.430 DEL 10/01/2017 ORDINANZA COMMISSARIALE N.6/A18.000/430 DEL 27/06/2017. CUP F84J17000300005 E CIG 755251006B.";

$folders=["DOCUMENTS","OTHERS"];
?>