<?php
print_r($res);
?>
<section class="content-header">
    <h1>
        Perfil
        <small>Perfil do Usuario</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Perfil</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Informações do Perfil: </h3>
            <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="" style="margin-right: 5px;" data-original-title="Collapse" aria-describedby="tooltip563595">
                    <i class="fa fa-minus"></i></button>
                <div class="tooltip fade top in" role="tooltip" id="tooltip563595" style="top: -33px; left: -16.7841px; display: block;">
                    <div class="tooltip-arrow" style="left: 50%;"></div>
                    <div class="tooltip-inner">Collapse</div>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form role="form" method="GET" action="./actions/alteraPerfil.php">
                <!-- text input -->

                <div class="form-group">
                    <label>Nome Completo</label>
                    <input type="text" disabled class="form-control" value="<?= $res['nome_usuario'] ?>">
                </div>
                <div class="form-group">
                    <label>Data de Nascimento:</label>
                    <input type="date" name="data_nascimento" class="form-control">
                </div>
                <div class="form-group">
                    <label>CPF: </label>
                    <input type="text" disabled class="form-control" value="<?= $res['cpf'] ?>">
                </div>
                <div class="form-group">
                    <label>E-mail: </label>
                    <input type="email" disabled class="form-control" value="<?= $res['email'] ?>">
                </div>
                <div class="form-group">
                    <label>Senha: </label>
                    <input type="password" disabled class="form-control" value="<?= 'algumacoisa' ?>">
                </div>
                <div class="form-group">
                    <label>Receber informações: </label>
                    <select id="info" name="info" class="form-control">
                        <option value="0">NÃO</option>
                        <option value="1">SIM</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Sexo: </label>
                    <select id="sexo" name="sexo" class="form-control">
                        <option value="F">Feminino</option>
                        <option value="M">Masculino</option>
                        <option value="N">Não Informar</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Data Cadastro: </label>
                    <input type="datetime" disabled class="form-control" value="<?= date('d/m/Y H:i:s', strtotime($res['dt_cadastro'])) ?>">
                </div>



                <?php
                if ($res['tipo'] == 1) {
                    ?>

                    <div class="form-group">
                        <label>Identidade Militar: </label>
                        <input type="datetime" disabled class="form-control" value="<?= date('d/m/Y H:i:s', strtotime($res['dt_cadastro'])) ?>">
                    </div>

                <?php
                } else if ($res['tipo'] == 2) {
                    ?>

                    <div class="form-group">
                        <label>Status Voluntario: </label>
                        <input type="text" disabled class="form-control" value="<?= ($res['voluntario_at'] == 0) ? 'APTO' : 'NÃO APTO'; ?>">
                    </div>
                <?php

                } else { }

                ?>


                <div class="form-group">
                    <label>CEP: </label>
                    <input type="text" id="cep" name="cep" class="form-control" placeholder="Digite seu CEP: ">
                </div>
                <div class="form-group">
                    <label>Endereço: </label>
                    <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Digite seu endereço: ">
                </div>
                <div class="form-group">
                    <label>Bairro: </label>
                    <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Digite seu bairro: ">
                </div>
                <div class="form-group">
                    <label>Cidade: </label>
                    <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Digite seu cidade: ">
                </div>
                <div class="form-group">
                    <label>Estado: </label>
                    <input type="text" id="estado" name="estado" class="form-control" placeholder="Digite seu estado: ">
                </div>
                <div class="form-group">
                    <label>Pais: </label>
                    <input type="text" id="pais" name="pais" class="form-control" placeholder="Digite seu pais: ">
                </div>
                <div class="form-group">
                    <label>Numero: </label>
                    <input type="number" name="numero" class="form-control">
                </div>

                <div class="form-group">
                    <label>Complemento: </label>
                    <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Digite seu complemento: ">
                </div>

                <div class="form-group">
                    <label>Telefone Celular: </label>
                    <input type="text" id="tel_cel" name="tel_cel" class="form-control" placeholder="Digite seu telefone celular: ">
                </div>

                <div class="form-group">
                    <label>Telefone Fixo: </label>
                    <input type="text" id="tel_fixo" name="tel_fixo" class="form-control" placeholder="Digite seu telefone fixo: ">
                </div>

                <input type="hidden" id="id_u" name="id_u" class="form-control" value="<?= $res['id'] ?>">

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Registrar Perfil</button>
                </div>

            </form>
        </div>
        <!-- /.box-body -->
    </div>
</section>