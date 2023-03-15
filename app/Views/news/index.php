<div class='container' style='margin-top: 20px;'>
    <!-- Search form -->
    <form method='get' action="<?= base_url(''); ?>" id="searchForm">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name='q' value='<?= $search ?>' placeholder="Buscar...">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick='document.getElementById("searchForm").submit();'>Buscar</button>
        </div>
    </form>
    <br />

    <?php if (!empty($news) && is_array($news)): ?>
        <table class="table align-middle mb-0 bg-white mx-auto">
            <thead class="bg-light">
                <tr>
                    <th class="header-cell">
                        <a href="<?= base_url('id/' . $order . '?q=' . $search) ?>" class="link-dark text-decoration-none">ID
                            <i class="<?php if ($last_order_by == 'id')
                                echo $sort_icon ?>"></i>
                            </a>
                        </th>
                        <th class="header-cell">
                            <a href="<?= base_url('title/' . $order . '?q=' . $search) ?>" class="link-dark text-decoration-none">Títol
                            <i class="<?php if ($last_order_by == 'title')
                                echo $sort_icon ?>"></i>
                            </a>
                        </th>
                        <th class="header-cell">
                            <a href="<?= base_url('body/' . $order . '?q=' . $search) ?>" class="link-dark text-decoration-none">Text
                            <i class="<?php if ($last_order_by == 'body')
                                echo $sort_icon ?> ?>"></i>
                            </a>
                        </th>
                        <th class="header-cell">
                            <a href="<?= base_url('published_at/' . $order . '?q=' . $search) ?>" class="link-dark text-decoration-none">Data de publicació
                            <i class="<?php if ($last_order_by == 'published_at')
                                echo $sort_icon ?> ?>"></i>
                            </a>
                        </th>
                        <th class="header-cell">
                            Accions
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($news as $news_item): ?>
                    <tr>
                        <td>
                            <?= $news_item['id'] ?>
                        </td>
                        <td>
                            <?= $news_item['title'] ?>
                        </td>
                        <td>
                            <?= $news_item['body'] ?>
                        </td>
                        <td>
                            <?= $news_item['published_at'] ?>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="<?= base_url('news/' . $news_item['id']) ?>" class="btn btn-outline-dark my-2">Veure</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>


        <div style='margin-top: 10px;'>
            <?= $pager->only(['q', 'order'])->links() ?>
        </div>
    </div>



<?php else: ?>
    <div class="container d-flex justify-content-center" style="margin-top: 20px">
        <div class="row">
            <div class="col-12 ">
                <img src="https://media.giphy.com/media/3o7TKsQ8UQYoBNnGZq/giphy.gif" alt="nyan cat" class="img-fluid">
            </div>
        </div>
    </div>

<?php endif ?>