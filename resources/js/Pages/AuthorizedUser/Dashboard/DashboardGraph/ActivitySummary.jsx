import React, { useState } from 'react';
import ReactApexChart from "react-apexcharts";
import './graph.css';

const ActivitySummary = () => {
    const [chartProps, setChartProps] = useState({
        series: [{
            name: "Purchase Order",
            data: [104, 245, 203, 502, 253, 806, 182]
        },
        {
            name: "PO Receipts",
            data: [243, 44, 226, 24, 731, 468, 152]
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
            grid: {
                show: false
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
            yaxis: false,
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
                ],
                // ** Currently this x is not needed. alternatively custom is using.
                // x: {
                //     formatter: function (val) {
                //         const customLabels = ['25 April', '30 April', '3 May', '14 May', '5 Jun', '26 Jun', '7 July'];
                //         return customLabels[val - 1];
                //     },
                // },
                custom: function ({ dataPointIndex }) {
                    const customLabels = ['25 April', '30 April', '3 May', '14 May', '5 Jun', '26 Jun', '7 July'];
                    const demoPercentage = [2, 12, 34, 76, 23, 56, 32];
                    const tooltipContent = `
                      <div class='!bg-black !rounded-t-[15%] !rounded-b-xl p-6 pr-10 pb-8'>
                        <p class='text-[#929292] mb-4'>${customLabels[dataPointIndex]}</p>
                        <div class='flex items-center gap-2'>
                            <div class='w-3 h-3 rounded-full bg-[#2D2FF0]'></div>
                            <p>Purchase Order</p>
                        </div>
                        <div class='flex items-center gap-2 mt-2 mb-4'>
                            <div class='w-3 h-3 rounded-full bg-[#E80054]'></div>
                            <p>PO Receipts</p>
                        </div>
                        <div class='px-4 py-2 rounded-3xl text-black bg-white flex items-center gap-2 w-fit'>
                            ${demoPercentage[dataPointIndex]}%
                            <svg width="10" height="11" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.35355 0.556443C4.15829 0.361181 3.84171 0.361181 3.64645 0.556443L0.464466 3.73842C0.269204 3.93369 0.269204 4.25027 0.464466 4.44553C0.659728 4.64079 0.976311 4.64079 1.17157 4.44553L4 1.6171L6.82843 4.44553C7.02369 4.64079 7.34027 4.64079 7.53553 4.44553C7.7308 4.25027 7.7308 3.93369 7.53553 3.73842L4.35355 0.556443ZM4.5 8.09V0.909996H3.5V8.09H4.5Z" fill="#6B6B6B"/>
                            </svg>      
                        </div>
                      </div>
                      `;
                    return tooltipContent;
                }
            },
        }
    })

    return (
        <div>
            <div id="chart" className='shadow-[2px_2px_15px_2px_rgba(0,0,0,0.1)] rounded-lg px-4 py-6'>
                <ReactApexChart options={chartProps.options} series={chartProps.series} type="line" height={350} />
            </div>
            <div id="html-dist"></div>
        </div>
    );
};

export default ActivitySummary;