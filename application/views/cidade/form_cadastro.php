<h3><i class="fa fa-angle-right"></i> Cadastrar Cidade</h3>
<?php echo form_open('cadastro/insert_cidade', array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro'));?>

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
                        <select name="id_ta_pais" id="id_ta_pais" onclick="javascript: getestado();" class="form-control">
                          <option value="">Escolha o país</option>
                          <?php
                              foreach ($paises as $value) {
                                echo "<option value='" . $value->id_ta_pais . "'>" . $value->nm_pais . "</option>";
                              }
                          ?>
                        </select>
                        <div class="error"><?php echo form_error('id_ta_pais'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Estado</label>
                    <div class="col-sm-10">
                        <select name="id_ta_estado" id="id_estado" class="form-control">
                          <option value="">Escolha o Estado</option>
                          <?php
                              foreach ($estados as $value) {
                                echo "<option value='" . $value->id_ta_estado . "'>" . $value->nm_pais . "</option>";
                              }
                          ?>
                        </select>
                        <div class="error"><?php echo form_error('id_ta_estado'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Nome</label>
                    <div class="col-sm-10">
                        <input type="text" id="nm_cidade" class="form-control" name="nm_cidade" value="<?php echo set_value('nm_cidade'); ?>" title="Digite o nome da nova cidade"/>
                        <div class="error"><?php echo form_error('nm_cidade'); ?></div>
                    </div>
                </div>

                <button class="btn btn-lg btn-primary" >Cadastrar</button>

            </div>
        </div>
    </div>

<?php echo form_close(); ?>


<script type="text/javascript">
    function getestado() {
        $("#id_ta_pais option:selected").each(function() {
            var id_ta_pais = $("#id_ta_pais").val();
            str1 = "<?php echo base_url(); ?>cadastro/get_estado_pais/"
            var res = str1.concat(id_ta_pais);
            $.post(res, {
                id_ta_pais : id_ta_pais
            }, function(data) {
                $("#id_estado").html(data);
            });
            //alert(res);
        });
    }
</script>