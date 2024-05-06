import React, { useState } from 'react';
import ReactApexChart from "react-apexcharts";
import './graph.css';

const ActivitySummary = () => {
    const [chartProps, setChartProps] = useState({
        series: [{
            name: "Purchase Order",
            data: [1045, 2452, 2038, 5024, 2533, 8026, 1821]
        },
        {
            name: "PO Receipts",
            data: [2435, 441, 1962, 242, 7313, 4618, 1529]
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
                theme: 'dark',
                style: {
                    fontSize: '14px',
                },
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