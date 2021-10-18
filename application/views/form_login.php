<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

            <div class="card card-primary mt-5">
              <div class="card-header">
                <h4>Silahkan Login</h4>
              </div>
              <div class="card-body">
                <span class="mb-4"><?= $this->session->flashdata('pesan'); ?></span>
                <form method="POST" action="<?= base_url('auth/login'); ?>">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" autofocus>
                    <?= form_error('username', '<div class="text-small text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2">
                    <?= form_error('password', '<div class="text-small text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <div class="text-muted text-center">
                  Belum punya akun? <a href="<?= base_url('register'); ?>"> Register</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>