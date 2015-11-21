<h3><i class="fa fa-angle-right"></i> Cadastrar estado</h3>
<?php echo form_open('cadastro/insert_exame', array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro'));?>

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
                    <label class="col-sm-2 col-sm-2 control-label">País</label>
                    <div class="col-sm-10">
                        <select name="id_ta_pais" class="form-control">
                          <option value="">Escolha o país</option>
                          <?php
                              foreach ($paises as $value) {
                                echo "<option value='" . $value->id_ta_pais . "'>" . $value->nm_pais . "</option>";
                              }
                          ?>
                        </select>
                        <div class="error"><?php echo form_error('id_menu_pai'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Nome</label>
                    <div class="col-sm-10">
                        <input type="text" id="nm_exame" class="form-control" name="nm_estado" value="<?php echo set_value('nm_estado'); ?>" title="Digite o nome do novo estado"/>
                        <div class="error"><?php echo form_error('nm_estado'); ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Sigla</label>
                    <div class="col-sm-10">
                        <input type="text" id="sigla" class="form-control" name="sigla" value="<?php echo set_value('sigla'); ?>" title="Digite a sigla do novo estado"/>
                        <div class="error"><?php echo form_error('sigla'); ?></div>
                    </div>
                </div>

                <button class="btn btn-lg btn-primary" >Cadastrar</button>

            </div>
        </div>
    </div>

<?php echo form_close(); ?>
