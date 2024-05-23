import React, { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import { Navigate } from "react-router-dom";
import checkAuth from "../redux/features/auth/checkAuth";

const AuthorizedRoute = ({ children }) => {
    const { token } = useSelector((state) => state.auth);
    const dispatch = useDispatch();

    useEffect(() => {
        dispatch(checkAuth());
    }, []);

    if (!token) {
        return <Navigate to="/" />;
    }

    return children;
};

export default AuthorizedRoute;
