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

.table1 thead tr th {
    font-weight: 600;
    font-size: 1rem;
}

.btn2 {
    padding-left: 30px;
    padding-right: 30px;
}

.boloc2 {
    display: flex;
    justify-content: space-between;
}

.boloc select {
    height: 38px;
}

.list_page {
    margin-top: 1rem;
}

.list_page ul {
    display: flex;
    justify-content: end;
    gap: 10px;
    list-style: none;
}

.list_page ul li {
    background-color: grey;
    padding: 0.2rem 0.6rem;
    border-radius: .3rem;
}

.list_page ul li a {
    color: #FFFFFF;
}
</style>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Quản lý khóa học</h2>
                <form class="boloc" action="index.php?act=list_khoahoc" method="post">
                    <div class="boloc2 form-group">
                        <div class="thaotac">
                            <a href="index.php?act=add_khoahoc"><input class="btn btn-gradient-primary" type="button"
                                    value="Thêm khóa học"></a>
                        </div>
                        <div class="boloc3 d-flex">
                            <select name="ID_language" id="" class="form-select"
                                style="height:50px; width:100px; padding:5px 10px; border:1px solid #ebedf2">
                                <option value="0" selected>Tất cả</option>
                                <?php
                                foreach ($listngonngu as $ngonngu) {
                                    extract($ngonngu);
                                    echo "<option value=" . $ID . ">" . $language . "</option>";
                                }
                                ?>
                            </select>
                            <input type="text" name="course" class="form-control" placeholder="Search..."
                                style="width:260px; margin: 0 10px;" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Search...'">
                            <button type="submit" class="btn btn-gradient-primary" name="search_dm"
                                value="Search">Search</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table text-center table-bordered table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên khóa học</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $khoahoc là 1 item trong mảng listkhoahoc
                            // extract giải nét $khoahoc thành các biến dữ liệu con 
                            foreach ($listkhoahoc as $khoahoc) {
                                extract($khoahoc);
                                $suasp = "index.php?act=edit_khoahoc&ID=" . $ID;
                                $xoasp = "index.php?act=delete_khoahoc&ID=" . $ID;

                                echo '<tr>
                <td>' . $ID . '</td>
                <td>' . $course . '</td>
                
                <td class="btn1">
                  <a href="' . $suasp . '"><input class="btn btn-gradient-primary btn2" type="button" value="Sửa"></a>
                  <a href="' . $xoasp . '"><input class="btn btn-gradient-danger btn2" type="button" value="Xóa"></a>
                </td>
              </tr>';
                            }
                            ?>
                            <!-- Các dòng khác sẽ ở đây -->
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>