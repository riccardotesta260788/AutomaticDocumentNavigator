<?php
/**
 * Created by Riccardo Testa.
  * Date: 10/11/2017
 * Time: 17:10
 */
error_reporting(E_ALL ^ E_WARNING);

function getDirs($path){
$dirs = array_filter(glob($path.'/*'), 'is_dir');
return $dirs;}

function getFolder($pos){
$dir=dirname(__FILE__);
$direx=explode("/",$dir);

$siz=sizeof($direx);
if($pos==null || $pos>$siz){
return $direx[$siz-1];
}
else{
    return $direx[$siz-$pos];
}
}

function getHeaders(){
    ?>
    <title>CUC - Comune di Acqui Terme</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins');
        .comune-int{
            font-size:1.5em!important;
            text-align:center;
            text-transform: uppercase;
        }
        .band-text-abstract{
            font-size:1em!important;
            text-align:justify;
        
        }
        .band-publ-date{
            font-size:0.9em!important;
            font-weight:700;
            text-transform: uppercase;
        }
        .intestazione-bandi{
            padding:2%;
            font-size:3em!important;
            text-align:center;
            width:100%;
            background:rgb(204, 230, 255);
           font-family: 'Poppins', sans-serif;
        }
    </style>
    <?php
}
function getFiles($path)
{
    $path=$path."/";
    $files = scandir($path);
    asort($files);
    return $files;
}
function getPrintTableDocs($files, $dir)
{
    $path=$dir;
     $dir=$dir."/";
     $id=$path;
     $idex=str_replace("DOCUMNETS/","",$id);
     $id=str_replace('/','-',$id);
    

    ?>
    
    <a class="btn btn-primary" data-toggle="collapse" href="#div<?php echo $id;?>"><?php   echo $idex;?></a>
    
   <div class="collapse" id="div<?php echo $id;?>" style=" background:url(background.jpg); padding:5%;">
       <p>L'utente può effettuare la ricerca di un documento specifico utilizzando la lo spazio indicato dalla parola <b>search</b>.</p>
    <table id="<?php echo $id;?>"  class="table table-sm" cellspacing="0" width="100%" style="background:rgba(255,255,255,0.8); padding:5%">
        <thead>
        <tr>
            <th>Documento</th>
            <th>Pdf</th>
            <th>Dimensione</th>

        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Documento</th>
            <th>Pdf</th>
            <th>Dimensione</th>
        </tr>
        </tfoot>

        <tbody>

        <?php

        foreach ($files as $el) {
            
            if ($el == "." || $el == "..") {

            } else {
                $el = preg_replace('!\s+!', ' ', $el);  
                
                ?>
                <tr>

                    <td><?php echo $el; ?></td>
                    <td>
                        <?php
                        $ext= pathinfo($el, PATHINFO_EXTENSION);
                        if($ext=="pdf"){
                            ?>
                            <a href='<?php echo $dir . "" . $el; ?>' type="button" class="btn btn-danger" target="_blank">
                            <i class="fas fa-file-pdf" style="font-size:15px"></i> Scarica il PDF
                        </a>
                            <?php
                            
                        }
                        else if($ext=="xls"){
                            ?>
                            <a href='<?php echo $dir . "" . $el; ?>' type="button" class="btn btn-success" target="_blank">
                           <i class="fas fa-file-xls" style="font-size:15px"></i> Scarica il file XLS
                        </a>
                            <?php
                            
                        }
                        else if($ext=="doc"){
                            ?>
                            <a href='<?php echo $dir . "" . $el; ?>' type="button" class="btn btn-primary" target="_blank">
                            <i class="fas fa-file-word" style="font-size:15px"></i> Scarica il file DOC
                        </a>
                            <?php
                        }
                        else if($ext=="jpg"){
                            ?>
                            <a href='<?php echo $dir . "" . $el; ?>' type="button" class="btn btn-info" target="_blank">
                            <i class="fas fa-file-image" style="font-size:15px"></i> Scarica l'immagine
                        </a>
                            <?php
                        }
                         else if($ext=="zip"){
                            ?>
                            <a href='<?php echo $dir . "" . $el; ?>' type="button" class="btn btn-warning" target="_blank">
                            <i class="fas fa-archive" style="font-size:15px"></i> Scarica l'archivio
                        </a>
                            <?php
                        }
                        else{
                        ?>
                        
                        <a href='<?php echo $dir . "" . $el; ?>' type="button" class="btn btn-primary" target="_blank">
                            <i class="fa fa-file-o" style="font-size:15px"></i> Scarica il file
                        </a>
                        <?php }?>
                    </td>
                    <td>
                        <?php
                        $bytes = filesize($dir . $el);
                        if($bytes!=0){
                        $bytes = number_format($bytes / 1048576, 2) . ' MB';
                        }
                        else{
                             $bytes ='0 MB';
                        }
                        echo "(" . $bytes . ")"; ?>
                    </td>


                </tr>
            <?php }
        } ?>
        </tbody>
    </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#<?php print $id;?>').DataTable({
            "lengthMenu": [[ -1,10, 25, 50], ["Tutti",10, 25, 50]]
                
            });
        } );
    </script>
    <?php
}
function list_filesbyext($mydirectory,$ext) {
	
	// directory we want to scan
	$dircontents = scandir($mydirectory);
	
	
	// list the contents
	$code="<p style='column-count:3'>";
	$fils=0;
	
	foreach ($dircontents as $file) {
	
		$extension = pathinfo($file,PATHINFO_EXTENSION);
		
		if ($extension == $ext) {
		    //echo "<br>".$file."--".$extension."..".$ext;
		    
		    if($ext=="pdf"){
		    //echo "<br>verify</br>";
			$code = $code. "<a href='".$mydirectory.$file."' type='button' class='btn btn-danger' target='_blank'>
                            <i class='fa fa-file-pdf-o' style='font-size:15px'></i> $file
                        </a>";
		    $fils+=1;
		    //echo "<br>".$fils."--".$code;
		    }
			else{
			    $code =$code. "<a href='".$mydirectory.$file."' type='button' class='btn btn-danger' target='_blank'>
                            <i class='fa fa-file-o' style='font-size:15px'></i> $file
                        </a>";
			}
		    
		
		}
		//echo $fils;
		
		
	$code=$code."</p>";
	
	}if($fils>1){
		    echo "<h3>Scarica i documenti in formato ".$ext."</h3>";
		    echo $code;
		}

}
 function fileTree($path){
        /**
         *Funzione per la creazione della struttura della cartella collegata ai documenti.
         * L'algoritmo fa una scansione delle sottocartelle e per ognuna crea una tabella con i docuneti
         */
    $dirs=getDirs($path);
    $size=sizeof($dirs);
    
    while($size!=0){ 
        $size=$size-1;
        //echo "<br>CARTELLA:".$dirs[$size];
        
            //Verifica la presenza di sotto 
            $realpath=$dirs[$size];
            $subdirs=getDirs($realpath);
            $subsize=sizeof($subdirs);
            
            //echo "<br><b>Percorso:</b>".$realpath."\t".$subsize."<br>";
            if($subsize>0){
                fileTree($realpath);
            }
            else{
            $files= getFiles($realpath);
        
            getPrintTableDocs($files,$realpath);   
            }
            
    }
    return true;
    }
?>