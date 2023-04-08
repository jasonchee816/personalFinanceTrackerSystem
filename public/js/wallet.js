$(document).ready(function () {
    $.ajax({
        url: "/wallet/getChartData",
        dataType: "json",
        success: function (data) {
            console.log(data);
            drawChart(data.balance_data, "balanceChart");
            drawChart(data.type_data, "typeChart");
        },
    });
});

function drawChart(data, id) {
    // Pie chart for wallet balances
    var ctx1 = document.getElementById(id).getContext("2d");

    var chartData1 = {
        labels: data.map(function (d) {
            return d.name;
        }),
        datasets: [
            {
                label: "Balance",
                data: data.map(function (d) {
                    return d.balance ? d.balance : d.count;
                }),
                backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56",
                    "#4BC0C0",
                    "#9966FF",
                    "#FF9933",
                    "#0066CC",
                    "#99CCFF",
                    "#00CC99",
                    "#FF3399",
                ],
            },
        ],
    };
    var chartOptions1 = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: "top",
        },
        plugins: {
            title: {
                display: true,
                text: id == "balanceChart" ? "Wallet Balances" : "Wallet Type",
                font: { size: 24 },
            },
        },
    };
    let Chart1 = new Chart(ctx1, {
        type: id == "balanceChart" ? "bar" : "pie",
        data: chartData1,
        options: chartOptions1,
    });
}
