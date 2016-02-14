<h3><i class="fa fa-angle-right"></i> Alterar arte marcial</h3>
<?php echo form_open("alteracao/alterar_arte_marcial/$query->id_arte_marcial", array('class' => 'form-horizontal style-form', 'id' => 'form_alterar'));?>
<input type="hidden" name="id_arte_marcial" value="<?php echo set_value('id_turma', $query->id_arte_marcial); ?>" />


    <!-- Área de dados do menu -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Dados</h4>
                <?php
                    echo validation_errors('<p class="alert alert-danger">', '</p>');
                    if ($this->session->flashdata('cadastrook')){
                      echo '<p class="alert alert-success">' . $this->session->flashdata('cadastrook').'</p>';
                    }
                ?>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Nome</label>
                    <div class="col-sm-10">
                        <input type="text" id="nm_arte_marcial" class="form-control" name="nm_arte_marcial" value="<?php echo set_value('nm_arte_marcial'); ?><?php echo set_value('nm_arte_marcial', $query->nm_arte_marcial); ?>" title="Nome da arte marcial que deseja inserir no sistema"/>
                        <div class="error"><?php echo form_error('nm_arte_marcial'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Descrição da arte marcial</label>
                    <div class="col-sm-6">
                        <textarea rows="5" class="form-control" name="descricao" title="Descrição da nova arte marcial"><?php echo set_value('descricao'); ?> <?php echo set_value('descricao', $query->descricao); ?></textarea>
                        <div class="error"><?php echo form_error('descricao'); ?></div>
                    </div>
                </div>

                <button class="btn btn-lg btn-primary" >Alterar</button>

            </div>
        </div>
    </div>

<?php echo form_close(); ?>
