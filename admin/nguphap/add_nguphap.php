<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm ngữ pháp</h4>
                <form action="index.php?act=add_nguphap" enctype="multipart/form-data" method="post">
                    <!-- <div class="form-group">
              <label for="">ID</label>
              <input disabled name="product_id" type="text" class="form-control">
            </div>  -->
                    <div class="form-group">
                        <label for="">Tên ngữ pháp</label>
                        <input name="name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Ngữ pháp</label>
                        <input name="grammar" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Ngôn ngữ
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
                    <div class="form-group mt-3">
                        <input class="btn btn-primary" type="submit" name="themmoi" value="Thêm mới">
                        <input class="btn btn-secondary" type="reset" value="Nhập lại">
                        <a href="index.php?act=list_nguphap"><input class="btn btn-primary" type="button"
                                value="Danh sách"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>