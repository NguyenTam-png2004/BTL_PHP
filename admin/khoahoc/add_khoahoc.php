<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm mới khóa học</h4>

                <form class="forms-sample" action="index.php?act=add_khoahoc" method="POST">

                    <div class="form-group">
                        <label for="">Tên ngôn ngữ
                        </label>
                        <select name="ID_language" id="" class="form-control" required>
                            <?php
                            foreach ($listngonngu as $ngonngu) {
                                extract($ngonngu);
                                echo "<option value=" . $ID . ">" . $language . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tên khóa học
                        </label>
                        <input name="course" type="text" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <input class="btn btn-gradient-primary me-2" type="submit" name="btn_add_categori"
                            value="Thêm mới">
                    </div>
                </form>

            </div>
        </div>
    </div>