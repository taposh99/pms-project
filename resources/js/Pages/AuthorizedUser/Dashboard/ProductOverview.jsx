import React, { useState } from 'react';

const ProductOverview = () => {
    const [showProducts, setShowProducts] = useState(5);

    const productsData = [
        {
            id: 1,
            productName: "Desktop-Elitebook HP",
            status: "Checking",
            cost: "50,000",
        },
        {
            id: 2,
            productName: "Desktop-Elitebook HP",
            status: "Available",
            cost: "50,000",
        },
        {
            id: 3,
            productName: "Desktop-Elitebook HP",
            status: "Stored",
            cost: "50,000",
        },
        {
            id: 4,
            productName: "Desktop-Elitebook HP",
            status: "Available",
            cost: "50,000",
        },
        {
            id: 5,
            productName: "Desktop-Elitebook HP",
            status: "Available",
            cost: "50,000",
        },
        {
            id: 6,
            productName: "Desktop-Elitebook HP",
            status: "Stored",
            cost: "50,000",
        },
        {
            id: 7,
            productName: "Desktop-Elitebook HP",
            status: "Checking",
            cost: "50,000",
        },
        {
            id: 8,
            productName: "Desktop-Elitebook HP",
            status: "Stored",
            cost: "50,000",
        }
    ]

    return (
        <div className='shadow-[2px_2px_15px_2px_rgba(0,0,0,0.1)] rounded-lg px-4 py-6 h-full'>
            <div className='flex items-center justify-between mb-6'>
                <p className='px-4 font-extrabold font-sora text-[#373d3f] text-sm'>
                    Product Overview
                </p>
                <button
                    onClick={() => showProducts === 5 ? setShowProducts(8) : setShowProducts(5)}
                    className='font-sora text-[#047CEB] text-sm underline'
                >
                    View All
                </button>
            </div>
            <table className='w-full text-center text-sm font-sora'>
                <thead>
                    <tr className='text-[#6B6B6B] border-b border-b-[#F5F5F5]'>
                        <th className='font-medium pb-4'>#</th>
                        <th className='font-medium pb-4'>Product Name</th>
                        <th className='font-medium pb-4'>Status</th>
                        <th className='font-medium pb-4'>Cost/per</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        productsData.slice(0, showProducts).map(({ id, productName, status, cost }) => (
                            <tr key={id} className='font-normal'>
                                <td className='pt-4'>
                                    <p>{id}</p>
                                </td>
                                <td className='pt-4'>
                                    <p>{productName}</p>
                                </td>
                                <td className='pt-4'>
                                    <p
                                        className={`px-2 py-1 text-white rounded-2xl text-xs font-sora tracking-wide ${status === "Checking" ? "bg-[#F76767]" : status === "Available" ? "bg-[#0FBE97]" : status === "Stored" ? "bg-[#F7C667]" : ""}`}
                                    >
                                        {status}
                                    </p>
                                </td>
                                <td className='pt-4'>
                                    <p>{cost}</p>
                                </td>
                            </tr>
                        ))
                    }
                </tbody>
            </table>
        </div>
    );
};

export default ProductOverview;