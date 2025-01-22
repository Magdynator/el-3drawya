document.addEventListener("DOMContentLoaded", function () {
    const balanceElement = document.getElementById("balance");

    let balance = 5000; // Initial balance

    function updateBalanceDisplay() {
        balanceElement.textContent = balance.toFixed(2);
    }

    window.withdraw = function () {
        const amount = parseFloat(prompt("Enter amount to withdraw:"));
        if (amount > 0 && amount <= balance) {
            balance -= amount;
            updateBalanceDisplay();
            alert(`You have withdrawn $${amount.toFixed(2)}.`);
        } else {
            alert("Invalid amount or insufficient balance.");
        }
    };

    window.deposit = function () {
        const amount = parseFloat(prompt("Enter amount to deposit:"));
        if (amount > 0) {
            balance += amount;
            updateBalanceDisplay();
            alert(`You have deposited $${amount.toFixed(2)}.`);
        } else {
            alert("Invalid amount.");
        }
    };

    window.viewHistory = function () {
        // Implement transaction history functionality here
        alert("Transaction history feature not implemented.");
    };

    window.logout = function () {
        // Handle logout logic, e.g., redirecting to the login page
        alert("You have been logged out.");
        window.location.href = "/login"; // Change to your login page URL
    };
    
    updateBalanceDisplay(); // Initial display of balance
});
