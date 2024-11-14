<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm mới câu hỏi</h4>

                <form class="forms-sample" action="index.php?act=add_cauhoi" method="POST">
                    <div class="form-group">
                        <label for="">question
                        </label>
                        <input name="question" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">type
                        </label>
                        <input name="type" type="text" class="form-control" required maxlength="5">
                    </div>
                    <select name=" ID_vocabulary" id="" class="form-control" required>
                        <?php
                        foreach ($listtuvung as $lessons) {
                            extract($lessons);
                            echo "<option value=" . $ID . ">" . $vocabulary . "</option>";
                        }
                        ?>
                    </select>
                    <div class="form-group mt-3">
                        <input class="btn btn-gradient-primary me-2" type="submit" name="themmoi" value="Thêm mới">
                    </div>
                </form>

            </div>
        </div>
    </div>