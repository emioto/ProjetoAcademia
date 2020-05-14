<?= $this->extend('Padrao/PadraoAuthView') ?>
<?= $this->section('Titulo') ?> Aluno > Conta <?= $this->endSection() ?>
<?= $this->section('Estilos') ?>
<style>
    h4.heading {
        text-transform: uppercase;
        font-weight: 300;
        border-bottom: 1px solid;
        padding-bottom: 3px;
    }
    .input100 {
        padding: 20px 7px 0 43px;
    }
    .wrap-login100-form-btn {
        width: 200px;
    }
    ul[class*="ui-autocomplete"] {
        background-color: #fff;
        z-index: 9999;
        width: 200px;
        list-style-type : none!important;
        padding-left: 5px!important;
        padding-right: 5px!important;
    }
    .ui-menu-item:hover {
        background-color: #ec3e5f;
        cursor: pointer;
    }
    .ui-helper-hidden-accessible {
        visibility: hidden;
    }
    .imagePreview {
        width: 150px;
        height: 160px;
        background-position: center center;
        background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
        background-color:#fff;
        background-size: 160px;
        background-repeat:no-repeat;
        float: right;
    }
    .btn-primary
    {
        display:block;
        border: none;
        margin-top:-5px;
        width: 150px;
        cursor: pointer;
        background-color: #ec3e5f;
    }
    .btn-primary:hover
    {
        background-color: #ec3e5f;
    }
