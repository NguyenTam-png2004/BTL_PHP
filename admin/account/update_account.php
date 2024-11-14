<style>
.role {
    margin-left: 1rem;
}
</style>
<?php
if (is_array($account)) {
  extract($account);
}
$hinhpath = "assets/upload/" . $avatar;
if (is_file($hinhpath)) {
  $avatar = "<img src='" . $hinhpath . "' height='80'>";
} else {
  $avatar = "No photo";
}
?>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật tài khoản</h4>

                <form action="index.php?act=update_account" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ID" value="<?= $ID ?>">
                    <div class="form-group">
                        <label for="">Tên người dùng</label>
                        <input name="username" value="<?= $username ?>" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input name="password" value="<?= $password ?>" type="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input name="email" value="<?= $email ?>" type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Avatar</label>
                        <input name="avatar" type="file" class="form-control">
                        <?= $avatar ?>

                    </div>
                    <div class="form-group">
                        <label for="">Tổng kinh nghiệm</label>
                        <input name="experience" value="<?= $experience ?>" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Quyền hạn</label>
                        <select name="role" class="form-select" required>
                            <option value="1" <?= ($role == 1) ? 'selected' : '' ?>>Quyền hạn 1</option>
                            <option value="2" <?= ($role == 2) ? 'selected' : '' ?>>Quyền hạn 2</option>
                            <option value="3" <?= ($role == 3) ? 'selected' : '' ?>>Quyền hạn 3</option>v
                        </select>
                    </div>

                    <input class="btn btn-primary" type="submit" name="update_account_one" value="Cập nhật">
                    <input type="reset" class="mt-3 btn btn-primary" value="Nhập lại">
                </form>
            </div>
        </div>
        <?php if (isset($thongbao) && ($thongbao != "")): ?>
        <div class="alert alert-info">
            <?= $thongbao ?>
        </div>
        <?php endif; ?>
    </div>