import React, { useState } from 'react';
import ReactApexChart from "react-apexcharts";

const ActivitySummary = () => {
    const [chartProps, setChartProps] = useState({
        series: [{
            name: "Purchase Order",
            data: [1045, 7452, 2038, 10024, 2533, 8026, 1821]
        },
        {
            name: "PO Receipts",
            data: [2435, 2441, 9962, 4242, 2313, 4618, 5529]
        }
        ],
        options: {
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                },
            },
            stroke: {
                width: [4, 4],
                curve: 'smooth',
                dashArray: [0, 10]
            },
            title: {
                text: 'Activity Summary',
                align: 'left'
            },
            legend: {
                show: false
            },
            markers: {
                size: 0,
                hover: {
                    sizeOffset: 6
                }
            },
            xaxis: {
                categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            },
            tooltip: {
                y: [
                    {
                        title: {
                            formatter: function (val) {
                                return val
                            }
                        }
                    },
                    {
                        title: {
                            formatter: function (val) {
                                return val
                            }
                        }
                    }
                ]
            },
        },
    })

    return (
        <div>
            <div id="chart">
                <ReactApexChart options={chartProps.options} series={chartProps.series} type="line" height={350} />
            </div>
            <div id="html-dist"></div>
        </div>
    );
};

export default ActivitySummary;