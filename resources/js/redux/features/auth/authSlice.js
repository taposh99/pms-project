import { createSlice } from "@reduxjs/toolkit";
import login from "./authApi";

const initialState = {
    user: null,
    token: null,
    loading: false,
    error: null,
    success: null,
    message: null,
};

const authSlice = createSlice({
    name: "auth",
    initialState,
    extraReducers: (builder) => {
        builder
            .addCase(login.pending, (state) => {
                state.user = null;
                state.token = null;
                state.loading = true;
                state.error = null;
                state.success = null;
                state.message = null;
            })
            .addCase(login.fulfilled, (state, action) => {
                state.user = action.payload.data[1]?.user;
                state.token = action.payload.data[0]?.token;
                state.loading = false;
                state.error = null;
                state.success = action.payload.success;
                state.message = action.payload.message;
            })
            .addCase(login.rejected, (state, action) => {
                state.user = null;
                state.token = null;
                state.loading = false;
                state.error = true;
                state.success = action.payload.success;
                state.message = action.payload.message;
            });
    },
});

export const authReducer = authSlice.reducer;
export default authSlice.reducer;
