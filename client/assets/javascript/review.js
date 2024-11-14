


// Biểu đồ vocabulary

        // Function to update chart dynamically
        function updateChart(bar, percentage) {
        bar.style.height = percentage + '%';
    }

    
    const weakContainer = document.getElementById('weak-container');
    const weak = weakContainer.querySelector('span');
    const weakValue = parseInt(weak.dataset.value);
    const weakBar = document.getElementById('weak-bar');
    console.log(weakValue);
        updateChart(weakBar, weakValue);

    const strongContainer = document.getElementById('strong-container');
    const strong = strongContainer.querySelector('span');
    const strongValue = parseInt(strong.dataset.value);
    const strongBar = document.getElementById('strong-bar');
        updateChart(strongBar, strongValue);
