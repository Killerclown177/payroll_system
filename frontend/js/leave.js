document.getElementById('leaveForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent page reload

    const formData = new FormData(this);

    fetch('../backend/leave/apply_leave.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        this.reset();
    })
    .catch(error => console.error('Error:', error));
});

// Function to fetch leave requests
function fetchLeaves(employeeId) {
    fetch(`../backend/leave/get_leaves.php?employeeId=${employeeId}`)
    .then(response => response.json())
    .then(data => {
        console.log(data); // Handle displaying leave requests in the UI
    });
}