</style>
<?= $this->endSection() ?>
<?= $this->section('Conteudo') ?>
    <div class="row">
        <div class="col-12 col-md-6 col-xl-6">
            <h4 class="heading">Dados de Acesso</h4>
            <form name="formUsuario" id="formUsuario" method="post" action="javascript:void(0)">
                <input name="ALN_ID" type="hidden" value="<?= $Usuario->ALN_ID ?>" />
                <input name="ALN_SENHA" type="hidden" value="<?= $Usuario->ALN_SENHA ?>" />
                <div class="form-group">
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                        <input disabled class="input100" type="text" name="ALN_EMAIL" placeholder="Email" value="<?= $Usuario->ALN_EMAIL ?>">
                        <span class="focus-input100" data-symbol="&#xf15a;"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                        <input class="input100" type="password" name="SenhaAntiga" placeholder="Senha Antiga" autocomplete="off">
                        <span class="focus-input100" data-symbol="&#xf191;"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                        <input class="input100" type="password" name="NovaSenha" placeholder="Nova senha" autocomplete="off">
                        <span class="focus-input100" data-symbol="&#xf191;"></span>
                    </div>
                    <div class="container-login100-form-btn m-b-30">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" id="btn_salvar1" class="login100-form-btn">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-6 col-xl-6">
            <h4 class="heading">Dados Pessoais</h4>
            <form name="formPessoa"  id="formPessoa" method="post" action="javascript:void(0)">
                <input name="ALN_ID" type="hidden" value="<?= $Usuario->ALN_ID ?>" />
                <input name="ALN_IBGE" type="hidden" value="<?= $Usuario->ALN_IBGE ?>" />
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-12 imgUp">
                            <div class="imagePreview">
                                <label style="bottom: 0; position : absolute;" class="btn btn-primary">Escolher Foto
                                    <input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                </label>
                            </div>
                            <div style="width: calc(100% - 166px); float: left;" class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                                <input class="input100" type="text" name="ALN_NOME" placeholder="Nome completo" value="<?= $Usuario->ALN_NOME ?>">
                                <span class="focus-input100" data-symbol="&#xf207;"></span>
                            </div>
                            <div style="width: calc(100% - 166px); float: left;" class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                                <input class="input100" type="text" name="ALN_CPF" placeholder="CPF" value="<?= $Usuario->ALN_CPF ?>">
                                <span class="focus-input100" data-symbol="&#xf106;"></span>
                            </div>
                            <div style="width: calc(100% - 166px); float: left;" class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                                <input class="input100" type="date" name="ALN_DATANASC" placeholder="Data de Nascimento" value="<?= $Usuario->ALN_DATANASC ?>">
                                <span class="focus-input100" data-symbol="&#xf332;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-4">
                            <div class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                                <input class="input100" type="text" name="ALN_CEP" placeholder="CEP" value="<?= $Usuario->ALN_CEP ?>">
                                <span class="focus-input100" data-symbol="&#xf1ab;"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-xl-8">
                            <div class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                                <input class="input100" type="text" name="ALN_ENDERECO" placeholder="Endereço" value="<?= $Usuario->ALN_ENDERECO ?>">
                                <span class="focus-input100" data-symbol="&#xf175;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-4">
                            <div class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                                <input class="input100" type="text" name="ALN_ENDNUMERO" placeholder="Número" value="<?= $Usuario->ALN_ENDNUMERO ?>">
                                <span class="focus-input100" data-symbol="&#xf3bd;"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-xl-8">
                            <div class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                                <input class="input100" type="text" name="ALN_BAIRRO" placeholder="Bairro" value="<?= $Usuario->ALN_BAIRRO ?>">
                                <span class="focus-input100" data-symbol="&#xf1a1;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-6">
                            <div class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                                <input id="municipios" class="input100" type="text" name="ALN_CIDADE" placeholder="Município" value="<?= $Usuario->ALN_CIDADE ?>">
                                <span class="focus-input100" data-symbol="&#xf196;"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-xl-6">
                            <div class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                                <input id="estados" class="input100" type="text" name="ALN_ESTADO" placeholder="UF" value="<?= $Usuario->ALN_ESTADO ?>">
                                <span class="focus-input100" data-symbol="&#xf299;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                        <input class="input100" type="text" name="ALN_COMPLEMENTO" placeholder="Complemento" value="<?= $Usuario->ALN_COMPLEMENTO ?>">
                        <span class="focus-input100" data-symbol="&#xf1f8;"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                        <input class="input100" type="text" name="ALN_CELULAR" placeholder="Telefone" value="<?= $Usuario->ALN_CELULAR ?>">
                        <span class="focus-input100" data-symbol="&#xf2be;"></span>
                    </div>
                    <div class="container-login100-form-btn m-b-30">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" id="btn_salvar2" class="login100-form-btn">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-xl-12">
            <h4 class="heading">Compras</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Plano</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($Compras as $Compra):?>
                    <tr>
                        <th><?= $Compra['CMP_DATACOMPRA'] ?></th>
                        <td><?= $Compra['PLN_TITULO'] ?></td>
                        <td><?= $Compra['CMP_VALOR'].' ('.$Compra['CMP_PARCELAS'].'x)' ?></td>
                        <td><?= $PagSeguroStatus[$Compra['CMP_STATUSPAG']] ?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('Scripts') ?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {

        var municipiosDisponiveis = ["Americana","Limeira","Sumaré","Santa Barbara D'Oeste","Hortolândia","Campinas","Jundiai"];
        var estadosDisponiveis = ["Acre","Alagoas","Amapá","Amazonas","Bahia","Ceará","Distrito Federal","Espírito Santo","Goiás","Maranhão","Mato Grosso","Mato Grosso do Sul","Minas Gerais","Pará","Paraíba","Paraná","Pernambuco","Piauí","Rio de Janeiro","Rio Grande do Norte","Rio Grande do Sul","Rondônia","Roraima","Santa Catarina","São Paulo","Sergipe","Tocantins"];

        $( "#municipios" ).autocomplete({source: municipiosDisponiveis});
        $( "#estados" ).autocomplete({source: estadosDisponiveis});
  });
  </script>
  <script>
    $(function() {
        $(document).on("change",".uploadFile", function()
        {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];

            if (!files.length || !window.FileReader) 
                return; 
    
            if (/^image/.test( files[0].type))
            {
                var reader = new FileReader(); 
                reader.readAsDataURL(files[0]);     
                reader.onloadend = function() { uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")"); }
            }
        });
    });
  </script>
  <script>
    $("#formUsuario").submit(function(e) {
        $('#btn_salvar1').html('Salvando...');
        $.ajax({
            url: "<?= base_url('Aluno/Conta/AlterarUsuario') ?>",
            type: "POST",
            data: $('#formUsuario').serialize(),
            success: function(retorno) {
                $('#btn_salvar1').html('Salvo com sucesso!');
                setTimeout(function() {
                    $('#btn_salvar1').html('Salvar');
                }, 2000);
            }
        });
    });
    $("#formPessoa").submit(function(e) {
        $('#btn_salvar2').html('Salvando...');
        $.ajax({
            url: "<?= base_url('Aluno/Conta/AlterarPessoa') ?>",
            type: "POST",
            data: $('#formPessoa').serialize(),
            success: function(retorno) {
                $('#btn_salvar2').html('Salvo com sucesso!');
                setTimeout(function() {
                    $('#btn_salvar2').html('Salvar');
                }, 2000);  
            }
        });
    });
  </script>
  <?= $this->endSection() ?>