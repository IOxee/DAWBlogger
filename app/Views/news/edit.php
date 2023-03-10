<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<h3 class="text-center"> Crear publicació </h3>
<div class="container-fluid my-6 d-flex justify-content-center">
    <form action=<?= base_url('news/edit') ?> method="post">
        <?= csrf_field() ?>

        <input type="hidden" name="id" value="<?= $news['id'] ?>">

        <div class="mb-3">
            <label for="title" class="form-label">Títol</label>
            <input type="text" style="width:500px" class="form-control" id="title" name="title"
                value="<?= $news['title'] != null ? $news['title'] : set_value('title') ?>"
                placeholder="Titól de la publicació">
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">
                <b>Contingut</b>
            </label>
            <a href="https://www.markdownguide.org/cheat-sheet/" title="Markdown Guide" target="_blank">
                <i class="bi bi-markdown"></i>
            </a>
            <textarea class="form-control" id="body" style="width:500px" name="body" rows="4"
                placeholder="Contingut de la publicació"><?= $news['body'] != null ? $news['body'] : set_value('body') ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>