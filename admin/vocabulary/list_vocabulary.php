<style>
.thaotac {
    display: flex;
    flex-direction: row;
    gap: 10px;
}

a {
    text-decoration: none;
}

td {
    line-height: 40px;
}

.btn1 input:nth-child(1) {
    margin-right: 10px;
}

.btn2 {
    padding-left: 30px;
    padding-right: 30px;
}

.table1 thead tr th {
    font-weight: 600;
    font-size: 1rem;
}
</style>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Quản lý từ vựng</h4>
                <div class="table-responsive">
                    <table class="table text-center table-bordered table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Vocabulary</th>
                                <th>Image</th>
                                <th>Sound</th>
                                <th>Meaning</th>
                                <th style="width: 22%;">Thao táct</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $i = 1;
                            foreach ($listtuvung as $tuvung) {
                                extract($tuvung);
                                $suasp = "index.php?act=edit_vocabulary&ID=" . $ID;
                                $xoasp = "index.php?act=delete_vocabulary&ID=" . $ID;
                                $hinhpath = "assets/upload/" . $image;
                                $pathsound = "assets/upload/" . $sound;
                                if (is_file($pathsound)) {
                                    $sound = "<audio controls> <source src='" . $pathsound . "' type='audio/mp3'> </audio>";
                                } else {
                                    $sound = "No photo";
                                }
                                if (is_file($hinhpath)) {
                                    $image = "<img src='" . $hinhpath . "' height='80'>";
                                } else {
                                    $image = "No photo";
                                }
                                echo '<tr>
                <td>' . $i . '</td>
                <td>' . $vocabulary . '</td>
                <td>' . $image . '</td>
                <td>' . $sound . '</td>
                <td>' . $meaning . '</td>
              
                <td class="btn1">
                  <a href="' . $suasp . '"><input class="btn btn-gradient-primary btn2" type="button" value="Sửa"></a>
                  <a href="' . $xoasp . '"><input class="btn btn-gradient-danger btn2" type="button" value="Xóa"></a>
                </td>
              </tr>';
                            }
                            $i++;
                            ?>
                            <!-- Các dòng khác sẽ ở đây -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="thaotac">
    <div class="">
        <a href="index.php?act=add_vocabulary"><input class="btn btn-gradient-primary" type="button"
                value="Thêm mới từ vựng"></a>
    </div>
</div>