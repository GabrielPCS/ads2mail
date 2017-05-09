<?
##############################################################
# Ads.2.Mail Ver 2.0
# Desarrollado por: Gabriel Martínez Portilla
# Web:				www.pcsoluciones.net
# Correo:			gabrielmportilla@gmail.com
# Twitter:			@pcsolucionesnet
# Fabebook: 		facebook.com/gabrielpcs
# Fabebook: 		facebook.com/PCSoluciones.Net
##############################################################
# L I C E N C I A  
# Bajo Licencia Creative Commons Atribución Compartir Igual 3.0	
# http://creativecommons.org/licenses/by-sa/3.0/deed.es
# Compartir - copiar, distribuir, ejecutar y comunicar públicamente la obra
# Hacer obras derivadas
# Atribución — Debe reconocer los créditos de la obra de la manera especificada por el autor
# Compartir bajo la Misma Licencia — Si altera o transforma esta obra, o genera una obra derivada, sólo puede distribuir la obra generada bajo una licencia idéntica a ésta
##############################################################
# I M P L E M E N T A C I O N 
# Ejecutar / Incluir al principio de tu Landing Page / Página de Aterrizaje
# Recibiras un correo cada vez que recibas una visita a travéz de Google Adwords o Facebok con la siguiente información:
# KEYWORD: La palabra clave que activo tu anuncio. DEJO DE FUNCIONAR POR CAMBIOS EN GOOGLE
# HTTP_USER_AGENT: Navegador y Sistema Operativo que uso el visitante.
# REMOTE_ADDR: IP del Visitante, al darle click te lleva a su localización geográfica mediante el servidor que este configurado en $geo
# HTTP_REFERER: Es la cadena original de búsqueda con la que el usuario entro a tu anuncio, muy util para encontrar palabras negativas.
###############################################################
# C O N F I G U R A C I O N
$webmaster="tucorreo@gmail.com";   # PON AQUI EL CORREO AL CUAL QUIERES QUE TE LLEGUEN LOS AVISOS 
$bcc="";
$geo="http://es.geoipview.com/?q=";
#$geo="http://www.elhacker.net/geolocalizacion.html?host=";


##############################################################

$q = $_GET['q']; # NO ESTA FUNCIONANDO POR CAMBIOSEN GOOGLE, ORIGINALMENTE RECUPERABA LA PALABRA CLAVE QUE ACTIVO EL ANUNCIO  

$HTTP_USER_AGENT=$_SERVER['HTTP_USER_AGENT'];
$REMOTE_ADDR=$_SERVER['REMOTE_ADDR'];
$HTTP_REFERER=$_SERVER['HTTP_REFERER'];
$HTTP_HOST=$_SERVER['HTTP_HOST'];

#############################################################
$subjet="ADS2Mail [$HTTP_HOST]";
$headers= "MIME-Version: 1.0\r\n";
$headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers.= "From: Google.AdWords <$webmaster>\r\n";
$headers.= "Bcc: $bcc\r\n";
#$mensaje.="<b>KEYWORD :</b>$q<br/>"; Dejo de funcionar por cambios en google
$mensaje.="<b>HTTP_USER_AGENT :</b>$HTTP_USER_AGENT<br/>";
$mensaje.="<b>REMOTE_ADDR :</b><a href='$geo$REMOTE_ADDR'>$REMOTE_ADDR</a><br/>";
$mensaje.="<b>HTTP_REFERER :</b><a href='$HTTP_REFERER'>$HTTP_REFERER</a><br/>";
$mensaje.="<br><p><b>ADS2Mail Ver. 2.0 &copy; 2017 <a href='http://pcsoluciones.net'>PCSoluciones.Net</a></b></p>";
mail($webmaster,$subjet,$mensaje,$headers) ;

?>