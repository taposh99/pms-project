import React from 'react';
import Header from '../../../Component/Header/Header';
import { useFormik } from 'formik';
import * as Yup from 'yup';
import { Link } from 'react-router-dom';
import { useLoginUserMutation } from '../../../redux/features/auth/authApi';

const SignIn = () => {
    const [userLogin, { isLoading, error, data }] = useLoginUserMutation();

    const { handleSubmit, handleChange, handleBlur, errors, values, touched } = useFormik({
        initialValues: {
            email: '',
            password: '',
        },
        validationSchema: Yup.object({
            email: Yup.string().email('Invalid email address').required('Email is required'),
            password: Yup.string().required('Password is required'),
        }),
        onSubmit: async (values) => {
            const user = await userLogin(values).unwrap();
            console.log(values);
            console.log(user);
        },


    });

    return (
        <>
            <Header></Header>
            <div className='font-sora bg-[#FAFAFA] flex justify-center min-h-screen py-16'>
                <form onSubmit={handleSubmit} className='bg-white shadow-[-2px_2px_15px_1px_rgba(0,0,0,0.2)] w-2/5 px-5 py-8'>
                    <p className='text-[26px] mb-10'>Log In</p>
                    <label htmlFor="email" className='text-sm block mb-2'>Email Address</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        onChange={handleChange}
                        value={values.email}
                        className='bg-[#F5F5F5] px-2 py-3 w-full border-b-[1px] border-[#D3D3D3] mb-5 focus:outline-none'
                    />
                    {touched.email && errors.email ? (
                        <div className='text-xs text-red-600 mb-5'>{errors.email}</div>
                    ) : null}

                    <label htmlFor="password" className='text-sm block mb-2'>Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        onChange={handleChange}
                        value={values.password}
                        className='bg-[#F5F5F5] px-2 py-3 w-full border-b-[1px] border-[#D3D3D3] mb-5 focus:outline-none'
                    />
                    {touched.password && errors.password ? (
                        <div className='text-xs text-red-600 mb-5'>{errors.password}</div>
                    ) : null}

                    <button type="submit" className='bg-[#047CEB] text-white w-full py-3 rounded-md mt-8 mb-7 active:scale-95 duration-300'>Submit</button>
                    <Link className='block text-sm text-center underline mb-16'>Forgotten Password?</Link>
                </form>
            </div>
        </>
    );
};

export default SignIn;