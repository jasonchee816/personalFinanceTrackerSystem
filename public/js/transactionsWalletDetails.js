document.addEventListener("DOMContentLoaded", function (event) {
    document.querySelectorAll(".rowEdit").forEach(function (row) {
        row.addEventListener("click", function () {
            console.log(this.dataset.href);
            window.location.href = this.dataset.href;
        });
    });

    const ctx = document.getElementById("myChart");

    new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: ["Income", "Expense"],
            datasets: [
                {
                    label: "Amount",
                    data: [income, expense],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            // scales: {
            //     y: {
            //         beginAtZero: true
            //     }
            // }
            plugins: {
                title: {
                    display: true,
                    text: "Transactions Overview",
                    font: { size: 24 },
                },
            },
            responsive: true,
            maintainAspectRatio: false,
        },
    });

    const ctx2 = document.getElementById("myChart2");

    new Chart(ctx2, {
        type: "doughnut",
        data: {
            labels: incomeCategory,
            datasets: [
                {
                    label: "Amount",
                    data: incomeAmountGrouped,
                    borderWidth: 1,
                },
            ],
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: "Income Overview",
                    font: { size: 24 },
                },
            },
            responsive: true,
            maintainAspectRatio: false,
        },
    });

    const ctx3 = document.getElementById("myChart3");

    new Chart(ctx3, {
        type: "doughnut",
        data: {
            labels: expenseCategory,
            datasets: [
                {
                    label: "Amount",
                    data: expenseAmountGrouped,
                    borderWidth: 1,
                },
            ],
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: "Expense Overview",
                    font: { size: 24 },
                },
            },
            responsive: true,
            maintainAspectRatio: false,
        },
    });
});
