<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">
		<div class="section-title">
			<h2>Contáctame</h2>
			<p>Entremos en comunicación y responderé con gusto tus consultas y proformas para tu siguiente proyecto web.</p>
		</div>

		<div class="row" data-aos="fade-in">

			<div class="col-lg-5 d-flex align-items-stretch">
			<div class="info">
				<div class="address">
				<i class="bi bi-geo-alt"></i>
				<h4>Desde:</h4>
				<p>Lima, Perú</p>
				</div>

				<div class="email">
				<i class="bi bi-envelope"></i>
				<h4>Email:</h4>
				<p>sam@peruweb.site</p>
				</div>

				<div class="phone">
				<i class="bi bi-phone"></i>
				<h4>Teléfono:</h4>
				<p>+51 971 893 196</p>
				</div>

				<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> -->
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d8034.217757095317!2d-77.05645059432845!3d-11.991814042436095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2spe!4v1668179970613!5m2!1sen!2spe" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
				</div>

			</div>
			
			<div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
				<form role="form" class="php-email-form" id="frmContact" onsubmit="return prevDef(event)">
					<div id="mail-status"></div>
					<div class="row">
					<div class="form-group col-md-6">
						<label for="name">Tu Nombre</label>
						<input type="text" name="userName" class="form-control" id="userName" required>
					</div>
					<div class="form-group col-md-6">
						<label for="name">Tu Email</label>
						<input type="email" class="form-control" name="userEmail" id="userEmail" required>
					</div>
					</div>
					<div class="form-group">
					<label for="name">Asunto</label>
					<input type="text" class="form-control" name="subject" id="subject" required>
					</div>
					<div class="form-group">
					<label for="name">Mensaje</label>
					<textarea class="form-control" name="message" id="message" rows="10" required></textarea>
					</div>
					<div class="my-3">
					<div class="loading">Cargando...</div>
					<div class="error-message"></div>
					<div class="sent-message">Gracias por comunicarte conmigo. Te responderé a la brevedad.</div>
					</div>
					<div class="text-center"><button type="submit" name="submit" onClick="sendContact();">Enviar Mensaje</button></div>
				</form>
			</div>
			<script>
				function prevDef(){
					return false;
				}
			</script>
		</div>
    </div>
</section><!-- End Contact Section -->

<script>
	function sendContact() {
		var valid;	
		valid = validateContact();
		console.log(valid);
		if(valid) {
			jQuery.ajax({
				url: "<?php echo get_template_directory_uri(); ?>/assets/forms/contact_mail.php",
				data:'userName='+$("#userName").val()+'&userEmail='+$("#userEmail").val()+'&subject='+$("#subject").val()+'&message='+$(message).val(),
				type: "POST",
				success:function(data){
					$("#mail-status").html(data);
				},
				error:function (){}
			});
		}
	}

	function validateContact() {
		var valid = true;
		
		if(!$('#userName').val() || !$('#userEmail').val() || !$('#subject').val() || !$('#message').val()){
            valid = false;
        }
		
		/* if(!$("#userName").val()) {
			$("#userName-info").html("(required)");
			$("#userName").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#userEmail").val()) {
			$("#userEmail-info").html("(required)");
			$("#userEmail").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
			$("#userEmail-info").html("(invalid)");
			$("#userEmail").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#subject").val()) {
			$("#subject-info").html("(required)");
			$("#subject").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#content").val()) {
			$("#content-info").html("(required)");
			$("#content").css('background-color','#FFFFDF');
			valid = false;
		} */
		
		return valid;
	}
</script>