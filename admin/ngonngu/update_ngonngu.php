<?php
if (is_array($ngonngu)) {
    extract($ngonngu);
}
?>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật khóa học</h4>

                <form class="forms-sample" action="index.php?act=update_ngonngu" method="post">
                    <div class="form-group">
                        <label for="">Languages
                        </label>
                        <input name="language" type="text" value="<?= $language ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Symbol
                        </label>
                        <input name="symbol" type="text" value="<?= $symbol ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Flag
                            <input name="flag" type="text" value="<?= $flag ?>" class="form-control" required>
                            <p>Nhập link ảnh </p>
                        </label>
                    </div>
                    <input type="hidden" name="ID" value="<?= $ID ?>">
                    <div class="form-group mt-3">
                        <input class="btn btn-gradient-primary me-2" type="submit" name="capnhat" value="Cập nhật">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>