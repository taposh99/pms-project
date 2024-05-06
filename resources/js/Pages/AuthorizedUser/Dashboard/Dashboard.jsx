import React from 'react';
import { FaPlus } from "react-icons/fa6";
import SummeryAnalytics from './SummeryAnalytics';

const Dashboard = () => {
    return (
        <main className='px-5 py-3'>
            <p className='font-sora font-semibold'>Dashboard</p>
            <div className='flex justify-end'>
                <button className='btn flex items-center gap-2 bg-[#04DA8D] font-sora font-semibold tracking-wider text-sm text-white px-5 py-3 rounded-3xl'>
                    <FaPlus />
                    ADD WIDGET
                </button>
            </div>
            <SummeryAnalytics />
        </main>
    );
};

export default Dashboard;