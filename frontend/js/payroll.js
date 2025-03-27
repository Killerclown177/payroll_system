<script>
document.addEventListener("DOMContentLoaded", function () {
    fetch("get_payroll.php")
    .then(response => response.json())
    .then(data => {
        document.getElementById("employee_department").innerText = data.department;
        document.getElementById("start_period").innerText = data.start_period;

        document.getElementById("basic_salary").innerText = data.basic_salary;
        document.getElementById("overtime").innerText = data.overtime;
        document.getElementById("bonus").innerText = data.bonus;
        document.getElementById("total_earnings").innerText = data.total_earnings;

        document.getElementById("tax").innerText = data.tax;
        document.getElementById("social_security").innerText = data.social_security;
        document.getElementById("health_insurance").innerText = data.health_insurance;
        document.getElementById("total_deductions").innerText = data.total_deductions;

        document.getElementById("net_salary").innerText = data.net_salary;

        document.getElementById("bank_name").innerText = data.bank_name;
        document.getElementById("account_number").innerText = data.account_number;
        document.getElementById("payment_method").innerText = data.payment_method;
    })
    .catch(error => console.error("Error loading payroll data:", error));
});
</script>
