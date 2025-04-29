<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Informacion de Cliente</title>
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
<style>
    body {
  background: #CCE6E9;
}

.contenedor{
    background-color: white;
    margin-left: 34%;
    margin-right: 25%;
    margin-top: 1%;
}
.bodyformu{
    padding-top: 7%;
   
}
.title{
    padding-left: 10%;
    padding-top: 4%;
    font-size: 200%;
}
.row1{
    padding-left: 7%;
}
.inpu{
    float: right;
    padding-right: 5%;
    margin-right: 10%;
    color: #ffffff;
    width: 50%;
}
.myButton {
	box-shadow: 0px 10px 14px -7px #3e7327;
	background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
	background-color:#4b8f29;
	border-radius:4px;
	border:1px solid #4b8f29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:14px;
	font-weight:bold;
	padding:10px 43px;
	text-decoration:none;
	text-shadow:0px 1px 0px #5b8a3c;
        margin-left: 30%;
        margin-top: 5%;
        margin-bottom:  5%;
}
.myButton:hover {
	background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
	background-color:#72b352;
}
.myButton:active {
	position:relative;
	top:1px;
}
.css-input { border-width:2px; border-style:solid; padding:4px; font-size:15px; background-color:#CCE6E9; border-color:#72b352;color: #ffffff; }
        
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<main>
    

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Informacion del Cliente
				</span>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Campo obligatorio">
					<span class="label-input100">Nombre</span>
					<input class="input100" type="text" name="first-name" id="first-name" placeholder="Ingresa tu Nombre ">
				</div>
                                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Campo obligatorio">
					<span class="label-input100">Segundo Nombre</span>
					<input class="input100" type="text" name="second-name" id="second-name" placeholder="Ingresa tu Segundo Nombre ">
				</div>
                            <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Campo obligatorio">
					<span class="label-input100">Apellido</span>
					<input class="input100" type="text" name="last-name" id="last-name" placeholder="Ingresa tu Apellido ">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Campo obligatorio">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="email" id="email" placeholder="Ingresa tu Email ">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Telefono</span>
					<input class="input100" type="text" name="Telefono" id="Telefono" placeholder="Ingresa tu Telefono">
				</div>
                                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Campo obligatorio">
					<span class="label-input100">Cedula</span>
					<input class="input100" type="text" name="Cedula" id="Cedula" placeholder="Ingresa tu cedula ">
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Campo obligatorio">
					<span class="label-input100">Direccion Entrega</span>
					<input class="input100" type="text" name="DEntrega" id="DEntrega" placeholder="Ingresa la direccion ">
				</div>
                                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Campo obligatorio">
					<span class="label-input100">Pais de Entrega</span>
					<input class="input100" type="text" name="PEntrega" id="PEntrega" placeholder="Ingresa el codigo de pais. Ej: (EC) ">
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.2/jquery.payment.min.js'></script><script  src="./script.js"></script>
<script type="text/javascript">
    <?php $valor = $_GET['amount'];
            $x = str_replace("+"," ", $valor);
                    
            $nproducto = $_GET['nombreproducto'];
            $dproducto = $_GET['descripcion']; 
            $pproducto = $_GET['precio']; 
            $cproducto = $_GET['cantidad']; 
    ?>
    $('#Btn').click(function(){
       var nombr1 =  document.getElementById('first-name').value;
        var apellido1 =  document.getElementById('last-name').value;
         var email1 =  document.getElementById('email').value;
          var cedula1 =  document.getElementById('Cedula').value;
           var segundonombre1 =  document.getElementById('second-name').value;
            var telefono1 =  document.getElementById('Telefono').value;
             var DEntrega1 =  document.getElementById('DEntrega').value;
             var PEntrega1 =  document.getElementById('PEntrega').value;

             
             if(nombr1 == "" || apellido1 =="" || email1 =="" || cedula1==""|| segundonombre1=="" || DEntrega1 =="" || PEntrega1=="")
             {
                 
             }
             else{
                 
             
       var nombre = $("#first-name").val();
       var apellido = $("#last-name").val();
       var email = $("#email").val();
       var cedula = $("#Cedula").val();
       var segundonombre = $("#second-name").val();
       var telefono = $("#Telefono").val();
       var DEntrega = $("#DEntrega").val();
       var PEntrega = $("#PEntrega").val();

       
        window.location="http://localhost/datafast/Valores.php?amount=<?php echo $x;?>&nombre="
                +nombre+"&apellido="+apellido+"&email="+email+"&cedula="+cedula+
                "&segundonombre="+segundonombre+"&telefono="+telefono+"&DEntrega="+DEntrega+
                "&PEntrega="+PEntrega+"&nproducto=<?php echo $nproducto;?>&dproducto=<?php echo $dproducto;?>&pproducto=<?php echo $pproducto;?>&cproducto=<?php echo $cproducto;?>";
        }
    });

</script>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
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

</body>
</html>

