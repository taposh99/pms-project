import { createAsyncThunk } from "@reduxjs/toolkit";
import axiosSecure from "../../../hooks/useAxiosSecure";
import Cookies from "js-cookie";

const checkAuth = createAsyncThunk(
    "auth/checkAuth",
    async (_, { rejectWithValue }) => {
        try {
            const token = Cookies.get("authToken");
            if (!token) {
                throw new Error("No token found");
            }
            const response = await axiosSecure.get("/checkAuth", {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            });
            return response.data;
        } catch (error) {
            return rejectWithValue(error.response);
        }
    }
);

export default checkAuth;
