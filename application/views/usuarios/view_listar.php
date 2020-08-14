<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $headerTitulo ?></h1>
    </div>
    <section class="row mb-2">
        <div class="col-12 col-sm-12 text-right">
            <?php
                echo anchor('usuarios/add','Adicionar Usuario', array('title'=>'Add usuario','class'=>'btn btn-success'));
            ?>
        </div>
    </section>

    <section class="row">
        <div class="col-12 col-sm-12">
            <?= $this->session->userdata('msg'); ?>
        </div>
    </section>

    <section class="row">
        <div class="col-12 col-sm-12">
            <table class="table table-dark" id="table_teste">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ativo</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($usuarios as $usuario){ ?>
                                <tr>
                                    <th scope="row"><?= $usuario->id ?></th>
                                    <td><?=$usuario->nome ?></td>
                                    <td><?=$usuario->email ?></td>
                                    <td><?= ($usuario->ativo == 1 ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Inativo</span>') ?></td>
                                    <td>
                                        <?php
                                        echo anchor('usuarios/edit/' . $usuario->id,'Editar', array('title'=>'Editar','class'=>'btn btn-success'));
                                        echo anchor('usuarios/del/' . $usuario->id,'Apagar', array('title'=>'Apagar','class'=>'btn btn-danger'));
                                        if ($usuario->ativo == 1){
                                            echo anchor('usuarios/inativo/' . $usuario->id,'Inativar', array('title'=>'Inativar','class'=>'btn btn-secondary'));
                                        }else{
                                            echo anchor('usuarios/ativo/' . $usuario->id,'Ativar', array('title'=>'Ativar','class'=>'btn btn-primary'));
                                        }
                                        ?>
                                    </td>
                                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
