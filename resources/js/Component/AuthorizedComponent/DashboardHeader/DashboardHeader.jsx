import React from 'react';

const DashboardHeader = () => {
    return (
        <header>
            <div className='relative'>
                <input
                    type="search"
                    name="search"
                    id="search"
                    className='border-[1px] border-[#E6E6E6] px-4 py-2 w-[265px] rounded-xl focus:outline-none'
                />
                
            </div>
        </header>
    );
};

export default DashboardHeader;