<?php
    //cabecera texto plano
    header("Content-Type: text/plain; charset=iso-8859-1");
    
    //informaci�n base datos
    $sDBServer = "localhost";
    $sDBName = "test";
    $sDBUsername = "root";
    $sDBPassword = "";

    //incluye JSON-PHP e instancia el objeto
    require_once("JSON.php");
    $oJSON = new JSON();
    
    //obtiene los datos que fueron enviados
    $oDatos = $oJSON->decode($HTTP_RAW_POST_DATA);
    $aSugerencias = array();

    //se asegura que hay texto
    if(strlen($oDatos->text) > 0){

        //crea el string de la consulta SQL
        $sQuery = "select name from ".$oDatos->requesting." where name like '".
                  $oDatos->text."%' order by name ASC limit 0,".$oDatos->limit;
              
        //hace la conexi�n a la base de datos
        $oLink = mysql_connect($sDBServer,$sDBUsername,$sDBPassword);
        @mysql_select_db($sDBName) or die("No se puede conectar a la base de datos");
        
        if($oResultado = mysql_query($sQuery)){
            while($aValores = mysql_fetch_array($oResultado,MYSQL_ASSOC)){            
                array_push($aSugerencias, $aValores['Name']);
            }
        }
    
        mysql_free_result($oResultado);
        mysql_close($oLink);
        
    }
    
   $sSalida= ($oJSON->encode($aSugerencias));
    
    $sSalida= str_replace("Alava","�lava",$sSalida);
    $sSalida= str_replace("Almeria","Almer�a",$sSalida);
	$sSalida= str_replace("Avila","�vila",$sSalida);
	$sSalida= str_replace("Caceres","C�ceres",$sSalida);
	$sSalida= str_replace("Cadiz","C�diz",$sSalida);
	$sSalida= str_replace("Castellon","Castell�n",$sSalida);
	$sSalida= str_replace("Cordoba","C�rdoba",$sSalida);
	$sSalida= str_replace("Guipuzcoa","Guip�zcoa",$sSalida);
	$sSalida= str_replace("La Coruna","La Coru�a",$sSalida);
	$sSalida= str_replace("Leon","Le�n",$sSalida);
	$sSalida= str_replace("Malaga","M�laga",$sSalida);
	
	
	
   echo  $sSalida;
?>
