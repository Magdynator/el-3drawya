document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("loginForm");
    if(loginForm) 
    loginForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const pin = document.getElementById("pin").value;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        fetch("/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken
            },
            body: JSON.stringify({ pin: pin })
        })
        .then(response => {
            if (!response.ok) throw new Error("Network response was not ok");
            return response.json();
        })
        .then(data => {
            if (data.success) {
                window.location.href = "/dashboard";
            } else {
                alert(data.message || "Invalid PIN");
            }
        })
        .catch(error => {
            console.error("There was a problem with the fetch operation:", error);
        });
    });
});
