<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Каталог</h2>
                        <div class="panel-group category" id="accordian">
                            <?php foreach ($categories as $categoryItem): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="/category/<?php echo $categoryItem['id'];?>">
                                                <?php echo $categoryItem['title'];?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <div class="row">
                            <div class="col-sm-5">
                                <?php foreach ($articleList as $article): ?>
                                    <p><a href="/article/<?=$article['id']?>"><?=$article['title']?></a></p>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                </div>

    </section>

    <div class="container contPagination">
    <h5>
            <?php echo $pagination->get(); ?>
    </h5>
    </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>