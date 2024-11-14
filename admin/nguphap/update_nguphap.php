<?php
if (is_array($nguphap)) {
  extract($nguphap);
}
?>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhập ngữ pháp</h4>
                <form action="index.php?act=update_nguphap" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="ID" value="<?= $ID ?>">
                    <div class="form-group">
                        <label for="">Tên ngữ pháp</label>
                        <input name="name" type="text" class="form-control" value="<?= $name ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Ngữ pháp</label>
                        <input name="grammar" type="text" class="form-control" value="<?= $grammar ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="">Ngôn ngữ
                        </label>
                        <select name="ID_language" id="" class="form-control" required>
                            <?php
              foreach ($listngonngu as $ngonngu) {
                extract($ngonngu);
                if ($ID_language == $ID) $s = "selected";
                else $s = "";
                echo "<option value=" . $ID . " '.$s.'>" . $language . "</option>";
              }
              ?>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <input class="btn btn-primary" type="submit" name="capnhat" value="Cập nhật">
                        <input class="btn btn-secondary" type="reset" value="Nhập lại">
                        <a href="index.php?act=list_nguphap"><input class="btn btn-primary" type="button"
                                value="Danh sách"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>