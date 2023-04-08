document.addEventListener("DOMContentLoaded", function (event) {
    document.querySelectorAll(".rowEdit").forEach(function (row) {
        row.addEventListener("click", function () {
            console.log(this.dataset.href);
            window.location.href = this.dataset.href;
        });
    }); 

    const ctx2 = document.getElementById("myChart2");

    new Chart(ctx2, {
        type: "doughnut",
        data: {
            labels: eachCat,
            datasets: [
                {
                    label: "Amount",
                    data: totalAmountCat,
                    borderWidth: 1,
                },
            ],
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: "Category Overview",
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
            labels: eachType,
            datasets: [
                {
                    label: "User",
                    data: userNumType,
                    borderWidth: 1,
                },
            ],
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: "Wallet Type Overview",
                    font: { size: 24 },
                },
            },
            responsive: true,
            maintainAspectRatio: false,
        },
    });
});
