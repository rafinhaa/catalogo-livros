<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $headerTitulo ?></h1>
    </div>
    <section class="row">
        <?php
        /**echo '<pre>';

        print_r($query);
        echo '</pre>';*/
        ?>
        <div class="col-12 col-sm-12">
            <?php
            echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');

            ?>
            <form method="post" action="<?php echo base_url('index.php/usuarios/edit/' . $query->id) ?>" >
                <div class="form-group">
                    <label for="inputNome">Nome Completo</label>
                    <input type="text" class="form-control" id="inputNome" placeholder="Nome completo" name="nome" value="<?= $query->nome ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="<?= $query->email ?>">
                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Senha</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Senha" name="senha" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4-R">Repita a senha</label>
                        <input type="password" class="form-control" id="inputPassword4-R" placeholder="Repita a senha" name="senha2">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCode">Código</label>
                        <input type="text" class="form-control" id="inputCode" placeholder="Código" name="codigo">
                    </div>
                    <input type="hidden" value="<?= $query->id ?>" name="id">
                </div>


                <button type="submit" class="btn btn-primary">Alterar</button>
            </form>
        </div>
    </section>
</main>
