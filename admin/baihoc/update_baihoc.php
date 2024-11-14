<?php
if (is_array($baihoc)) {
    extract($baihoc);
}
$hinhpath = "assets/upload/" . $image;
if (is_file($hinhpath)) {
    $image = "<img src='" . $hinhpath . "' height='80'>";
} else {
    $image = "No photo";
}
?>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật bài học</h4>
                <form action="index.php?act=update_baihoc" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="ID" value="<?= $ID ?>">
                    <div class="form-group">
                        <label for="">Thứ tự bài học</label>
                        <input name="lesson_order" value="<?= $lesson_order ?>" type="text" class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="">Tên bài học</label>
                        <input name="lesson" value="<?= $lesson ?>" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tên khoa hoc
                        </label>
                        <select name="ID_course" id="" class="form-control" required>
                            <?php
                            foreach ($listkhoahoc as $khoahoc) {
                                extract($khoahoc);
                                if ($ID_course == $ID) $s = "selected";
                                else $s = "";
                                echo "<option value=" . $ID . " '.$s.'>" . $course . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <input name="image" type="file" class="form-control">
                        <?= $image ?>
                    </div>
                    <div class="form-group">
                        <label for="">Mô Tả</label>
                        <input name="description" value="<?= $description ?>" type="text" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <input type="hidden" name="size_id">
                        <input type="hidden" name="product_id" value="<?= $product_id ?>">
                        <input class="btn btn-primary" type="submit" name="capnhatpr" value="Cập nhật">

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>