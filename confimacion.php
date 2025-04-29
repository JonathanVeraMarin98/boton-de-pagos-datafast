<?php
function getPaymentStatus($checkoutId) {

	echo 'Checkout ID: ' . $checkoutId . '<br>';
	//$url = "https://test.oppwa.com/v1/checkouts/" . $checkoutId . "/payment";
	$url = "https://eu-test.oppwa.com/v1/checkouts/".$checkoutId;
  //$url .= "?entityId=8ac7a4c9957f5bd001958097d2b609c9";
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
                    
                    
                    
                        $resposeData =  getPaymentStatus($id);
                        echo $resposeData;     
                        
                     
              
               
          
                  

?>
