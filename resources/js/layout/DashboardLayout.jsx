import React from 'react';
import DashboardSidebar from '../Component/AuthorizedComponent/DashboardSidebar/DashboardSidebar';
import DashboardHeader from '../Component/AuthorizedComponent/DashboardHeader/DashboardHeader';
import { Outlet } from 'react-router-dom';

const DashboardLayout = () => {

    return (
        <div className='flex max-w-[1536px] mx-auto'>
            <DashboardSidebar />

            <div className='grow'>
                <DashboardHeader />
                <Outlet />
            </div>
        </div>
    );
};

export default DashboardLayout;