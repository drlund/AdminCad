<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="col-md-12">
    <h1 class="page-header">Novo Usuário</h1>
  </div>
  <div class="col-md-12">
    <form action="<?= base_url() ?>usuario/cadastrar" method="POST">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="nome">Nome </label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe seu nome..." required>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-md-3">
          <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Informe o seu CPF..." required>
          </div>
        </div>

        <div class="col-md-7">
          <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Informe o endereço..." required>
          </div>
        </div>

        <div class="col-md-2">
          <label for="nivel">Nível</label>
          <select id="status" class="form-control" name="nivel">
            <option value="0">---</option>
            <option value="1">Administrador</option>
            <option value="2">Usuário</option>
          </select>
        </div>

      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="seuemail@dominio.com.br" required>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe a senha" required>
          </div>
        </div>

        <div class="col-md-2">
          <label for="status">Status</label>
          <select id="status" class="form-control" name="status">
            <option value="0">---</option>
            <option value="1">Ativo</option>
            <option value="2">Inativo</option>
          </select>
        </div>

        <div class="col-md-3">
          <label for="cidades">Cidade</label>
          <select id="cidade" class="form-control" name="cidade" required>
            <option value="0">---</option>
            <?php foreach ($cidades as $cidade) { ?>
              <option value="<?= $cidade->idCidade ?>"><?= $cidade->nome_cid . '-' . $cidade->estado; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="datanascimento">Data de Nascimento</label>
            <input type="text" class="form-control" id="datanascimento" name="datanascimento" placeholder="00/00/0000" required>
          </div>
        </div>

        <!-- Campo observações na página inicial: grava a observação na tabela "comentários".-->
            <div class="form-group">
              <div class="col-md-6 form-group">
                <label for="observacao">Observações:</label>
                <textarea class="form-control" id="observacoes" name="observacoes" rows="5"></textarea>
              </div>
            </div>

      </div>

      <div style="text-align: right">
        <button type="submit" class="btn btn-success btn-group">Enviar</button>
        <button type="reset" class="btn btn-danger btn-group">Cancelar</button>
      </div>
    </form>
  </div>
</div>