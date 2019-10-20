<?php 
    if($res['tipo'] != 1) {
        ?>
            <script>
                window.location.href = 'http://localhost/nasa_space/index.php?erro=25';
            </script>
        <?php

    } 

?>
<section class="content-header">
    <h1>
        Aprovação
        <small>Aprovar Voluntarios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Aprovação</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Aprovar Voluntarios</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Id </th>
                                <th>Nome</th>
                                <th>Date</th>
                                <!-- <th>Status</th> -->
                                <th>Aprovar</th>
                            </tr>
                            <tr>

                                <?php

                                $stmt = $db->prepare("SELECT * FROM tb_users WHERE tipo = :t ");
                                $stmt->execute([
                                    "t" => 2
                                ]);

                                $cons = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($cons as $row => $line) {
                                    ?>
                            <tr>
                                <td><?= $line['id'] ?></td>
                                <td><?= $line['nome_usuario'] ?></td>
                                <td><?= date('d/m/Y H:i:s', strtotime($line['dt_cadastro'])) ?></td>
                                <td>
                                    <div class="form-group">
                                        <select name="tipo" data-id="<?= $line["id"] ?>" class="form-control">
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                            <!-- <option value="2">Voluntario</option> -->
                                        </select>
                                    </div>

                                </td>
                            </tr>
                        <?php
                        }

                        ?>

                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Aprovar</button>
              </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>