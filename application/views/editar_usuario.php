<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Atualizar Usuário</h1>
        </div>
    </div>
    <div class="col-md-12">
        <form action="<?= base_url() ?>usuario/salvar_atualizacao" method="post">
            <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $usuario[0]->idUsuario; ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nome">Nome </label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe seu nome..." value="<?= $usuario[0]->nome; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Informe o seu CPF..." value="<?= $usuario[0]->cpf; ?>" required>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Informe o endereço..." value="<?= $usuario[0]->endereco; ?>" required>
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="nivel">Nível</label>
                    <select id="status" class="form-control" name="nivel">
                        <option value="0">---</option>
                        <option value="1" <?= $usuario[0]->nivel == 1 ? ' selected ' : ''; ?>> Administrador </option>
                        <option value="2" <?= $usuario[0]->nivel == 2 ? ' selected ' : ''; ?>> Usuário </option>
                    </select>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="seuemail@dominio.com.br" value="<?= $usuario[0]->email; ?>" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="button" class="btn btn-default btn-block" value="Atualizar Senha" data-toggle="modal" data-target="#myModal">
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status">
                        <option value="0">---</option>
                        <option value="1" <?= $usuario[0]->status == 1 ? ' selected ' : ''; ?>> Ativo </option>
                        <option value="2" <?= $usuario[0]->status == 2 ? ' selected ' : ''; ?>> Inativo </option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="cidades">Cidade</label>
                    <select id="cidade" class="form-control" name="cidade" required>
                        <option value="0">---</option>
                        <?php foreach ($cidades as $cidade) {
                            if ($cidade->idCidade == $usuario[0]->cidade_idCidade) {
                        ?>
                                <option value="<?= $cidade->idCidade ?>" selected><?= $cidade->nome_cid; ?></option>
                            <?php } else { ?>
                                <option value="<?= $cidade->idCidade ?>"><?= $cidade->nome_cid . '-' . $cidade->estado; ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="datanascimento">Data de Nascimento</label>
                        <input type="text" class="form-control" id="datanascimento" name="datanascimento" placeholder="00/00/0000" value="<?= date('d/m/Y', strtotime($usuario[0]->data_nascimento)); ?>" required>
                    </div>
                </div>
                <!-- Campo observações na página inicial: grava a observação na tabela "comentários".-->
                <div class="form-row">
                    <div class="form-group">
                        <div class="col-md-6 form-group">
                            <label for="observacao">Observações:</label>
                            <textarea class="form-control" id="observacoes" name="observacoes" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>



            <div style="text-align: right">
                <button type="submit" class="btn btn-success btn-group">Atualizar</button>
                <button type="reset" class="btn btn-danger btn-group">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>usuario/salvar_senha" method="post">
            <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $usuario[0]->idUsuario; ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Atualizar Senha</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for='senha_antiga'>Senha antiga</label>
                            <input type="password" name="senha_antiga" id="senha_antiga" class="form-control">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for='senha_nova'>Nova senha</label>
                            <input type="password" name="senha_nova" id="senha_nova" onkeyup="checarSenha()" class="form-control">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for='senha_confirmar'>Confirmar senha</label>
                            <input type="password" name="senha_confirmar" id="senha_confirmar" onkeyup="checarSenha()" class="form-control">
                        </div>
                        <div class="col-md-12 form-group">
                            <div id="divcheck">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="enviarsenha">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#senha_nova").keyup(checkPasswordMatch);
        $("#senha_confirmar").keyup(checkPasswordMatch);
    });

    function checarSenha() {
        var password = $("#senha_nova").val();
        var confirmPassword = $("#senha_confirmar").val();

        if (password == '' || '' == confirmPassword) {
            $("#divcheck").html("<span style='color: red'>Campo de senha vazio!</span>");
            document.getElementById("enviarsenha").disabled = true;
        } else if (password != confirmPassword) {
            $("#divcheck").html("<span style='color: red'>Senhas não conferem!</span>");
            document.getElementById("enviarsenha").disabled = true;
        } else {
            $("#divcheck").html("<span style='color: green'>Senhas conferem, salvar!</span>");
            document.getElementById("enviarsenha").disabled = false;
        }
    }
</script>