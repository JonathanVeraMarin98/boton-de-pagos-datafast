<?php
function getPaymentStatus($checkoutId) {
	$url = "https://test.oppwa.com/v1/checkouts/" . $checkoutId . "/payment";
        $url .= "?entityId=8ac7a4c7725a831b01725c3ac10b04a1";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTg1YTY1YmY1ZTAxNWE2YzhjNzI4YzBkOTV8YmZxR3F3UTMyWA=='));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
        
	return $response;
}
?>

	<?php
        include("conexion.php");
       
		 $queries = array();
                    parse_str($_SERVER['QUERY_STRING'], $queries);
                    $id = $queries['id'];
                    $patch = $queries['resourcePath'];
                    
                    
                    
                        $responseData =  getPaymentStatus($id);
                        //json de respuesta
                        $responde = json_decode($responseData);
                        print_r($responde);        
                        
                        if($responde == "000.100.110" || "000.100.112" || "900.100.200"){
                         
               $nombrecliente = json_decode($responseData)->customer->givenName;   
               $apellidoCliente = json_decode($responseData)->customer->surname;
               $correoCliente = json_decode($responseData)->customer->email;
               $totalcliente = json_decode($responseData)->amount;
               $fecha = json_decode($responseData)->timestamp;
               $descripcion = json_decode($responseData)->cart->items[0]->description;
               $lasdigitos = json_decode($responseData)->card->last4Digits;
               $transaccion = json_decode($responseData)->merchantTransactionId;
               
               $conexion->set_charset("utf8");
               $sql = "INSERT INTO informacion(idTransaccion,nombre,ultimosdigitos,valor,fecha)"
               . "VALUES ('$transaccion','$nombrecliente','$lasdigitos','$totalcliente','$fecha')";
               $result = mysqli_query($conexion, $sql);
                if ($result === false ) {
                printf("error: %s\n", mysqli_error($conexion));
                 }
                else {
 
                }
              
               
             //envioor a correo
            
              $destinatario = $correoCliente;
              $destinatario2 = "r.stalin@hotmail.com";
              $asunto = "Informacion del cliente - Nueva Transaccion";
              
              $carta = '<!DOCTYPE html>'.
'<html lang="en" >'.
'<head>'.
  '<meta charset="UTF-8">'.
  '<title>Correo</title>'.
  '<meta name="viewport" content="width=device-width">'.
          '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">'.
        '<script src="https://kit.fontawesome.com/a076d05399.js"></script>'.
        '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>'.
'<style>'.

'</style>'.
'</head>'.
'<body>'.
    '<div id="main" style="margin-left: 20%;">'.
    '<h4>Gracias por tu pago!</h4>'.
    '<h6>Pago realizado por:</h6>'.
   ' <p><i class="fa fa-user" style="color: #0066ff"></i>'. $nombrecliente .' '. $apellidoCliente .'</p>'.
   ' <div style="height: 3px; margin-top: 2px; background-color: #0066ff; margin-right: 77%;"></div>'.
 '    <h6>Fecha de pago</h6>'.
  '  <p><i class="far fa-calendar-alt" style="color: #0066ff"></i>'. $fecha .'</p>'.
   '     <div style="height: 3px; margin-top: 2px; background-color: #0066ff; margin-right: 77%;"></div>'.
   ' <h6> Correo</h6>'.
   ' <p><i class="fa fa-envelope" style="color: #0066ff"></i>'. $correoCliente. '</p>'.
     '   <div style="height: 3px; margin-top: 2px; background-color: #0066ff; margin-right: 77%;"></div>'.
    '<h6> Valor</h6>'.
   ' <p><i class="fa fa-credit-card" style="color: #0066ff"></i>'. $totalcliente. '</p>'.
  '   <div style="height: 3px; margin-top: 2px; background-color: #0066ff; margin-right: 77%;"></div>'.
       '<h6> Concepto</h6>'.
   ' <p><i class="fa fa-info-circle" style="color: #0066ff"></i>'. $descripcion. '</p>'.                
    '</div>'.
'</body>'.
'</html>';		
	$cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $cabeceras .= 'FROM: Pago Curso';

        mail($destinatario, $asunto, $carta, $cabeceras);
     mail($destinatario2, $asunto, $carta, $cabeceras);
                            
                         //echo "<script> location.href ='https://pasarelapago.000webhostapp.com/Mensajes.php'; </script>";
                         }
                         else
                         {
                             echo "<script> alert('No valido')</script>";
                         }
                  

?>
