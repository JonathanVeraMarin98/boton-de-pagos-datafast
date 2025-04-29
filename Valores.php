
        <?php
       
        session_start(); 
        include("conexion.php");
        
        $query= mysqli_query($conexion,"SELECT MAX(idTransaccion) AS id FROM informacion");
        if ($row = mysqli_fetch_row($query)) 
        {
          $ultimoid = trim($row[0]);
        }
        
        
        //
        //datos get
        $productonombre = $_GET['nproducto'];
        $productodescripcion = $_GET['dproducto'];
        $productoprecio = $_GET['pproducto'];
        $productocantidad = $_GET['cproducto'];
        $nombre = $_GET['nombre'];
        $Apellido = $_GET['apellido'];
        $email = $_GET['email'];
        $cedula = $_GET['cedula'];
        $segundonombre = $_GET['segundonombre'];
        $telefono = $_GET['telefono'];
        $DEntrega = $_GET['DEntrega'];
        $PEntrega = $_GET['PEntrega'];
        
        $items = array(
    
         'cart' => array(
        'items' => array(
            'product_name' => $productonombre,
            'description' => $productodescripcion,
            'price' => $productoprecio,
            'quantity' => $productocantidad,
           )     
         ));
        
          $amount = floatval($_GET['amount']);       // Valor sin IVA (base imponible)
         $iva = round($amount * 0.12, 2);            // IVA 12%
         $total = round($amount + $iva, 2);          // Total a cobrar
         $base0 = 0.00;                              // Si no tienes base 0%
 
         // Asegurar formato correcto
          $totalBase0 = number_format($base0, 2, '.', '');
           $totalTarifa12 = number_format($amount, 2, '.', '');
         $iva = number_format($iva, 2, '.', '');   
         $total = number_format($total, 2, '.', '');

        $MID_TID = "1000000505";
        $ip_addres = $_SERVER["REMOTE_ADDR"];
        //$_SESSION['entityId'] = '8ac7a4c9957f5bd001958097d2b609c9';
        $entityId = "8ac7a4c9957f5bd001958097d2b609c9";
        $checkoutId = prepareCheckout($entityId,$ip_addres,$MID_TID,$ultimoid,$total,$items,$nombre,$Apellido,$email,$cedula,$segundonombre,$telefono,$DEntrega,$PEntrega,$iva,$totalTarifa12,$totalBase0);
        // funcion que traer el checkoutId , Datafast da entityId y bearer
        
        
        function prepareCheckout($entityId,$ip_addres,$MID_TID,$ultimoid,$total,$items,$nombre,$Apellido,$email,$cedula,$segundonombre,$telefono,$DEntrega,$PEntrega,$iva,$totalTarifa12,$totalBase0) {   
	    $id= $ultimoid + 1;
        $url = "https://eu-test.oppwa.com/v1/checkouts";
            

        $data = "entityId=".$entityId.
		            "&amount=".$total.
                "&currency=USD".
               "&paymentType=DB".
               "&customer.givenName=".$nombre.
                "&customer.middleName=".$segundonombre.                
                "&customer.surname=".$Apellido.
                "&customer.ip=".$ip_addres.
                "&customer.merchantCustomerId=".$cedula.
                "&merchantTransactionId=".$id.
                "&customer.email=".$email.
                "&customer.identificationDocType=IDCARD".
                "&customer.identificationDocId=".$cedula.
                "&customer.phone=".$telefono.
                "&billing.street1=".$DEntrega.
                "&billing.country=".$PEntrega.
                "&shipping.street1=".$DEntrega.
                "&shipping.country=".$PEntrega.
                "&risk.parameters[USER_DATA2]=Army Fitness".
                "&customParameters[SHOPPER_MID]=1000000505".
                "&customParameters[SHOPPER_TID]=PD100406".
                "&customParameters[SHOPPER_PSERV]=17913101".
                "&customParameters[SHOPPER_VERSIONDF]=2".
                "&testMode=EXTERNAL".
                "&customParameters[SHOPPER_VAL_BASE0]=".$totalBase0.
                "&customParameters[SHOPPER_VAL_BASEIMP]=".$totalTarifa12.
                "&customParameters[SHOPPER_VAL_IVA]=".$iva.
                //"&customParameters[".$MID_TID."]=00810030070103910004012".$valueIva."05100817913101052012".$valueIvaTotalBase0."053012".$valueTotalIva;
        $i=0;        
        foreach ($items["cart"] as $c){
            $data.= "&cart.items[".$i."].name=".$c['product_name'];
            $data.= "&cart.items[".$i."].description=".$c['description'];
            $data.= "&cart.items[".$i."].price=".$c['price'];
            $data.= "&cart.items[".$i."].quantity=".$c['quantity'];
            $i++;
            
        }
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTg1YTY1YmY1ZTAxNWE2YzhjNzI4YzBkOTV8YmZxR3F3UTMyWA=='));
	curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
  echo $response;
	return json_decode($response)->id;
        
}
        
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pago</title>
        <script src="https://code.jquery.com/jquery.js" type="text/javascript"></script>
        
        <style>
    body {
  background: #E0E5E6;
}
.pago{
    background-color: #ffffff;
    margin-left: 27.7%;
    margin-right: 27.7%;
    margin-top: 0%;
    padding: 5%;
    padding-top: -10%;
}
.ojo{
    padding-left: 40%;
}
.boc{
    padding-left: 10%;
}
@media screen and (min-width: 321px) and (max-width: 768px){
    
    .pago{
    background-color: #ffffff;
    width: 80%;
    margin-left: 0%;
    
    margin-top: 0%;
    padding: 10%;

    
}
    
}
</style>
    </head>
    <body>
        
    <script type="text/javascript">
    var wpwlOptions = {
        onReady: function(onReady) {
            var createRegistrationHtml = '<div class="customLabel">Desea guardar de manera segura sus datos?</div> <div class="customInput"><input type="checkbox" name="createRegistration" checked /></div>';
            $('form.wpwl-form-card').find('.wpwl-button').before(createRegistrationHtml);
        },
        style: "plain",
        locale: "es",

        labels: {cvv: "Codigo de verificación", cardholder: "Nombre(Igual que en la tarjeta),"},

        registrations: {
            hideInitialPaymentForms: true
        }
    }
</script>          

             

<div id="main" style="margin-top:50px">
    <div class="row">
        <div class="col-sm">
            
        </div>
        <div class="col-sm">
    <div class="pago">
          <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId=<?php echo $checkoutId?>"></script>
                
               <form action="/datafast/confimacion.php" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>
    </div> 
        </div>
              
               
    </div>
</div>

        
    



                <script type="text/javascript">

</script>
 </body>
</html>

                  