<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin/">Админпанель</a></li>
                    <li><a href="/admin/article">Управление статьями</a></li>
                    <li class="active">Создать статью</li>
                </ol>
            </div>


            <h4>Добавить новую статью</h4>

            <br/>

                    <?php if (Session::hasFlashError()) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php Session::flashError(); ?>
                        </div>
                    <?php } ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название статьи</p>
                        <input type="text" name="title" placeholder="" value="">

                        <p>Категория</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>

                                    <option value="<?=$category['id']?>">
                                        <?=$category['title']?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>

                        <p>Изображение для статьи</p>
                        <input type="file" name="image" placeholder="" value="">

                        <p>Детальное описание</p>
                        <textarea name="description"></textarea>

                        <br/><br/>

                        <p>Аналитика</p>
                        <select name="analytic">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Теги</p>
                        <select name="tags[]" multiple size="10" >
                            <?php if (is_array($tagsList)): ?>
                                <?php foreach ($tagsList as $tag): ?>

                                    <option value="<?=$tag['id']?>">
                                        <?=$tag['name']?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
