import { createAsyncThunk } from "@reduxjs/toolkit";
import axiosSecure from "../../../hooks/useAxiosSecure";
import Cookies from "js-cookie";

const login = createAsyncThunk(
    "/auth/login",
    async (values, { rejectWithValue }) => {
        try {
            const response = await axiosSecure.post("/login", values);
            const { token } = response.data.data[0];
            Cookies.set("authToken", token, {
                secure: true,
                sameSite: "Strict",
            });
            return response.data;
        } catch (error) {
            return rejectWithValue(error.response);
        }
    }
);

export default login;
