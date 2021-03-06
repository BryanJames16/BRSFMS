$(window).on("load", function() {
    var a = $("#pie-chart"),
        b = { responsive: !0, maintainAspectRatio: !1, responsiveAnimationDuration: 500 },
        c = {
            labels: ["January", "February", "March", "April", "May"],
            datasets: [{
                label: "My First dataset",
                data: [65, 59, 80, 81, 56],
                backgroundColor: ["#99B898", "#FECEA8", "#FF847C", "#E84A5F", "#2A363B"]
            }, {
                label: "My Second dataset",
                data: [28, 48, 40, 19, 86],
                backgroundColor: ["#99B898", "#FECEA8", "#FF847C", "#E84A5F", "#2A363B"]
            }, {
                label: "My Third dataset - No bezier",
                data: [45, 25, 16, 36, 67],
                backgroundColor: ["#99B898", "#FECEA8", "#FF847C", "#E84A5F", "#2A363B"]
            }, {
                label: "My Fourth dataset",
                data: [17, 62, 78, 88, 26],
                backgroundColor: ["#99B898", "#FECEA8", "#FF847C", "#E84A5F", "#2A363B"]
            }]
        },
        d = { type: "pie", options: b, data: c };
    new Chart(a, d)
});