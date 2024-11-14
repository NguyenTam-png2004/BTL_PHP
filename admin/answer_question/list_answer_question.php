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
                <h4 class="card-title">Answer_Question</h4>
                <div class="table-responsive">
                    <table class="table text-center table-bordered table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Câu hỏi</th>
                                <th>Câu trả lời</th>
                                <th style="width: 22%;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($listanswers as $baihoc) {
                                extract($baihoc);
                                $xoasp = "index.php?act=delete_answer_question&ID=" . $ID;
                                echo '<tr>
                <td>' . $i . '</td>
                <td>' . $question . '</td>
                <td>' . $answer  . '</td>
              
                <td class="btn1">
                  <a href="' . $xoasp . '"><input class="btn btn-gradient-danger btn2" type="button" value="Xóa"></a>
                </td>
              </tr>';
                            }
                            $i++;
                            ?>
                            <!-- Thêm các dòng khác ở đây -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>