import { createSlice } from "@reduxjs/toolkit";

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
    reducers: {
        loginStart: (state) => {
            state.user = null;
            state.token = null;
            state.loading = true;
            state.error = null;
            state.success = null;
            state.message = null;
        },
        loginSuccess: (state, action) => {
            state.user = action.payload.data[1]?.user;
            state.token = action.payload.data[0]?.token;
            state.loading = false;
            state.error = null;
            state.success = action.payload.success;
            state.message = action.payload.message;
        },
        loginFailure: (state, action) => {
            state.user = null;
            state.token = null;
            state.loading = false;
            state.error = true;
            state.success = action.payload.success;
            state.message = action.payload.message;
        },
        logout: (state) => {
            state.user = null;
            state.token = null;
        },
    },
});

export const { loginStart, loginSuccess, loginFailure, logout } =
    authSlice.actions;

export const authReducer = authSlice.reducer;
