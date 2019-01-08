<div class="py-1">
	<h3 class="border-bottom border-gray pb-2 mb-3 text-info">
        <i class="fa fa-plus-circle"></i>
        EDIT | MANAGE QUESTION
    </h3>
    <div class="row">
        <div class="col-lg-12">
            <form action="<?= base_url('/manage-question/updated/' . $find->code) ?>" method="post">
                <div class="form-group">
                    <label for="question">QUESTION TEXT</label>
                    <textarea name="question" rows="2" class="form-control rounded-0"><?= $find->question ?></textarea>
                </div>
                <div class="form-group">
                    <label for="answer">ANSWER TEXT</label>

                    <?php foreach ($this->answer->where(["question_id" => $find->code]) as $key => $val) { ?>
                        <input type="hidden" name="id[]" value="<?= $val->id ?>">
                        <div class="row">
                            <div class="col-lg-1 text-right">
                                <label for="answer-01" class="btn btn-default border border-light">ANS-01 :</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" name="answer[]" value="<?= $val->answer ?>" class="form-control rounded-0" autocomplete="off">
                            </div>
                            <div class="col-3">
                                <select name="type[]" class="form-control rounded-0">
                                    <?php if ($val->type == "selection-warning") { ?>
                                        <option value="selection-success">GREEN</option>
                                        <option value="selection-warning" selected>YELLOW</option>
                                        <option value="selection-danger">RED</option>
                                    <?php } else if ($val->type == "selection-danger") { ?>
                                        <option value="selection-success">GREEN</option>
                                        <option value="selection-warning">YELLOW</option>
                                        <option value="selection-danger" selected>RED</option>
                                    <?php } else { ?>
                                        <option value="selection-success">GREEN</option>
                                        <option value="selection-warning">YELLOW</option>
                                        <option value="selection-danger">RED</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="form-group text-right bg-light border-top mt-5 pt-2 pb-4">
                    <button class="btn btn-info rounded-0">
                        <i class="fa fa-save"></i> SAVE
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>