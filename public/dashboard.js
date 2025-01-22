// Simulate dynamic data
const totalSales = 12500;
const newUsers = 250;
const traffic = 3400;

// Display data on the dashboard
document.getElementById("traffic").innerText = `${traffic.toLocaleString()} visits`;

// Display today's date
const date = new Date();
document.getElementById("date").innerText = date.toDateString();

// Placeholder function for chart (for future expansion)
function loadCharts() {
    const salesChart = document.getElementById("salesChart");
    const userChart = document.getElementById("userChart");
    
    salesChart.innerHTML = `<p>Sales Chart (coming soon)</p>`;
    userChart.innerHTML = `<p>User Growth Chart (coming soon)</p>`;
}

// Call function to load placeholder charts
loadCharts();

