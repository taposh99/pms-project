import React, { useEffect, useRef, useState } from 'react';
import { FiSearch } from "react-icons/fi";
import { FaQuestion } from "react-icons/fa6";
import { PiGearBold } from "react-icons/pi";
import { FaRegBell } from "react-icons/fa";
import { useNavigate } from 'react-router-dom';
import { useDispatch } from 'react-redux';

const DashboardHeader = () => {
    const [showProfile, setShowProfile] = useState(false);
    const profileRef = useRef(null);
    const dispatch = useDispatch();
    const navigate = useNavigate();

    const handleLogout = () => {
        navigate('/');
    }

    useEffect(() => {
        const handleClickOutside = (e) => {
            if (profileRef.current && !profileRef.current.contains(e.target) && showProfile) {
                setShowProfile(false);
            }
        }
        document.addEventListener('click', handleClickOutside);
        return () => {
            document.removeEventListener('click', handleClickOutside)
        };
    }, [showProfile])

    return (
        <header className='relative overflow-x-clip bg-white border-b-[1px] border-[#E9E9E9] px-2 lg:px-10 lg:pr-5 py-2 flex items-center justify-end lg:justify-between'>
            <div className='relative hidden lg:block'>
                <input
                    type="search"
                    name="search"
                    id="search"
                    placeholder='Search any...'
                    className='border-[1px] border-[#E6E6E6] pl-9 pr-2 py-2 w-[265px] rounded-xl focus:outline-none placeholder:text-[#6B6B6B]'
                />
                <button className='btn absolute top-1/2 -translate-y-1/2 left-2'>
                    <FiSearch className='text-[#6B6B6B] text-2xl' />
                </button>
            </div>
            <div className='flex items-center gap-5'>
                <div className='flex items-center gap-5 '>
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
                <button
                    ref={profileRef}
                    onClick={() => setShowProfile(!showProfile)}
                    className='flex items-center gap-2'
                >
                    <div className='w-12 h-12 rounded-full overflow-hidden'>
                        <img src="/user.jpg" alt="" />
                    </div>
                    <div className='hidden lg:block'>
                        <h1 className='font-sora font-semibold text-lg'>Jack Bakley Rion</h1>
                        <h6 className='font-sora text-[#6B6B6B] text-sm'>Procurement Manager</h6>
                    </div>
                </button>
            </div>
            <div onClick={(e) => e.stopPropagation()} className={`absolute lg:w-[280px] ${showProfile ? 'right-2 lg:right-10' : '-right-96'} top-[calc(100%+3px)] flex items-center justify-between gap-5 bg-white p-1 lg:p-3 shadow-[-2px_2px_10px_1px_rgba(0,0,0,0.1)] duration-300`}>
                <button className='btn font-sora text-sm text-[#6B6B6B] px-2 lg:px-5 py-1 lg:py-3 border border-[#C4C4C4]'>Profile</button>
                <button onClick={handleLogout} className='btn font-sora text-sm text-[#6B6B6B] px-2 lg:px-5 py-1 lg:py-3 border border-[#C4C4C4]'>Logout</button>
            </div>
        </header>
    );
};

export default DashboardHeader;