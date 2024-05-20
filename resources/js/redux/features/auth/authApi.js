import { createAsyncThunk } from "@reduxjs/toolkit";
import axiosSecure from "../../../hooks/useAxiosSecure";

const login = createAsyncThunk(
    "/auth/login",
    async (values, { rejectWithValue }) => {
        try {
            const response = await axiosSecure.post("/login", values);
            return response.data;
        } catch (error) {
            return rejectWithValue(error.response);
        }
    }
);

export default login;
