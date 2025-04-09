<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Pagos</title>
  <meta name="viewport" content="width=device-width">
 	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================--> 
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css'>
<style>
    body {
  background: #CCE6E9;
  
  .input1{
      
  }
}
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<main>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" id="form">
				<span class="contact100-form-title">
					Seleccion de Paquete
				</span>

				

				<div class="wrap-input100 input100-select bg1" id="radio">
					<span class="label-input100">Selecciona tu paquete</span>
					<div >
                                            
                                             <input type="radio" id="selector1" name="selector" value="100.00">
                                             <label for="male">Basico&nbsp;&nbsp;&nbsp;&nbsp; - $100</label><br>
                                             <input type="radio" id="selector2" name="selector" value="350.00">
                                             <label for="female">Pro &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;- $350</label><br>
                                             <input type="radio" id="selector3" name="selector" value="500.00">
                                             <label for="other">Premium - $500</label>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
                                <div class="wrap-input100 bg1" id="esconder">
					<span class="label-input100">Escribe otro valor a pagar*</span>
					<input class="input100" type="text" name="name" placeholder="Ingresa otra cantidad" id="othervalue">
				</div>

				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Completa todos los campos">
					<span class="label-input100">Concepto de Pago</span>
					<textarea class="input100" name="message" placeholder="Escriba aqui...." id="concepto"></textarea>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" id="Btn">
						<span>
							Siguiente
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

    

</main>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.2/jquery.payment.min.js'></script>
<script  src="./script.js"></script>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){  
      $("#selector1").click(function() {  
        if($("#selector1").is(':checked')) {  
            $('#esconder').hide(); 
        } else {  
            $('#esconder').show();
        }
     });    
        $("#selector2").click(function() {  
        if($("#selector2").is(':checked')) {  
            $('#esconder').hide(); 
        } else {  
            $('#esconder').show();
        } 
     });   
        $("#selector3").click(function() {  
        if($("#selector3").is(':checked')) {  
            $('#esconder').hide(); 
        } else {  
            $('#esconder').show();
        } 
    });  
        $("#othervalue").click(function() {
            
            $("#radio").hide();
        });
        
    });
        
        
    $('#Btn').click(function(){
        
        
        var concepto =  document.getElementById('concepto').value;
        if(concepto == "")
        {
            
        }
        else{
            
         
        var x = $('input[name=selector]:checked', '#form').val();
        var y = $('#othervalue').val();
        
        if(y>0){
            x=y;
            x = x.replace("$","");
        
        
        if(x==0 || x==null || x==""){
            x = xvalor;
            x = x.replace("$","");
        }
        
        var a = 100.00;
        var b = 350.00;
        var c = 500.00;
   
            
        
        
        if(x == a){
            var nombre = "Basico";
            var descripcion = $('#concepto').val();
            var precio = x;
            var cantidad = 1;
            window.location="https://pasarelapago.000webhostapp.com/datos.php?amount="+x+"&nombreproducto="+nombre+"&descripcion="+descripcion+"&precio="+precio+"&cantidad="+cantidad;
        }
        else if(x==b){
            var nombre = "Pro";
            var descripcion = $('#concepto').val();
            var precio = x;
            var cantidad = 1;
         window.location="https://pasarelapago.000webhostapp.com/datos.php?amount="+x+"&nombreproducto="+nombre+"&descripcion="+descripcion+"&precio="+precio+"&cantidad="+cantidad;

        }
        else if(x==c){
            var nombre = "Premium";
            var descripcion = $('#concepto').val();
            var precio = x;
            var cantidad = 1;
           window.location="https://pasarelapago.000webhostapp.com/datos.php?amount="+x+"&nombreproducto="+nombre+"&descripcion="+descripcion+"&precio="+precio+"&cantidad="+cantidad;
            
        }
        else if(x!==a || x!==b || x!==c){
            var nombre = "Otro";
            var descripcion = $('#concepto').val();
            var precio = x;
            var cantidad = 1;
           window.location="https://pasarelapago.000webhostapp.com/datos.php?amount="+x+"&nombreproducto="+nombre+"&descripcion="+descripcion+"&precio="+precio+"&cantidad="+cantidad;
            
        }
            
        }
        
        if(x!=null && y ==""){
             x = x;
             var x = x.replace("$","");
        
        var xvalor = $('#othervalue').val();
        
        if(x==0 || x==null || x==""){
            x = xvalor;
            x = x.replace("$","");
        }
        
        var a = 100;
        var b = 350;
        var c = 500;
   
            
        
        
        if(x == a){
            var nombre = "Basico";
            var descripcion = $('#concepto').val();
            var precio = x;
            var cantidad = 1;
            window.location="https://pasarelapago.000webhostapp.com/datos.php?amount="+x+"&nombreproducto="+nombre+"&descripcion="+descripcion+"&precio="+precio+"&cantidad="+cantidad;
        }
        else if(x==b){
            var nombre = "Pro";
            var descripcion = $('#concepto').val();
            var precio = x;
            var cantidad = 1;
         window.location="https://pasarelapago.000webhostapp.com/datos.php?amount="+x+"&nombreproducto="+nombre+"&descripcion="+descripcion+"&precio="+precio+"&cantidad="+cantidad;

        }
        else if(x==c){
            var nombre = "Premium";
            var descripcion = $('#concepto').val();
            var precio = x;
            var cantidad = 1;
           window.location="https://pasarelapago.000webhostapp.com/datos.php?amount="+x+"&nombreproducto="+nombre+"&descripcion="+descripcion+"&precio="+precio+"&cantidad="+cantidad;
            
        }
        else if(x!==a || x!==b || x!==c){
            var nombre = "Otro";
            var descripcion = $('#concepto').val();
            var precio = x;
            var cantidad = 1;
           window.location="https://pasarelapago.000webhostapp.com/datos.php?amount="+x+"&nombreproducto="+nombre+"&descripcion="+descripcion+"&precio="+precio+"&cantidad="+cantidad;
            
        }
             
        }    
       
        
        
        
        }
            
    });

</script>
<script>
          
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
    

</body>
</html>
