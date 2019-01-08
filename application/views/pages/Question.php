<div class="text-center py-5">
    <div class="transparan"></div>
    <div class="front-transparan">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="border-bottom border-gray pb-2 pt-5 mb-3 text-info">
                    <?= strtoupper($find->question) ?>
                </h1>
            </div>
            <div class="col-lg-4 offset-lg-4">
                <?php $indexList = 0; ?>
                <?php $listItem = ["A", "B", "C", "D", "E"] ?>
                <?php foreach ($this->answer->where(["question_id" => $find->code]) as $key => $val) { ?>
                    <form action="<?= base_url('/question/answer/' . ($this->session->userdata("index") + 1)) ?>" method="post">
                        <input type="hidden" value="<?= $val->id ?>" name="answer">
                        <input type="hidden" value="<?= $val->type ?>" name="type">
                        <button type="submit" class="selection <?= $val->type ?>">
                            <span class="selection-item"><?= $listItem[$indexList] ?></span>
                            <?= $val->answer ?>
                        </button>
                    </form>
                    <?php $indexList++; ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>