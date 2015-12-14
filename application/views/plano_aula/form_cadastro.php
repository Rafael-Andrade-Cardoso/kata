<h3><i class="fa fa-angle-right"></i> Cadastrar plano de aula</h3>

<?php echo form_open('cadastro/insert_plano_aula', array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro')); ?>
    <!-- dt_aula, obs-->
    <!-- Área de dados do menu -->
    <div class="row mt">
        <div class="col-lg-12">            
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Dados<font color="#FF0202" size="2">Dados obrigatórios*</font></h4>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Aula<font color="#FF0202">*</font></label>
                    <div class="col-sm-10">
                        <select name="id_aula" class="form-control" title="Selecione aula que terá o plano de aula">
                            <option value="">Escolha a aula</option>
                            <?php
                                foreach ($aula as $value) {
                                    echo "<option value='" . $value->id_aula . "'>" . $value->dt_aula. "</option>";                                   
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_aula'); ?></div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Atividade<font color="#FF0202">*</font></label>
                    <div class="col-sm-10">
                        <select name="id_ta_atividade" class="form-control" title="Selecione atividade que terá o a aula">
                            <option value="">Escolha a atividade</option>
                            <?php
                                foreach ($atividade as $value) {
                                    echo "<option value='" . $value->id_ta_atividade . "'>" . $value->nm_atividade. "</option>";
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_atividade'); ?></div>
                    </div>
                </div>
                
                <button class="btn btn-lg btn-primary" >Cadastrar</button>                
            
            </div>
        </div>
    </div>

<?php echo form_close(); ?>