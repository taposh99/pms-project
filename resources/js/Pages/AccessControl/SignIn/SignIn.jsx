import React from 'react';
import Header from '../../../Component/Header/Header';

const SignIn = () => {
    return (
        <>
            <Header></Header>
            <div className='font-sora bg-[#FAFAFA] flex justify-center min-h-screen py-16'>
                <form className='bg-white shadow-lg w-2/5 px-5 py-8'>
                    <h4 className='text-[26px] mb-10'>Log In</h4>
                    <label htmlFor="email" className='text-sm'>Email Address</label>
                </form>
            </div>
        </>
    );
};

export default SignIn;