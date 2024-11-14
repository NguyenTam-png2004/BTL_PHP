
document.addEventListener('DOMContentLoaded', function () {
    try {
        var menuIcon1 = document.querySelector('.avatar_wrapper img');
        var menu1 = document.querySelector('.menu_avatar');
        var menuIcon2 = document.querySelector('.language_wrapper img');
        var menu2 = document.querySelector('.menu_language');
        var menuIcon3 = document.querySelector('.bxh_wrapper img');
        var menu3 = document.querySelector('.container_BXH');

        function toggleMenu(menuIcon, menu) {
            if (menuIcon && menu) {  // Kiểm tra nếu phần tử tồn tại
                menuIcon.addEventListener('click', function(event) {
                    menu.classList.toggle('show');
                });
                document.addEventListener('click', function(event) {
                    if (event.target != menuIcon && event.target != menu) {
                        menu.classList.remove('show');
                    }
                });
            }
        }

        toggleMenu(menuIcon1, menu1);
        toggleMenu(menuIcon2, menu2);
        toggleMenu(menuIcon3, menu3);
    } catch (error) {
        console.warn("Một hoặc nhiều phần tử menu không tồn tại:", error);
    }

    // Các đoạn mã phía sau sẽ luôn chạy, ngay cả khi phần tử không tồn tại
    function increaseProgress(progressBar, newValue) {
        progressBar.style.width = newValue + '%';
        progressBar.setAttribute('aria-valuenow', newValue);
    }

    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach(progressBar => {
        const currentValue = progressBar.querySelector('span');
        const newValue = currentValue ? currentValue.dataset.value : 0;  // Kiểm tra null
        increaseProgress(progressBar, newValue);
    });

    const courseCurrent = document.querySelector('.course_current');
    if (courseCurrent) {
        courseCurrent.addEventListener('click', function() {
            const list = document.querySelector('.list_courses');
            if (list) {
                list.style.display = list.style.display === 'none' || list.style.display === '' ? 'block' : 'none';
            }
        });
    }
});






// Biểu đồ vocabulary

        // Function to update chart dynamically
        function updateChart(bar, value, total) {
        // Tính tỷ lệ phần trăm và đặt chiều cao
        const percentage = (value / total) * 100;
        bar.style.height = percentage + '%';
    }

    
    const weakContainer = document.getElementById('weak-container');
    const weak = weakContainer.querySelector('span');
    const weakValue = parseInt(weak.dataset.value);
    const weakBar = document.getElementById('weak-bar');
    console.log(weakValue);
        updateChart(weakBar, weakValue,10);

    const strongContainer = document.getElementById('strong-container');
    const strong = strongContainer.querySelector('span');
    const strongValue = parseInt(strong.dataset.value);
    const strongBar = document.getElementById('strong-bar');
        updateChart(strongBar, strongValue, 10);

