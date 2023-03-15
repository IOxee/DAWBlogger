<?= service('validation')->listErrors(); ?>

<div class="container overflow-auto">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Formulario de contacto</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('contact') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required value="<?= old('name') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required value="<?= old('email') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Asunto</label>
                            <input type="text" class="form-control" id="subject" name="subject" required value="<?= old('subject') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required><?= old('message') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <?= $captcha . " " . $text  ?>
                            <input type="text" class="form-control my-1" id="captcha" name="captcha" required>
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>

                        <div style="color:red">
                            <!-- Array to string conversion session()->getFlashdata('error'); ?> -->
                            <?php 
                                if (session()->getFlashdata('error')) {
                                    $errors = session()->getFlashdata('error');
                                    foreach ($errors as $error) {
                                        echo $error;
                                    }
                                }
                                
                            ?>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>