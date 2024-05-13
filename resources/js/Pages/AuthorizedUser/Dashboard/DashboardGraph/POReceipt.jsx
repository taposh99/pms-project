import React, { useState } from 'react';
import ReactApexChart from 'react-apexcharts';

const POReceipt = () => {
    const [chartProps, setChartProps] = useState({
        series: [{
            data: [21, 22, 10, 28, 16, 21, 25, 34, 23, 29, 12, 3, 4]
        }],
        options: {
            chart: {
                height: 350,
                type: 'bar',
                events: {
                    click: function (chart, w, e) {
                        // console.log(chart, w, e)
                    }
                },
            },
            grid: {
                show: false
            },
            title: {
                text: 'PO Receipts by Month',
                align: 'left'
            },
            plotOptions: {
                bar: {
                    columnWidth: '75%',
                    distributed: true,
                    endingShape: 'rounded',
                    borderRadius: 2,
                    borderRadiusApplication: "end",
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                labels: {
                    style: {
                        // colors: colors,
                        fontSize: '12px'
                    }
                }
            }
        },
    })

    return (
        <div className='h-full'>
            <div id="chart" className='shadow-[2px_2px_15px_2px_rgba(0,0,0,0.1)] rounded-lg px-4 py-6 h-full'>
                <ReactApexChart options={chartProps.options} series={chartProps.series} type="bar" height={250} />
            </div>
            <div id="html-dist"></div>
        </div>
    );
};

export default POReceipt;