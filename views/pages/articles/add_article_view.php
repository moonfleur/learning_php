<div class="container">
    <form  class="form-horizontal" role="form" action="/articles/addArticle.php" method="post">
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="title">Введіть назву статті</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Введіть назву статті" required autofocus value="<?php if(isset($old_values['title'])) echo $old_values['title']; ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-3 <?php if(!empty($errors) && isset($errors['title_field'])) echo "d-none"; ?>">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <?php if(!empty($errors) && isset($errors['title_field'])) echo $errors['title_field']; ?>
                        </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="content">Введіть текст статті</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <textarea class="form-control" name="content" id="content" cols="30" rows="10"><?php if(!empty($old_values) && isset($old_values['content'])) echo $old_values['content']; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-3 <?php if(!empty($errors) && isset($errors['content_field'])) echo "d-none"; ?>">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <?php if(!empty($errors) && isset($errors['content_field'])) echo $errors['content_field']; ?>
                        </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary w-100">Додати</button>
            </div>
        </div>
    </form>
</div>