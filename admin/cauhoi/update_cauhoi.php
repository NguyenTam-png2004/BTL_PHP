<?php
if (is_array($cauhoi)) {
    extract($cauhoi);
}
?>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật câu hỏi</h4>

                <form class="forms-sample" action="index.php?act=update_cauhoi" method="post">
                    <div class="form-group">
                        <label for="">Question
                        </label>
                        <input name="question" value="<?= $question ?>" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Type
                        </label>
                        <input name="type" type="text" value="<?= $type ?>" class="form-control" required maxlength="5">
                    </div>
                    <select name=" ID_vocabulary" id="" class="form-control" required>
                        <?php
                        foreach ($listtuvung as $lessons) {
                            extract($lessons);
                            if ($ID_vocabulary == $ID) $s = "selected";
                                else $s = "";
                                echo "<option value=" . $ID . " '.$s.'>" . $vocabulary  . "</option>";
                        }
                        ?>
                    </select>
                    <input type="hidden" name="ID" value="<?= $ID ?>">
                    <div class="form-group mt-3">
                        <input class="btn btn-gradient-primary me-2" type="submit" name="capnhat" value="Cập nhật">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>