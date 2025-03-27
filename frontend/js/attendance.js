document.addEventListener("DOMContentLoaded", function () {
    fetch("http://localhost/payroll_system/backend/attendance/get_attendance.php", {
        method: "GET",
        credentials: "include" // To send session cookies
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            const tableBody = document.querySelector("#attendanceTable tbody");
            tableBody.innerHTML = ""; // Clear existing content

            data.attendance.forEach(record => {
                const row = document.createElement("tr");
                row.innerHTML = `<td>${record.date}</td><td>${record.status}</td>`;
                tableBody.appendChild(row);
            });
        } else {
            alert("Error fetching attendance: " + data.message);
        }
    })
    .catch(error => console.error("Error:", error));
});


















