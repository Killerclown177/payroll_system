document.addEventListener("DOMContentLoaded", function () {
    loadEmployees(); // Load employees for filtering
    fetchAttendance(); // Load attendance records
});

function loadEmployees() {
    fetch("http://localhost/payroll_system/backend/employees/get_all.php")
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            const employeeSelect = document.getElementById("employeeSelect");
            data.employees.forEach(emp => {
                let option = document.createElement("option");
                option.value = emp.id;
                option.textContent = emp.full_name;
                employeeSelect.appendChild(option);
            });
        }
    });
}

function fetchAttendance() {
    let employeeId = document.getElementById("employeeSelect").value;
    let date = document.getElementById("dateSelect").value;
    let url = `http://localhost/payroll_system/backend/attendance/get_all_attendance.php`;

    if (employeeId) url += `?employee_id=${employeeId}`;
    else if (date) url += `?date=${date}`;

    fetch(url)
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            const tableBody = document.querySelector("#attendanceTable tbody");
            tableBody.innerHTML = ""; // Clear table

            data.attendance.forEach(record => {
                const row = document.createElement("tr");
                row.innerHTML = `<td>${record.full_name}</td><td>${record.date}</td><td>${record.status}</td>`;
                tableBody.appendChild(row);
            });
        }
    })
    .catch(error => console.error("Error:", error));
}








