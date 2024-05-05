import React from 'react';
import { Link, NavLink } from 'react-router-dom';
import { RiHome5Line } from "react-icons/ri";
import { BsBoxes } from "react-icons/bs";
import { CgNotes } from "react-icons/cg";
import { IoReceiptOutline } from "react-icons/io5";
import { TbUserCheck } from "react-icons/tb";
import { MdOutlineWarehouse } from "react-icons/md";
import { GrDeliver } from "react-icons/gr";

const DashboardSidebar = () => {
    const menuItem = [
        {
            label: 'Dashboard',
            link: '/dashboard',
            linkEnd: true,
            icon: <RiHome5Line />
        },
        {
            label: 'Products',
            link: '/dashboard/products',
            linkEnd: false,
            icon: <BsBoxes />
        },
        {
            label: ' Purchase Order',
            link: '/dashboard/purchase-order',
            linkEnd: false,
            icon: <CgNotes />
        },
        {
            label: 'PO Receipts',
            link: '/dashboard/po-receipts',
            linkEnd: false,
            icon: <IoReceiptOutline />
        },
        {
            label: 'Suppliers',
            link: '/dashboard/suppliers',
            linkEnd: false,
            icon: <TbUserCheck />
        },
        {
            label: 'Warehouse',
            link: '/dashboard/warehouse',
            linkEnd: false,
            icon: <MdOutlineWarehouse />
        },
        {
            label: 'Delivery',
            link: '/dashboard/delivery',
            linkEnd: false,
            icon: <GrDeliver />
        }
    ]

    return (
        <div className='border-r border-[#E9E9E9] min-h-screen'>
            <div className='bg-white px-10 py-2'>
                <Link to='/dashboard' className='font-sora font-bold text-[30px]'>E-Procure</Link>
            </div>
            <nav className='mt-8'>
                <ul className='font-sora text- text-[#6B6B6B] space-y-3'>
                    {
                        menuItem.map(({ label, link, linkEnd, icon }) => (
                            <li>
                                <NavLink end={linkEnd} to={link} className={({ isActive }) => `
                            ${isActive ? 'bg-[#E4F2FF] border-[#047CEB] text-[#047CEB]' : 'border-transparent'}
                            flex px-10 items-center gap-2 py-2 border-l-[5px]`
                                }
                                >
                                    {icon}
                                    {label}
                                </NavLink>
                            </li>
                        ))
                    }
                </ul>
            </nav>
        </div>
    );
};

export default DashboardSidebar;