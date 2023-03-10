<div class="container">
    <div  class="row">
        <div class="col-12">
            <a href="/" class="btn btn-outline-dark my-2">Tornar</a>
            <div class="float-end">
                <a href="<?= base_url('news/edit/' . esc($news['id'])) ?>" class="btn btn-outline-dark my-2">Editar</a>
                <a href="<?= base_url('news/delete/' . esc($news['id'])) ?>" class="btn btn-outline-dark my-2">Eliminar</a>

        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <h1 class="text-center"><?= $news['title'] ?></h1>
            <p class=""><?= $news['body'] ?></p>
            <div class="mb-5"></div>
        </div>
    </div>
</div>

