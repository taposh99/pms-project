import React, { useState } from 'react';
import ReactApexChart from "react-apexcharts";

const BudgetAnalysis = () => {
    const series = [1500, 1500, 1500];
    const labels = ['Research & Dev', 'Operation & Manage', 'Monthly Procurement'];
    const [chartProps, setChartProps] = useState({
        series: series,
        options: {
            chart: {
                type: 'donut'
            },
            legend: false,
            // title: {
            //     text: 'Budget Analysis'
            // },
            colors: ["#6146E0", "#0FBE97", "#F76767"],
            labels: labels,
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                offsetY: -10,
                            },
                            value: {
                                show: true,
                                fontSize: '24px',
                                color: '#000',
                                offsetY: 10,
                                formatter: function (val) {
                                    return '$' + val;
                                }
                            },
                            total: {
                                show: true,
                                label: 'Total',
                                color: '#000',
                                formatter: function (w) {
                                    const value = w.globals.seriesTotals.reduce(function (a, b) {
                                        return a + b;
                                    }, 0);
                                    return '$' + value;
                                }
                            }
                        }
                    }
                }
            },
            tooltip: {
                custom: function ({ seriesIndex }) {
                    const tooltipContent = `
                    <div class="bg-white text-black w-56 p-3 rounded-lg !rounded-br-[0px] shadow-[2px_2px_20px_2px_rgba(0,0,0,0.3)] font-sora">
                        <p class="font-medium">${labels[seriesIndex]}</p>
                        <p class="font-medium text-lg">$${series[seriesIndex]}</p>
                    </div>
                      `;
                    return tooltipContent;
                }
            }
        }
    });

    return (
        <div className='!h-full'>
            <div id="chart" className='shadow-[2px_2px_15px_2px_rgba(0,0,0,0.1)] rounded-lg py-6 !h-full'>
                <p className='px-4 font-extrabold font-sora text-[#373d3f] text-sm mb-10'>Budget Analysis</p>
                <ReactApexChart options={chartProps.options} series={chartProps.series} type="donut" />
            </div>
            <div id="html-dist"></div>
        </div>
    );
};

export default BudgetAnalysis;