import React from 'react';
import DashboardSidebar from '../Component/AuthorizedComponent/DashboardSidebar/DashboardSidebar';
import DashboardHeader from '../Component/AuthorizedComponent/DashboardHeader/DashboardHeader';
import { Outlet } from 'react-router-dom';

const DashboardLayout = () => {
    // const [sidebarCollapsed, setSidebarCollapsed] = useState(false);

    // useEffect(() => {
    //     // window.scrollTo(0, 0);
    //     const handleResize = () => {
    //         setSidebarCollapsed(window.innerWidth < 1024);
    //     };
    //     window.addEventListener('resize', handleResize);
    //     handleResize();
    //     return () => {
    //         window.removeEventListener('resize', handleResize);
    //     };
    // }, []);

    // const handleSidebarCollapsed = () => {
    //     setSidebarCollapsed(!sidebarCollapsed)
    // }

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