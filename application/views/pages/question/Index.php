<div class="py-1">
	<h3 class="border-bottom border-gray pb-2 mb-3 text-info">
        <i class="fa fa-question-circle-o"></i>
        MANAGE QUESTION

        <a href="<?= base_url('/manage-question/add') ?>" class="btn btn-info pull-right rounded-0">
            <i class="fa fa-plus-circle"></i>
            NEW QUESTION
        </a>
    </h3>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-bordered datatables" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>CODE QUESTION</th>
                        <th>QUESTION TEXT</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->question->get() as $key => $val) { ?>
                        <tr>
                            <td width="5%"><i class="fa fa-plus-circle"></i></td>
                            <td width="18%"><?= $val->code ?></td>
                            <td><?= strtoupper($val->question) ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('/manage-question/edit/' . $val->code) ?>" class="btn btn-secondary btn-sm rounded-0"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm rounded-0" onclick="deleted('<?= base_url('/manage-question/delete/' . $val->code) ?>')" data-toggle="modal" data-target=".modal-delete"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="delete-modal"><i class="fa fa-trash-o"></i> DELETE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do You Will Delete this Data?
            </div>
            <div class="modal-footer text-right">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-refresh"></i> NO
                </a>
                <a href="" class="btn btn-danger btn-delete-action">
                    <i class="fa fa-trash-o"></i> YES
                </a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.datatables').DataTable();
});

function deleted(url) {
    $(".btn-delete-action").attr("href", url);
}
</script>