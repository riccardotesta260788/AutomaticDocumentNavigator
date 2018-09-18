<?php
/*Configuration file for self cration page navigation code
 * */


$conf_comune="TEST General";
$conf_logo="/loghi/logo-com.png";
$conf_data_publicazione="22/01/2018";
//
$days_end="15";
$conf_data_stoppublicazione= date("d/m/y",strtotime("+".$days_end." days"));

//Menu links

$conf_links=[["linka","http://www.google.it"],
    ["linkb","https://www.ansa.it"]];

//Header
$conf_header="HEADER !";
$conf_main_content="Can you write content or HTML code here!!!";

$folders=["DOCUMENTS","OTHERS"];
?>