<div class="px-3">
    <form action="<?= base_url('/about/updated') ?>" method="post">
        <h3 class="border-bottom border-gray pb-2 mb-3 text-info">
            <div class="row bg-light py-2">
                <span class="col-lg-9">
                    <i class="fa fa-info-circle"></i>
                    ABOUT
                </span>

                <?php if ($this->session->userdata("isLogin")) { ?>
                    <span class="col-lg-3 pull-right text-right">
                        <?php if ($page == "edit") { ?>
                            <button type="submit" class="btn btn-secondary rounded-0">
                                <i class="fa fa-save"></i> SAVE
                            </button>
                        <?php } ?>

                        <a href="<?= base_url('/about/edit') ?>" class="btn btn-secondary rounded-0">
                            <i class="fa fa-edit"></i> EDIT
                        </a>
                    </span>
                <?php } ?>
            </div>
        </h3>
        <div class="row bg-light py-2" style="min-height: 370px">
            <div class="col-lg-12 text-justify">
                <?php if ($page == "edit") { ?>
                    <textarea name="content" class="tinymce" rows="12"><?= $this->page->find()->content ?></textarea>

                    <script>
                    tinymce.init({
                        selector: '.tinymce',
                        menubar: false,
                    });
                    </script>
                <?php } else { ?>
                    <?= $this->page->find()->content ?>
                <?php } ?>
            </div>
        </div>
    </form>
</div>