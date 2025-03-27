document.addEventListener("DOMContentLoaded", function () {
    const userTypeSelect = document.getElementById("userType");
    const usernameDiv = document.getElementById("usernameDiv");
    const loginForm = document.getElementById("loginForm");

    // Show/hide username field based on user type
    userTypeSelect.addEventListener("change", function () {
        if (userTypeSelect.value === "admin") {
            usernameDiv.classList.add("hidden");
        } else {
            usernameDiv.classList.remove("hidden");
        }
    });

    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const userType = userTypeSelect.value;
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        // Prepare login data
        const loginData = userType === "admin" 
            ? { userType, password }  // Only password for admin
            : { userType, username, password }; // Username + password for employee

        fetch("backend/login.php", {
            method: "POST",
            body: JSON.stringify(loginData),
            headers: { "Content-Type": "application/json" }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = data.redirect; // Redirect to dashboard
            } else {
                alert(data.error);
            }
        });
    });
});

