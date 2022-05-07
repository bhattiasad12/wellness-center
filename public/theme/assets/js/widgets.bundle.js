"use strict";

var KTCardWidget9 = {
    init: function () {
        !(function () {
            var e = document.getElementById("kt_card_widget_9_chart");
            if (e) {
                var t = parseInt(KTUtil.css(e, "height")),
                    a =
                        (KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                        KTUtil.getCssVariableValue("--bs-gray-800")),
                    r = KTUtil.getCssVariableValue("--bs-light-info"),
                    o = new ApexCharts(e, {
                        series: [
                            {
                                name: "Net Profit",
                                data: [
                                    35, 25, 35, 15, 40, 60, 25, 40, 70, 30, 55,
                                    45, 45, 30, 50, 60,
                                ],
                            },
                        ],
                        chart: {
                            fontFamily: "inherit",
                            type: "area",
                            height: t,
                            toolbar: { show: !1 },
                        },
                        legend: { show: !1 },
                        dataLabels: { enabled: !1 },
                        fill: { type: "solid", opacity: 0 },
                        stroke: {
                            curve: "smooth",
                            show: !0,
                            width: 2,
                            colors: [a],
                        },
                        xaxis: {
                            axisBorder: { show: !1 },
                            axisTicks: { show: !1 },
                            labels: { show: !1 },
                            crosshairs: {
                                position: "front",
                                stroke: { color: a, width: 1, dashArray: 3 },
                            },
                            tooltip: {
                                enabled: !0,
                                formatter: void 0,
                                offsetY: 0,
                                style: { fontSize: "12px" },
                            },
                        },
                        yaxis: { labels: { show: !1 } },
                        states: {
                            normal: { filter: { type: "none", value: 0 } },
                            hover: { filter: { type: "none", value: 0 } },
                            active: {
                                allowMultipleDataPointsSelection: !1,
                                filter: { type: "none", value: 0 },
                            },
                        },
                        tooltip: {
                            style: { fontSize: "12px" },
                            x: {
                                formatter: function (e) {
                                    return "Sales " + e;
                                },
                            },
                            y: {
                                formatter: function (e) {
                                    return "$" + e + " thousands";
                                },
                            },
                        },
                        colors: [r],
                        grid: {
                            strokeDashArray: 4,
                            padding: {
                                top: 0,
                                right: -20,
                                bottom: -20,
                                left: -20,
                            },
                            yaxis: { lines: { show: !0 } },
                        },
                        markers: { strokeColor: a, strokeWidth: 2 },
                    });
                setTimeout(function () {
                    o.render();
                }, 300);
            }
        })();
    },
};
"undefined" != typeof module && (module.exports = KTCardWidget9),
    KTUtil.onDOMContentLoaded(function () {
        KTCardWidget9.init();
    });
