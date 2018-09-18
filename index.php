<?php
/**
 * Development: Riccardo Testa - 2018
 * mail: riccardotesta@titansolution.it
 * System for self generated page container for data repository
 * Usage Bootstrap e DataTable libraries.
 */
?>

<?php
require "utils.php";
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    getHeaders();
    ?>
</head>

<body>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <ul class="nav navbar-nav" style="height:100%">
                <?php foreach ($conf_links as $link){ ?>
                <li class="active" style="color:white; background:#337ab7; height:100%">
                    <a class="navbar-brand" href="http://<?php echo $link[1]; ?>"><?php echo $link[0]; ?></a>
                </li>
                <? } ?>
        </ul>

    </div>
</nav>
<div class="container">


    <h1 class="intestazione-bandi"><?php if (isset($conf_header)){echo $conf_header;} ?></h1>
    <div class="jumbotron" style="background:url(background.jpg); background-size:cover">

        <div style="background-color:rgba(179, 217, 255,0.8); padding:2%">
            <div class="row">
                <div class="col-md-3">
                    <?php
                    /*Chek if variable is set read value in config file or is not read folder name */
                    ?>
                    <p class="comune-int">
                        <?php if (!isset($conf_comune)) {echo getFolder(1);}
                        else {echo $conf_comune; } ?>
                    </p>

                    <img style="width:100%" src="<?php if (isset($conf_logo)) {echo $conf_logo;} ?>">
                </div>
                <div class="col-md-9">
                    <p class="band-publ-date">Data pubblicazione:<b>
                            <?php if (isset($conf_data_publicazione)) {echo $conf_data_publicazione;}
                            ?> - <?php if (isset($conf_data_stoppublicazione)) {echo $conf_data_stoppublicazione;}?></b>
                    </p>
                    <p class="band-text-abstract">
                        <?php if (isset($conf_main_content)) {echo $conf_main_content;}
                        ?>
                    </p>
                    <?php
                     //Lista file cartella principale suddivisi in PDF e ZIP
                        list_filesbyext("../" . getFolder(0) . "/MAIN/", "pdf");
                        list_filesbyext("../" . getFolder(0) . "/MAIN/", "zip");
                                       ?>

                </div>
            </div>


        </div>
    </div>
    <p>
    <h3>Indicazioni per l'utilizzo:</h3>
    La presente pagina contiene gli allegati allegati suddivisi per sezioni. <br> Cliccando i pulsanti sottostanti si
    apriranno gli elenchi nei quali poter scaricare gli allegati.
    </p>

    <?php
    foreach ($folders as $folder) {
        fileTree($folder);
    }
    ?>


</div>


<footer class="footer">
    <div style="padding:2%; background:#337ab7; margin:2%; color:white"><p style="text-align: center;">
            <strong>PIVA</strong>:0000 -&nbsp;<strong>PEC</strong>: info@titansolution.it - <strong>Telefono:</strong>
            000</p>
        <p style="text-align: center;"><strong>Titansolution 2017<br>
                <small>Data coding Riccardo Testa</small>
            </strong></p>
    </div>

</footer>


</div>

</body>
</html>
