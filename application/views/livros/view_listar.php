<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $headerTitulo?></h1>
    </div>
	<section class="row mb-5">
		<div class="col-12 col-sm-12 text-right">
			<?=anchor('livros/adicionar','Novo Livro', array('title' => 'Novo livro','class' => 'btn btn-success')); ?>
		</div>
	</section>
	<section class="row">
		<div class="col-12 col-sm-12">
			<?= $this->session->userdata('msg'); ?>
		</div>
	</section>
    <section class="row">
        <div class="col-12 col-sm-12">
			<table class="table table-dark " id="table_teste">
				<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Imagem</th>
					<th scope="col">Título</th>
					<th class="col-md-4"scope="col">Autor</th>
					<th scope="col">Preço</th>
					<th scope="col">Status</th>
					<th class="col-md-4" >Ações</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($livros as $livro){ ?>
					<tr>
						<th scope="row"><?= $livro->id ?></th>
						<td><img src="<?= base_url('upload/' . $livro->img) ?>" class="img-thumbnail"></td>
						<td><?=$livro->titulo ?></td>
						<td><?=$livro->autor ?></td>
						<td><?=$livro->preco ?></td>
						<td><?=($livro->ativo == 1) ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Inativo</span>' ?></td>
						<td class="col-md-4">
							<?= anchor('livros/editar/' . $livro->id,'Editar', array('title'=>'Editar','class'=>'btn btn-success')); ?>
							<?= anchor('livros/apagar/' . $livro->id,'Apagar', array('title'=>'Apagar','class'=>'btn btn-danger')); ?>
							<?=($livro->ativo == 1) ?
								anchor('livros/desativar/' . $livro->id,'Desativar', array('title'=>'Desativar','class'=>'btn btn-info'))
								:
								anchor('livros/ativar/' . $livro->id,'Ativar', array('title'=>'Ativar','class'=>'btn btn-info'))
								?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
        </div>
    </section>
</main>
