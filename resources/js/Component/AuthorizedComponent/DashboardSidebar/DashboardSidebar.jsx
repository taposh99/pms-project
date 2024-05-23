import React, { useState } from 'react';
import { Link, NavLink } from 'react-router-dom';
import { RiHome5Line } from "react-icons/ri";
import { BsBoxes } from "react-icons/bs";
import { TbAutomaticGearbox } from "react-icons/tb";
import { CgNotes } from "react-icons/cg";
import { IoReceiptOutline } from "react-icons/io5";
import { TbUserCheck } from "react-icons/tb";
import { MdOutlineWarehouse } from "react-icons/md";
import { GrDeliver } from "react-icons/gr";

const DashboardSidebar = () => {
    const [openSubMenu, setOpenSubMenu] = useState(null);
    
    const handleSubMenuToggle = (label) => {
        setOpenSubMenu(prev => (prev === label ? null : label));
    }

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
            icon: <BsBoxes />,
            subMenuItem: [
                {
                    subLabel: 'Product List',
                    subLink: '/dashboard/products/product-list',
                    subLinkEnd: true,
                    subIcon: <TbAutomaticGearbox />,
                },
                {
                    subLabel: 'Categories',
                    subLink: '/dashboard/products/categories',
                    subLinkEnd: true,
                    subIcon: <TbAutomaticGearbox />,
                },
                {
                    subLabel: 'Sub Categories',
                    subLink: '/dashboard/products/sub-categories',
                    subLinkEnd: true,
                    subIcon: <TbAutomaticGearbox />,
                },
            ]
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
        <div className='border-r border-[#E9E9E9] min-h-screen py-5'>
            <div className='bg-white text-center px-2'>
                <Link to='/dashboard' className='font-sora font-bold text-xs lg:text-[30px] whitespace-nowrap'>E-Procure</Link>
            </div>
            <nav className='mt-8'>
                <ul className='font-sora text- text-[#6B6B6B] space-y-3'>
                    {
                        menuItem.map(({ label, link, linkEnd, icon, subMenuItem }) => (
                            <li key={label}>
                                <NavLink
                                    end={linkEnd}
                                    to={link}
                                    className={({ isActive }) => `
                                        ${isActive ? 'bg-[#E4F2FF] border-[#047CEB] text-[#047CEB]' : 'border-transparent'}
                                        flex px-7 lg:px-10 items-center gap-2 py-2 border-l-[5px]`
                                    }
                                    onClick={() => {
                                        setOpenSubMenu(null);
                                        if (subMenuItem) {
                                            handleSubMenuToggle(label);
                                        }
                                    }}
                                >
                                    {icon}
                                    <span className='hidden lg:block whitespace-nowrap'>{label}</span>
                                </NavLink>
                                {
                                    subMenuItem && openSubMenu === label &&
                                    <ul>
                                        {
                                            subMenuItem.map(({ subLink, subLinkEnd, subLabel, subIcon }) => (
                                                <li key={subLabel}>
                                                    <NavLink
                                                        end={subLinkEnd}
                                                        to={subLink}
                                                        className={({ isActive }) => `
                                                            ${isActive ? 'bg-[#E6E6E6] border-[#047CEB] text-[#047CEB]' : 'border-transparent'}
                                                            flex px-7 lg:px-16 items-center gap-2 py-2 border-l-[5px]`
                                                        }
                                                    >
                                                        {subIcon}
                                                        <span className='hidden lg:block whitespace-nowrap'>{subLabel}</span>
                                                    </NavLink>
                                                </li>
                                            ))
                                        }
                                    </ul>
                                }
                            </li>
                        ))
                    }
                </ul>
            </nav>
        </div>
    );
};

export default DashboardSidebar;