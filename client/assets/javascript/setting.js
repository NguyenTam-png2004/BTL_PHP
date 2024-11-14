// Tab switching functionality
document.querySelectorAll('.tabs li').forEach(tab => {
    tab.addEventListener('click', function() {
        // Remove 'active-tab' class from all tabs
        document.querySelectorAll('.tabs li').forEach(item => item.classList.remove('active-tab'));
        
        // Add 'active-tab' class to the clicked tab
        tab.classList.add('active-tab');
        
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(content => content.style.display = 'none');
        
        // Get the data-tab value of the clicked tab and show the corresponding content
        let tabContentId = tab.getAttribute('data-tab');
        document.getElementById(tabContentId).style.display = 'block';
    });
});

// Toggle password visibility
function togglePassword(inputId) {
    let input = document.getElementById(inputId);
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}

// Confirm account deletion
function confirmDelete() {
    if (confirm("Bạn có chắc chắn muốn xóa tài khoản này không?")) {
        alert("Tài khoản đã bị xóa.");
    }
}

