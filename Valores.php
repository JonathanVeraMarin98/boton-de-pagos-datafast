
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

        $valor = $_GET['amount'];
        $total1 = number_format($valor, 2, '.', ',');
        $valoriva = $total1 * 0.12;
        $subtotal1 = $total1 + $valoriva;
        $total2 = 0 + $subtotal1;
        $total = number_format($total2, 2, '.', ',');
        //Datos datafast
        $valoriva1 = $valoriva * 100;
        $valoriva12 = str_pad($valoriva1,12,'0',STR_PAD_LEFT);
        $iva           = $valoriva12;  
        $valor = $valor * 100;
        $Tarifa12 = str_pad($valor,12,'0',STR_PAD_LEFT);

        $totalTarifa12 = $Tarifa12;

        $totalBase0    = 0;
        $MID_TID = "1000000505_PD100406";
        $ip_addres = $_SERVER["REMOTE_ADDR"];
        $_SESSION['entityId'] = '8ac7a4c7725a831b01725c3ac10b04a1';
       
        $checkoutId = prepareCheckout($ip_addres,$MID_TID,$ultimoid,$total,$items,$nombre,$Apellido,$email,$cedula,$segundonombre,$telefono,$DEntrega,$PEntrega,$iva,$totalTarifa12,$totalBase0);
        // funcion que traer el checkoutId , Datafast da entityId y bearer
        
        
        function prepareCheckout($ip_addres,$MID_TID,$ultimoid,$total,$items,$nombre,$Apellido,$email,$cedula,$segundonombre,$telefono,$DEntrega,$PEntrega,$iva,$totalTarifa12,$totalBase0) {   
	    $id= $ultimoid + 1;
        $url = "https://test.oppwa.com/v1/checkouts";
        $iva = str_replace('.', '', $iva);
        $totalTarifa12 = str_replace('.', '', $totalTarifa12);
        $totalBase0 = str_replace('.', '', $totalBase0);
        $valueIva = str_pad($iva,12,'0',STR_PAD_LEFT);
        $valueTotalIva = str_pad($totalTarifa12,12,'0',STR_PAD_LEFT);
        $valueIvaTotalBase0 = str_pad($totalBase0,12,'0',STR_PAD_LEFT);
        $data = "authentication.entityId=".$_SESSION['entityId'].
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
                "&risk.parameters[USER_DATA2]=DATAFAST".
                "&testMode=EXTERNAL".
                "&customParameters[".$MID_TID."]=00810030070103910004012".$valueIva."05100817913101052012".$valueIvaTotalBase0."053012".$valueTotalIva;
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
        
        <script>
     var wpwlOptions = {
      style: "plain",
      locale: "es" ,
       onReady: function() {
      $('.wpwl-label-cvv').html('CVV');  
    }
    };

</script>
                

             

<div id="main">
    <div class="row">
        <div class="col">
            
            <!--

Follow me on
Dribbble: https://dribbble.com/supahfunk
Twitter: https://twitter.com/supahfunk
Codepen: https://codepen.io/supah/

-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;" />
<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
  body { margin: 0; padding: 0; background: #e1e1e1; }
  div, p, a, li, td { -webkit-text-size-adjust: none; }
  .ReadMsgBody { width: 100%; background-color: #ffffff; }
  .ExternalClass { width: 100%; background-color: #ffffff; }
  body { width: 100%; height: 100%; background-color: #e1e1e1; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; }
  html { width: 100%; }
  p { padding: 0 !important; margin-top: 0 !important; margin-right: 0 !important; margin-bottom: 0 !important; margin-left: 0 !important; }
  .visibleMobile { display: none; }
  .hiddenMobile { display: block; }

  @media only screen and (max-width: 600px) {
  body { width: auto !important; }
  table[class=fullTable] { width: 96% !important; clear: both; }
  table[class=fullPadding] { width: 85% !important; clear: both; }
  table[class=col] { width: 45% !important; }
  .erase { display: none; }
  }

  @media only screen and (max-width: 420px) {
  table[class=fullTable] { width: 100% !important; clear: both; }
  table[class=fullPadding] { width: 85% !important; clear: both; }
  table[class=col] { width: 100% !important; clear: both; }
  table[class=col] td { text-align: left !important; }
  .erase { display: none; font-size: 0; max-height: 0; line-height: 0; padding: 0; }
  .visibleMobile { display: block !important; }
  .hiddenMobile { display: none !important; }
  }
</style>


<!-- Header -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tr>
    <td height="20"></td>
  </tr>
  <tr>
    <td>
      <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 10px 10px 0 0;">
        <tr class="hiddenMobile">
          <td height="40"></td>
        </tr>
        <tr class="visibleMobile">
          <td height="30"></td>
        </tr>

        <tr>
          <td>
            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
              <tbody>
                <tr>
                  <td>
                    <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                      <tbody>
                        <tr>
                          <td align="left" style="color: #000; font-family: 'monospace'"> Informacion</td>
                        </tr>
                        <tr class="hiddenMobile">
                          <td height="40"></td>
                        </tr>
                        <tr class="visibleMobile">
                          <td height="20"></td>
                        </tr>
                        <tr>
                          <td style="font-size: 15px; color: #000; font-family: 'monospace', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                            Hola, <?php echo $nombre." ".$Apellido?>
                            <br> Muchas Gracias por preferirnos.
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                      <tbody>
                        <tr class="visibleMobile">
                          <td height="20"></td>
                        </tr>
                        <tr>
                          <td height="5"></td>
                        </tr>
                        <tr class="hiddenMobile">
                          <td height="50"></td>
                        </tr>
                        <tr class="visibleMobile">
                          <td height="20"></td>
                        </tr>
                        <tr>
                          <td style="font-size: 15px; color: #000; font-family: 'monospace', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                            <small>ORDER</small> <?php echo $ultimoid = $ultimoid + 1?><br />
                            <small><?php date_default_timezone_set("Etc/GMT+5");
                                           echo date("F j, Y, g:i a"); ?></small>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<!-- /Header -->
<!-- Order Details -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tbody>
    <tr>
      <td>
        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
          <tbody>
            <tr>
            <tr class="hiddenMobile">
              <td height="60"></td>
            </tr>
            <tr class="visibleMobile">
              <td height="40"></td>
            </tr>
            <tr>
              <td>
                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                  <tbody>
                    <tr>
                      <th style="font-size: 15px; font-family: 'monospace', sans-serif; color: #000; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;" width="52%" align="left">
                        Item
                      </th>
                      <th style="font-size: 15px; font-family: 'monospace', sans-serif; color: #000; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="left">
                        <small>Descripcion</small>
                      </th>
                      <th style="font-size: 15px; font-family: 'monospace', sans-serif; color: #000; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="center">
                        Cantidad
                      </th>
                      <th style="font-size: 15px; font-family: 'monospace', sans-serif; color: #000; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="right">
                        Subtotal
                      </th>
                    </tr>
                    <tr>
                      <td height="1" style="background: #bebebe;" colspan="4"></td>
                    </tr>
                    <tr>
                      <td height="10" colspan="4"></td>
                    </tr>
                    <tr>
                      <td style="font-size: 15px; font-family: 'monospace', sans-serif; color: #ff0000;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">
                        <?php 
                        $i=0;
                        foreach ($items["cart"] as $c){
                            
                           echo $c['product_name'];
                        }
                        ?>
                      </td>
                      <td style="font-size: 15px; font-family: 'monospace', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><small>                        <?php 
                        $i=0;
                        foreach ($items["cart"] as $c){
                            
                           echo $c['description'];
                        }
                        ?></small></td>
                      <td style="font-size: 15px; font-family: 'monospace', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center">                        <?php 
                        $i=0;
                        foreach ($items["cart"] as $c){
                            
                           echo $c['quantity'];
                        }
                        ?></td>
                      <td style="font-size: 15px; font-family: 'monospace', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right">                       
                        <?php
                        echo "$".$total1;
                        ?></td>
                    </tr>
                    <tr>
                      <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                    </tr>
                    <tr>
                      <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td height="20"></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<!-- /Order Details -->
<!-- Total -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tbody>
    <tr>
      <td>
        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
          <tbody>
            <tr>
              <td>

                <!-- Table Total -->
                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                  <tbody>
                    <tr>
                      <td style="font-size: 15px; font-family: 'monospace', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                        Subtotal
                      </td>
                      <td style="font-size: 15px; font-family: 'monospace', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;" width="80">
                        <?php
                        echo "$".$total1;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-size: 15px; font-family: 'monospace', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                        IVA; 
                      </td>
                      <td style="font-size: 15px; font-family: 'monospace', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                        <?php
                        echo "$".$valoriva;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-size: 15px; font-family: 'monospace', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                        <strong>Total</strong>
                      </td>
                      <td style="font-size: 15px; font-family: 'monospace', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                        <strong><?php
                        echo "$".$total;
                        ?></strong>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <!-- /Table Total -->

              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<!-- /Total -->
<!-- Information -->


        </div>
        <div class="col-sm">
    <div class="pago">
          <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId=<?php echo $checkoutId?>"></script>
                
               <form action="https://pasarelapago.000webhostapp.com/confimacion.php" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>
    </div> 
        </div>
              
               
    </div>
</div>

        
    



                <script type="text/javascript">

</script>
 </body>
</html>

                  