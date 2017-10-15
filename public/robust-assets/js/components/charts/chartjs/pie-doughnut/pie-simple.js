$(window).on("load", function() {
    var a = $("#simple-pie-chart"),
        b = { responsive: !0, maintainAspectRatio: !1, responsiveAnimationDuration: 500 },
        c = {
            labels: ["January", "February", "March", "April", "May"],
            datasets: [{
                label: "My First dataset",
                data: [85, 65, 34, 45, 35],
                backgroundColor: ["#99B898", "#FECEA8", "#FF847C", "#E84A5F", "#2A363B"]
            }]
        },
        d = { type: "pie", options: b, data: c };
    new Chart(a, d)
});