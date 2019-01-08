<div class="py-5">
    <div class="transparan"></div>
    <div class="front-transparan">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 pt-4">
                <form action="<?= base_url('/login/auth') ?>" method="post">
                    <div class="form-group">
                        <label for="username">USERNAME</label>
                        <input type="text" name="username" class="form-control rounded-0" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">PASSWORD</label>
                        <input type="password" name="password" class="form-control rounded-0">
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary rounded-0">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>