import React from 'react';
import { FaPlus } from "react-icons/fa6";
import SummeryAnalytics from './SummeryAnalytics';
import ActivitySummary from './DashboardGraph/ActivitySummary';
import BudgetAnalysis from './DashboardGraph/BudgetAnalysis';
import POReceipt from './DashboardGraph/POReceipt';
import ProductOverview from './ProductOverview';

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
            <div className='my-6 grid lg:grid-cols-3 gap-5'>
                <div className='col-span-2'>
                    <ActivitySummary />
                </div>
                <div>
                    <BudgetAnalysis />
                </div>
            </div>
            <div className='my-6 grid lg:grid-cols-2 gap-5'>
                <div>
                    <POReceipt />
                </div>
                <div>
                    <ProductOverview />
                </div>
            </div>
        </main>
    );
};

export default Dashboard;