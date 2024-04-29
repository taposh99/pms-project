import React from 'react';
import { Link } from 'react-router-dom';

const Header = () => {
    return (
        <div className='bg-white px-10 py-2 shadow'>
            <Link to='/' className='font-sora font-bold text-[30px]'>E-Procure</Link>
        </div>
    );
};

export default Header;