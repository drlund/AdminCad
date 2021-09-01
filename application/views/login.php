    <div class="container">

    <?php if($this->session->flashdata("success")): ?>
            <p class="alert alert-success"><?= $this->session->flashdata("success")?></p>
        <?php endif; ?>

        <?php if($this->session->flashdata("danger")): ?>
            <p class="alert alert-danger"><?= $this->session->flashdata("danger")?></p>
        <?php endif; ?>

        <form class="form-signin" role="form" method="POST" action="<?= base_url()?>dashboard/logar">
            <h2 class="form-signin-heading">Acesso restrito</h2>
            <label for="inputEmail" class="sr-only">Endereço de e-mail</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" name="email" required autofocus>
            <label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
    </div>