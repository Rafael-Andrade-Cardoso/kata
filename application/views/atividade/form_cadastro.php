<h3><i class="fa fa-angle-right"></i> Cadastrar Menu</h3>
<?php echo form_open('cadastro/insert_atividade', array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro'));?>



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
                        <input type="text" id="nm_atividade" class="form-control" name="nm_atividade" value="<?php echo set_value('nm_atividade'); ?>" />
                        <div class="error"><?php echo form_error('nm_atividade'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Descrição da atividade</label>
                    <div class="col-sm-6">
                        <textarea rows="5" class="form-control" name="desc_atividade"><?php echo set_value('desc_atividade'); ?> </textarea>
                        <div class="error"><?php echo form_error('desc_atividade'); ?></div>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary" >Cadastrar</button>

            </div>
        </div>
    </div>

<?php echo form_close(); ?>
