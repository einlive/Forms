<!DOCTYPE html>
<html>
<head>
	<title>Technical Test for Front-end Web Developer</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function() {
		$("#submit").click(function(){
			
			if (!confirm("Anda yakin sudah selesai mengisi formulir dengan benar ?")) {
                return false;   	
            };

            var validation = function(a,b){
            	var data = $("#"+ a +"").val();
            	
            	if (data == '') {
            		alert('Text-field '+ b +' is empty');
            		return false;
            	};
            };

            	var numbering = function(b,c){
            		var num = $("#"+ b +"").val();
            		function isNumber(n) { return /^-?[\d.]+(?:e-?\d+)?$/.test(n); }

            		if (isNumber(num) == false) {
            			alert('Text-field '+ c +' not number');
            			return false;
            		};
            	};
            	
                var array = ["name","descrip","street","city","province","pos"];
                var nama = ["Name","Description","Street","City","Province","Pos Code"];
                
                for (var i = 0; i <= array.length; i++) {
                	validation(array[i],nama[i]);
                };
                	numbering(array[5],nama[5]);

                $.ajax({
                type: "POST",
                url : "ajax_submit.php",
                data: {
                  		'Nama' : $("#name").val(),
                		'Description' : $("#descrip").val(),
                		'Street' : $("#street").val(),
                		'City' : $("#city").val(),
                		'Province' : $("#province").val(),
                		'Pos' : $("#pos").val()
                	},
                cache:false,
                success: function(data){
                    $('#tampildata').html(data);
                    document.frm.add.disabled=false;
                }
            	});
		});

	$("#send").click(function(){
		if (!confirm("Anda ingin send pesan ini ?")) {
			return false;
		};

		var validation = function(a,b){
            	var data = $("#"+ a +"").val();
            	
            	if (data == '') {
            		alert('Text-field '+ b +' is empty');
            		return false;
            	};
            };

            var array = ["devision","name_ask","question"];
            var nama = ["Devision","Nama","Question"];
            for (var i = 0; i <= array.length; i++) {
                	validation(array[i],nama[i]);
            };

            $.ajax({
                type: "POST",
                url : "ajax_send.php",
                data: {
                  		'Devision' : $("#devision").val(),
                		'Nama' : $("#name_ask").val(),
                		'Question' : $("#question").val()
                	},
                cache:false,
                success: function(data){
                    $('#tampildata').html(data);
                    document.frm.add.disabled=false;
                }
            	});

	});
	});
	</script>
</head>
<body>
<div id="wrapper">

<nav class="navbar navbar-default navbar-static-top" role=" navigation" style-"margin-bottom: 0">
<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle Navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
</div>
<div class="container">

	<a href="index.php"><img src="assets/img/logoku.png" style="width:160px"></a>
				<form method="post" class="navbar-form navbar-right" id="form" action="">
                <div class="form-group">
                	<button type="submit" class="btn btn-success" id="submit" name="submit">Submit</button>
                	<button type="submit" class="btn btn-warning" id="cancel" name="cancel">Cancel</button>
                </div>

</div>
</nav>
<section class="jumbotron text-xs-center" style="background-image: url('assets/img/bc2.png');background-repeat:no-repeat;">
	<div class="container">
        <h1 class="jumbotron-heading">Form Example</h1>
        <p class="lead text-muted">Example form for test technical front end Website used jquery validation. </p>
      </div>
</section>
<div class="container">
<div class="row">
	
	<div class="col-lg-6">
		<fieldset class='col-lg-12'>
		<div class="form-group">
			<label class="control-label col-sm-12">Name</label>
			<div class="col-sm-12">
			<input type="text" name="name" class="form-control" id="name" require placeholder="Enter Your Name">	
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-12">Description</label>
			<div class="col-sm-12">
			<textarea class="form-control" rows="3" name="description" id="descrip" require></textarea>
			</div>
		</div>
		</fieldset>
		<fieldset class="col-lg-12">
			<legend>Address</legend>
			
			<div class="form-group">
				<label class="control-label col-sm-12">Street</label>
				<div class="col-sm-12">
				<input type="text" name="street" class="form-control" id="street" require placeholder="Enter Your Street Address">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-12">City</label>
				<div class="col-sm-12">
				<input type="text" name="city" class="form-control" id="city" require placeholder="Enter Your Street Address">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-6">Province</label>
				<label class="control-label col-sm-6">Postol Code</label>
				<div class="col-sm-6">
				<select name="province" class="form-control" id="province">
					<option value="">select your Province</option>
      				<option value="JKT">Jakarta</option>
      				<option value="BTN">Banten</option>
      				<option value="BDG">Bandung</option>
				</select>
				</div>
				<div class="col-sm-6">
					<input type="text" name="pos" class="form-control" id="pos" require placeholder="Enter Your Pos Code">
				</div>
			</div>
		</fieldset>
		</form>
	</div>
	<div id="tampildata"></div>
	<div class="col-lg-6" >
		<fieldset>
			<legend>Ask</legend>
			<form method="post" id="ask">
				
				<div class="form-group">
					<label class="control-label col-sm-12">Devision</label>
					<div class="col-sm-8">
					<select name="devision" class="form-control" id="devision">
						<option value="">Select Your Devision</option>
	      				<option value="CS">Customer Service</option>
	      				<option value="TS">Technical Support</option>
	      				<option value="SL">Seller Service</option>
	      			</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-12">Name</label>
					<div class="col-sm-12">
					<input type="text" name="name_ask" class="form-control" id="name_ask" require placeholder="Enter Your Name ASK">	
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-12">Question</label>
					<div class="col-sm-12">
					<textarea class="form-control" rows="3" name="question" id="question" require></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
                	<button type="submit" class="btn btn-success" id="send">Send</button>
                	</div>
                </div>
			</form>
		</fieldset>
	</div>
</div>
</div>
<div class="container" style="margin-top:10px;">
<div class="row">
	<footer class="text-muted jumbotron" style="background-image: url('assets/img/bc2.png');background-repeat:no-repeat;">
      <div class="container">
        <p>Example Form create by Khaerul Umam, used Bootsrap</p>
        <p>Thank you visit my form</p>
      </div>
    </footer>
    </div>
    </div>

</div>
</body>
</html>