<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

	<title><?= $titulo ?></title>

	<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url('dist/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?php echo base_url('dist/bootstrap/css/signin.css') ?>" rel="stylesheet">
</head>

<body class="text-center">

<?php
echo form_open('login',array('class'=>'form-signin'));

if($this->session->flashdata('erro_login') != ""){
	echo '
		<div class="row">
			<div class="col-sm">
				<div class="alert alert-danger" role="alert"> 
					' . $this->session->flashdata('erro_login') . '				
				</div>
			</div>
		</div>	
	';
}

echo '<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">';
echo '<h1 class="h3 mb-3 font-weight-normal">Por favor, entre</h1>';
echo form_label('Email address','',array('for'=>'id_email','class'=>'sr-only'));
echo form_input(array('type'=>'email','name'=>'email','id'=>'id_email','class'=>'form-control','placeholder'=>'E-mail','required'=>'','autofocus'=>''));
echo form_label('Password','',array('for'=>'id_senha','class'=>'sr-only'));
echo form_input(array('type'=>'password','name'=>'senha','id'=>'id_senha','class'=>'form-control','placeholder'=>'Senha','required'=>''));
?>
<div class="checkbox mb-3">
    <label>
        <input type="checkbox" value="remember-me"> Lembrar-me
    </label>
</div>
<?php
echo form_submit('submit','Entrar',array('class'=>'btn btn-lg btn-primary btn-block'));
echo anchor('/','Voltar', array('title'=>'Voltar','class'=>'stretched-link'));
echo '<p class="mt-5 mb-3 text-muted">© 2020</p>';
form_close();

?>

</body>
</html>
