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

  .table1 thead tr th:nth-child(6) td {
    width: 200px;
    word-break: break-all;
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
        <h2 class="card-title">Quản lý bài học</h2>
        <form class="boloc" action="#" method="post">
          <div class="boloc2 form-group">
            <div class="thaotac">
              <a href="index.php?act=add_baihoc"><input class="btn btn-gradient-primary" type="button" value="Thêm bài học"></a>
            </div>
            <div class="boloc3 d-flex">
              <select name="ID_course" id="" class="form-select" style="height:50px ; width:100px;padding:5px 10px;border:1px solid #ebedf2">
                <option value="0">Tất cả</option>
                <?php
                foreach ($listkhoahoc as $khoahoc) {
                  extract($khoahoc);
                  echo "<option value=" . $ID . ">" . $course . "</option>";
                }
                ?>
              </select>
              <input type="text" name="lesson" class="form-control" placeholder="Search..." style="width:260px;margin: 0 10px;" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search...'">
              <button type="submit" class="btn btn-gradient-primary" name="search_dm" value="Search">Search</button>
            </div>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table text-center table-bordered table1">
            <thead>
              <tr>
                <th>ID</th>
                <th>Thứ tự bài học</th>
                <th>Tên bài học</th>
                <th>Image</th>
                <th>Description</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($listbaihoc as $baihoc) {
                extract($baihoc);
                $suasp = "index.php?act=edit_baihoc&ID=" . $ID;
                $xoasp = "index.php?act=delete_baihoc&ID=" . $ID;
                $hinhpath = "assets/upload/" . $image;
                if (is_file($hinhpath)) {
                  $image = "<img src='" . $hinhpath . "' height='80'>";
                } else {
                  $image = "No photo";
                }
                echo '<tr>
                <td>' . $ID . '</td>
                <td>' . $lesson_order  . '</td>
                <td>' . $lesson . '</td>
                <td>' . $image . '</td>
                <td>' . $description . '</td>
              
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