<?php if (!empty($news) && is_array($news)): ?>

    <?php foreach ($news as $news_item): ?>
        <?php if (strtotime($news_item['published_at']) > strtotime(date('Y-m-d H:i:s')))
            continue; ?>

        <div class="container-fluid mt-3">
            <div id="news_container_div_cards" class="d-flex flex-nowrap justify-content-center flex-row center">
                <div class="card" style="width: 18rem; margin: 5px;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $news_item['title'] ?>
                        </h5>
                        <p class="card-text max-lines">
                            <?= $news_item['body'] ?>
                        </p>
                        <p class="card-text">
                            <i class="fas fa-clock mx-2"></i><small class="text-muted">
                                <?= esc($news_item['published_at']) ?>
                            </small>
                        </p>
                        <span class="badge bg-dark text-white mx-1"></span>
                        <a href="<?= base_url('news/' . esc($news_item['slug'], 'url')) ?>"
                            class="btn btn-outline-dark my-2">Veure Publicació</a>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>