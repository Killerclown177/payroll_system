document.addEventListener("DOMContentLoaded", function() {
    fetch("http://localhost/payroll_system/api/auth/check_session.php")  // Check if admin is logged in
        .then(response => response.json())
        .then(data => {
            if (data.status !== "success") {
                window.location.href = "../login.html"; // Redirect if not logged in
            }
        });

    document.getElementById("logout").addEventListener("click", function() {
        fetch("http://localhost/payroll_system/api/auth/logout.php")
            .then(() => window.location.href = "../login.html");
    });
});


















