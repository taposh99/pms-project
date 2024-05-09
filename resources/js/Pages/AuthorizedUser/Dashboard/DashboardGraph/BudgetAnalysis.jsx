import React, { useState } from 'react';
import ReactApexChart from "react-apexcharts";

const BudgetAnalysis = () => {
    const [chartProps, setChartProps] = useState({
        series: [44, 55, 41],
        options: {
            chart: {
                type: 'donut',
            },
            legend: false,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                }
            }]
        },
    });

    return (
        <div>
            <div id="chart">
                <ReactApexChart options={chartProps.options} series={chartProps.series} type="donut" />
            </div>
            <div id="html-dist"></div>
        </div>
    );
};

export default BudgetAnalysis;