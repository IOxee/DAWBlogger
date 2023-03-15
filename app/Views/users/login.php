<?= service('validation')->listErrors(); ?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Inicio de sesión</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/login') ?>" method="POST">
                        <?= csrf_field(); ?>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required value="<?= old('email') ?>" >
                            <?php if (service('validation')->getError('email')): ?>
                                <span style="color:red">
                                    <?= service('validation')->getError('email') ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required value="<?= old('password') ?>">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-dark">Iniciar sesión</button>
                            <div style="color:red">
                                <?= session()->getFlashdata('error'); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>