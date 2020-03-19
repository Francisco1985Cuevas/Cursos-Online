<?php
    //cabecera texto plano
    header("Content-Type: text/plain; charset=iso-8859-1");
    
    //información base datos
    $sDBServidor = "localhost";
    $sDBNombre = "test";
    $sDBUsuario = "root";
    $sDBPassword = "";

    //incluye JSON-PHP e instancia el objeto
    require_once("JSON.php");
    $oJSON = new JSON();
    
    //obtiene los datos que fueron enviados
    $oDatos = $oJSON->decode($HTTP_RAW_POST_DATA);
    $aSugerencias = array();

    //se asegura que haya texto en la caja de texto
    if(strlen($oDatos->text) > 0){

        //crea el string de la consulta SQL
        $sConsulta = "	select Name 
						from ".$oDatos->requesting." 
						where Name like '".$oDatos->text."%' 
						order by Name ASC 
						limit 0,".$oDatos->limit;
              
        //hace la conexión a la base de datos
        $oLink = mysql_connect($sDBServidor, $sDBUsuario, $sDBPassword);
        @mysql_select_db($sDBNombre) or die("No se puede conectar a la Base de datos");
        
        if($oResultados = mysql_query($sConsulta)){
            while($aValores = mysql_fetch_array($oResultados, MYSQL_ASSOC)){            
                array_push($aSugerencias, $aValores['Name']);
            }
        }
    
        mysql_free_result($oResultados);
        mysql_close($oLink);
        
    }
    
   $sSalida= ($oJSON->encode($aSugerencias));
    
    $sSalida= str_replace("Alava","Álava",$sSalida);
    $sSalida= str_replace("Almeria","Almería",$sSalida);
	$sSalida= str_replace("Avila","Ávila",$sSalida);
	$sSalida= str_replace("Caceres","Cáceres",$sSalida);
	$sSalida= str_replace("Cadiz","Cádiz",$sSalida);
	$sSalida= str_replace("Castellon","Castellón",$sSalida);
	$sSalida= str_replace("Cordoba","Córdoba",$sSalida);
	$sSalida= str_replace("Guipuzcoa","Guipúzcoa",$sSalida);
	$sSalida= str_replace("La Coruna","La Coruña",$sSalida);
	$sSalida= str_replace("Leon","León",$sSalida);
	$sSalida= str_replace("Malaga","Málaga",$sSalida);
	
	
	echo  $sSalida;
?>