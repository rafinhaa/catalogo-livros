<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		<h1 class="h2"><?= $headerTitulo ?></h1>
	</div>
	<section class="row">
		<div class="col-12 col-sm-12">
			<?= $this->session->userdata('msg') ?>
		</div>
	</section>
	<section class="row">
		<div class="col-12 col-sm-12">
			<?=validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
		</div>
	</section>
	<section class="row">
		<div class="col-12 col-sm-12">
			<?= form_open_multipart() ?>
			<div class="form-group">
				<?= form_label('Título') ?>
				<?= form_input(['type' => 'text','class' => 'form-control','name' =>'titulo', 'placeholder' => 'Titulo']) ?>
			</div>
			<div class="form-group">
				<?= form_label('Autor') ?>
				<?= form_input(['type' => 'text','class' => 'form-control','name' =>'autor', 'placeholder' => 'Autor']) ?>
			</div>
			<div class="form-group">
				<?= form_label('Valor') ?>
				<?= form_input(['type' => 'text','class' => 'form-control','name' =>'valor', 'placeholder' => 'Valor']) ?>
			</div>
			<div class="form-group">
				<?= form_label('Resumo') ?>
				<?= form_textarea(['type' => 'text','class' => 'form-control','name' =>'resumo', 'placeholder' => 'Resumo']) ?>
			</div>
			<div class="form-group">
				<?= form_label('Ativo') ?>
				<?= form_dropdown('ativo',['1' => 'Sim', '0' => 'Não'], '', ['class' => 'form-control']) ?>
			</div>
			<div class="form-group">
				<?= form_label('Anexar imagem') ?>
				<?= form_upload('foto_livro','',array('class' => 'form-control-file' ) )?>
			</div>
			<?= form_submit('submit', 'Cadastrar livro', array('class' => 'btn btn-success')); ?>
			<?= form_close() ?>
		</div>
	</section>
</main>
