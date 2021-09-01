<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="col-md-10">
    <h1 class="page-header">Usuários</h1>
  </div>
  <div class="col-md-2">
    <a class="btn btn-primary btn-block" href="<?= base_url() ?>usuario/cadastro">Novo Usuário</a>
  </div>

  <div class="col-md-12" style="padding-bottom: 10px">
    <form action="<?= base_url() ?>usuario/pesquisar" method="POST">
      <div class="row">
        <div class="col-md-10">
          <input type="text" class="form-control" name="pesquisar" placeholder="Pesquisar por...">
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-success btn-block">Pesquisar</button>
        </div>
      </div>
    </form>
  </div>


  <div class="col-md-12">
    <table class="table table-striped">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Nível</th>
        <th>Cidade</th>
        <th>Status</th>
        <th></th>
        <th></th>
      </tr>
      <?php foreach ($usuario as $usu) { ?>
        <tr>
          <td><?= $usu->idUsuario; ?></td>
          <td><?= $usu->nome; ?></td>
          <td><?= $usu->email; ?></td>
          <td><?= $usu->nivel == 1 ? 'Administrador' : 'Usuário'; ?></td>
          <td><?= $usu->nome_cid . '-' . $usu->estado; ?></td>
          <td><?= $usu->status == 1 ? 'Ativo' : 'Inativo'; ?></td>
          <td>
            <a href="<?= base_url('usuario/atualizar' . '/' . $usu->idUsuario) ?>" class="btn btn-primary btn-group">Atualizar</a>
            <a href="<?= base_url('usuario/excluir' . '/' . $usu->idUsuario) ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir o usuário?');">Excluir</a>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>

  

</div>