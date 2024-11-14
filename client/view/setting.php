<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cài đặt tài khoản</title>
    <link rel="stylesheet" href="client/assets/css/profile.css">
</head>
<body>
    <div class="container_setting" id="container_setting">
        <h1>Cài đặt</h1>
        <div id="message" class="message"></div>
        <!-- Account Settings Form -->
        <div class="tab-content" id="account">
            <h2>Tài khoản</h2>
            <form method="POST" id="account-form">
                <label for="image-upload">Ảnh đại diện</label>
                <input type="file" name="image-upload" id="image-upload">

                <label for="username">Tên người dùng</label>
                <input type="text"  name = "username" id="username" value="<?php echo $user->username?>">

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="<?php echo $user->email?>">

                <label for="current-password">Mật khẩu hiện tại</label>
                <input type="password" name="current_password" id="current-password">

                <label for="new-password">Mật khẩu mới</label>
                <input type="password" name="new_password" id="new-password">
                <button type="submit">Cập nhật</button>
            </form>
            <form id="delete" method="POST">
                    <input type="hidden" name="id" value="<?php echo $user->ID?>">
                    <button type="submit" class="delete-btn" ">Xóa tài khoản</button>
                </form>
        </div>
    </div>
</body>
<script>
    const update_form = document.getElementById("account-form");
	const delete_form = document.getElementById("delete");

	function user(form, actionName) {
	const formData = new FormData(form);

	fetch(`index.php?controller=Profile&action=${actionName}`, {
		method: 'POST',
		body: formData
	})
	.then(response => response.json())
	.then(data => {
        const message = document.getElementById('message');
        if(data.status == 'success'){
            message.classList.remove('message_fail');
            message.classList.add('message_success');
        }else{
            message.classList.remove('message_success');
            message.classList.add('message_fail');
        }
	    message.innerHTML = data.message; // Cập nhật nội dung của phần tử 'container_setting'
	})
	.catch(error => alert(error));
	}


	update_form.addEventListener('submit', function(e){
		e.preventDefault();
		user(update_form,'Update');
	});

	delete_form.addEventListener('submit', function(e){
		e.preventDefault();
		user(update_form,'Delete');
	});
</script>
</html>
