import React from 'react';
import { FaPlus } from "react-icons/fa6";

const Dashboard = () => {
    return (
        <main className='px-5 py-3'>
            <p className='font-sora font-semibold'>Dashboard</p>
            <div className='flex justify-end'>
                <button className='btn flex items-center gap-2 bg-[#04DA8D] text-white px-5 py-2 rounded-3xl'>
                    <FaPlus />
                    ADD WIDGET
                </button>
            </div>
        </main>
    );
};

export default Dashboard;