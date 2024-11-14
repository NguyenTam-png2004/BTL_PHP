<?php
// check $khoahoc có phải là 1 mảng hay không
// nếu nó là mảng thì nó sẽ giải nét ra các thành phần chưa trong nó thành các biến dữ liệu con nhỏ
if (is_array($khoahoc)) {
  extract($khoahoc);
}
?>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật khóa học</h4>

                <form class="forms-sample" action="index.php?act=update_khoahoc" method="post">
                    <input type="hidden" name="ID" value="<?= $ID ?>">
                    <div class="form-group">
                        <label for="">Tên ngôn ngữ
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
                    <div class="form-group">
                        <label for="">Tên khóa học</label>
                        <input name="course" type="text" value="<?= $course ?>" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <input class="btn btn-gradient-primary me-2" type="submit" name="capnhat" value="Cập nhật">
                        <input class="btn btn-secondary" type="reset" value="Nhập lại">
                        <a href="index.php?act=list_khoahoc">
                            <input class="btn btn-gradient-primary me-2" type="button" value="Danh sách">
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>