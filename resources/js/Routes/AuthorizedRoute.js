import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { Navigate, useNavigate } from "react-router-dom";

const AuthorizedRoute = ({ children }) => {
    const { token, user } = useSelector((state) => state.auth);
    const navigate = useNavigate();

    useEffect(() => {
        if (!token & !user) {
            navigate("/");
        }
    }, []);
    return children;
};

export default AuthorizedRoute;
