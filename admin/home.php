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
                <h4 class="card-title">Thống kê</h4>
                <div class="table-responsive">
                    <table class="table text-center table-bordered table1">
                        <thead>
                            <tr>
                                <th>Số người dùng</th>
                                <th>Tổng khóa học</th>
                                <th>Tổng từ vựng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $countUser; ?>
                                </td>
                                <td>
                                    <?php echo $countKhoahoc; ?>
                                </td>
                                <td>
                                    <?php echo $countTuVung; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>