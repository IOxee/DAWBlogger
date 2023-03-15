<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registro</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/register') ?>" method="POST">
                        <?= csrf_field(); ?>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre de usuario</label>
                            <input type="text" class="form-control" id="name" name="name" required
                                value="<?= old('name') ?>">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                value="<?= session()->getFlashdata('email') ? session()->getFlashdata('email') : old('email') ?>"
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Nunca compartiremos tu correo electrónico con nadie
                                más.</div>
                            <?php if (service('validation')->getError('email')): ?>
                                <span style="color:red">
                                    <?= service('validation')->getError('email') ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required
                                value="<?= old('password') ?>" aria-describedby="passwordHelp">
                            <div id="passwordHelp" class="form-text">
                                No compartas tu contraseña con nadie.
                                <a href="#" data-bs-toggle="modal" data-bs-target="#passwordModal">¿Qué debe tener una
                                    contraseña segura?</a>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm"
                                required value="<?= old('password_confirm') ?>">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-dark">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordModalLabel">¿Qué debe tener una contraseña segura?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Para que una contraseña sea segura, debe tener al menos:</p>
                <ul>
                    <li>Por lo menos 8 caracteres</li>
                    <li>Una combinación de letras, números y símbolos <b>(#1x3t4@l)</b> </li>
                    <li>No ser una palabra común o fácil de adivinar</li>
                    <li>Un cambio regular de contraseña cada 3 meses</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>