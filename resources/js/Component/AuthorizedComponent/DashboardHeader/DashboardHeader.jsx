import React from 'react';
import { FiSearch } from "react-icons/fi";
import { FaQuestion } from "react-icons/fa6";
import { PiGearBold } from "react-icons/pi";
import { FaRegBell } from "react-icons/fa";

const DashboardHeader = () => {
    return (
        <header className='bg-white border-b-[1px] border-[#E9E9E9] px-10 py-4 flex items-center justify-between'>
            <div className='relative'>
                <input
                    type="search"
                    name="search"
                    id="search"
                    className='border-[1px] border-[#E6E6E6] pl-9 pr-2 py-2 w-[265px] rounded-xl focus:outline-none'
                />
                <button className='absolute top-1/2 -translate-y-1/2 left-2'>
                    <FiSearch className='text-[#6B6B6B] text-2xl' />
                </button>
            </div>
            <div>
                <div className='flex items-center gap-5'>
                    <button className='bg-[#E6E6E6] p-2 rounded-md'>
                        <span className='block border-2 border-[#6B6B6B] p-1 rounded-full'>
                            <FaQuestion className='text-[#6B6B6B]' />
                        </span>
                    </button>
                    <button className='bg-[#E6E6E6] p-2 rounded-md'>
                        <span className='block border-2 border-[#6B6B6B] p-1 rounded-full'>
                            <PiGearBold className='text-[#6B6B6B]' />
                        </span>
                    </button>
                    <button className='bg-[#E6E6E6] p-2 rounded-md'>
                        <span className='block border-2 border-[#6B6B6B] p-1 rounded-full'>
                            <FaRegBell className='text-[#6B6B6B]' />
                        </span>
                    </button>
                </div>
            </div>
        </header>
    );
};

export default DashboardHeader;