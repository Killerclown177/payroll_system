document.addEventListener("DOMContentLoaded", function () {
    console.log("Signup script loaded!"); // Debugging log

    document.getElementById("signupForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        // Get form values
        let fullName = document.getElementById("full_name").value.trim();
        let email = document.getElementById("email").value.trim();
        let password = document.getElementById("password").value.trim();
        let confirmPassword = document.getElementById("confirm_password").value.trim();
        let userType = document.getElementById("user_type").value;
        let messageBox = document.getElementById("message");

        // Clear previous messages
        messageBox.innerText = "";
        messageBox.style.color = "red"; // Default color for errors

        // Basic validation
        if (!fullName || !email || !password || !confirmPassword || !userType) {
            messageBox.innerText = "All fields are required.";
            return;
        }
        if (password.length < 6) {
            messageBox.innerText = "Password must be at least 6 characters.";
            return;
        }
        if (password !== confirmPassword) {
            messageBox.innerText = "Passwords do not match.";
            return;
        }

        // Send data to backend
        fetch("http://localhost/payroll_system/api/auth/register.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                full_name: fullName,
                email: email,
                password: password,
                user_type: userType
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log("Server Response:", data); // Debugging response

            if (data.status === "success") {
                messageBox.style.color = "green";
                messageBox.innerText = "Signup successful! Redirecting...";

                setTimeout(() => {
                    window.location.href = "login.html"; // Redirect to login
                }, 2000);
            } else {
                messageBox.innerText = "Error: " + data.message;
            }
        })
        .catch(error => {
            console.error("Fetch Error:", error);
            messageBox.innerText = "Server error. Please try again later.";
        });
    });
});


















