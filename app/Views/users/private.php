<div class="container mt-5">
    <div class="row d-flex" style="justify-content: center;">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center">
                    <img src="https://raw.githubusercontent.com/IOxee/DelawareTelegraph/main/app/assets/img/default_user.jpg" class="rounded-circle" width="100" height="100" alt="avatar">
                </div>
            
                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0">
                        <?= strtoupper(substr(session()->get('name'), 0, 1)) . substr(session()->get('name'), 1); ?>
                    </h5>
                </div>

                <div class="px-4 mt-1">
                    <h4 class="text-center mt-3">Biografía</h4>
                    <p class="text-center mt-3">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut sollicitudin massa, id ullamcorper urna. Aenean sit amet tellus in lorem suscipit euismod. Sed ullamcorper felis id est bibendum, eu ultricies purus dignissim. Pellentesque auctor metus vel orci gravida, eu lacinia lacus rhoncus. Integer laoreet sagittis risus, in maximus arcu varius vel. Suspendisse potenti. Vivamus ullamcorper nisl velit, sed tempor velit cursus non. Praesent id magna lobortis, tincidunt lorem eget, sodales ipsum.
                    </p>
                </div>

                <ul class="social-list">
                    <li href=""><i class="bi bi-facebook"></i></li>
                    <li href=""><i class="bi bi-twitter"></i></li>
                    <li href=""><i class="bi bi-instagram"></i></li>
                    <li href=""><i class="bi bi-linkedin"></i></li>
                    <li href=""><i class="bi bi-github"></i></li>
                </ul>

                <?php if (session()->get("role") == "admin") : ?>
                    <div class="text-center mt-3">
                        <a href="<?= base_url('admin') ?>" class="btn btn-outline-dark px-4 mb-3"><i class="bi bi-shield-lock mx-2"></i>Admin</a>
                    </div>
                <?php endif; ?>

                <div class="text-center">
                    <a href="<?= base_url('logout') ?>" class="btn btn-outline-dark px-4 mb-3"><i class="bi bi-box-arrow-right mx-2"></i>Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>