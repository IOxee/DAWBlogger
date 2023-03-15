<div class="container">
    <div class="row">
        <div class="col">
            <!-- PHP If session get flasshdata type == success -->
            <?php if (session()->getFlashdata('type') == 'success') : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> <?= session()->getFlashdata('message') ?>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('type') == 'error') : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= session()->getFlashdata('message') ?>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="card mx-5">
        <div class="card-title m-2">
            <h4 class="text-center">Crear un nuevo grupo</h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/cgroup') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="card2TextGroup" class="form-label">Nombre del grupo</label>
                    <input type="text" class="form-control" id="card2TextGroup" name="nameOfRole" placeholder="Invitado">
                </div>

                <div class="mb-3">
                    <label for="card2SelectRole" class="form-label">Nivel de permisos</label>
                    <input type="number" class="form-control" id="card2SelectRole" name="levelOfPermissions" placeholder="000 - 777">
                </div>


                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-title m-2">
            <h4 class="text-center">Asignar un grupo a un usuario</h4>
        <div class="card-body">
            <form action="<?= base_url('admin/setGroup') ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="mb-3">
                    <!-- Open PHP Tag and create a foreach of $users in dropdown tag-->
                    <label for="card3SelectUser" class="form-label">Usuarios</label>

                    <select class="form-select" aria-label="Default select example" name="userSelect">
                    <?php foreach ($users as $user) : ?>
                        <option selected value="<?= $user['email'] ?>"><?= strtoupper(substr($user['name'], 0, 1)) . substr($user['name'], 1) . " | " . $user['email'] ?></option>
                    <?php endforeach; ?>
                    </select>

                </div>

                <div class="mb-3">
                    <label for="card3SelectRole" class="form-label">Grupo</label>
                    <select class="form-select" aria-label="Default select example" name="roleSelect">
                    <?php foreach ($roles as $role) : ?>
                        <option selected value="<?= $role['name'] ?>"><?= strtoupper(substr($role['name'], 0, 1)) . substr($role['name'], 1) . " | " . $role['permissions'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>