<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm mới ngôn ngữ</h4>

                <form class="forms-sample" action="index.php?act=add_ngonngu" method="POST">
                    <div class="form-group">
                        <label for="">Languages
                        </label>
                        <input name="language" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Symbol
                        </label>
                        <input name="symbol" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Flag
                            <input name="flag" type="text" class="form-control">
                            <p>Nhập link ảnh </p>
                        </label>
                    </div>
                    <div class="form-group mt-3">
                        <input class="btn btn-gradient-primary me-2" type="submit" name="themmoi" value="Thêm mới">
                    </div>
                </form>

            </div>
        </div>
    </div>