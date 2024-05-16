import axiosSecure from "../../../hooks/useAxiosSecure";
import { loginFailure, loginStart, loginSuccess } from "./authSlice";
import axios from "axios";

const login = (values) => async (dispatch) => {
    dispatch(loginStart());
    try {
        const response = await axiosSecure.post("/login", values);
        dispatch(loginSuccess(response.data));
    } catch (error) {
        dispatch(loginFailure(error.message));
    }
};

export default login;
