<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm câu hỏi và câu trả lời</h4>
                <form action="index.php?act=add__answer_question" enctype="multipart/form-data" method="post">
                    <!-- <div class="form-group">
              <label for="">ID</label>
              <input disabled name="product_id" type="text" class="form-control">
            </div>  -->
            <div class="form-group">
                <p>câu hỏi </p>
                </div>
                    <div class="form-group">
                        <label for="">Nội dung câu trả lời </label>
                        <input name="product_name" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">trả lời đúng</label>
                        <input name="isCorrect" type="text" class="form-control" required>
                    </div>


                    <div class="form-group mt-3">
                        <input class="btn btn-primary" type="submit" name="themmoi" value="Thêm mới">
                        <input class="btn btn-secondary" type="reset" value="Nhập lại">
                        <a href="index.php?act=list__answer_question"><input class="btn btn-primary" type="button"
                                value="Danh sách"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>