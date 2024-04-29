import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { authApi } from "./authApi";

const initialState = {
    name: "",
    email: "",
    isLoading: false,
    isError: false,
    error: "",
    token: null,
};

export const signinUser = createAsyncThunk(
    "userSlice/signinUser",
    async (action) => {
        // const response = await authApi.loginUser(action);
        // console.log("thunk data: ->>>>>", response);
        // return response;
    }
);

const userSlice = createSlice({
    name: "userSlice",
    initialState,
    reducers: {
        setUserInfo(state, action) {
            console.log("action inside slice", action);
            state.name = action.payload.data[1].user.name;
            state.email = action.payload.data[1].user.email;
            state.token = action.payload.data[0].token;
        },
    },
    extraReducers: (builder) => {
        builder
            .addCase(signinUser.pending, (state) => {
                state.isLoading = true;
                state.isError = false;
                state.email = "";
                state.name = "";
                state.error = "";
                state.token = null;
            })
            .addCase(signinUser.fulfilled, (state, { payload }) => {
                state.isLoading = false;
                state.isError = false;
                state.email = payload.email;
                state.name = payload.name;
                state.error = "";
                state.token = payload.token;
            })
            .addCase(signinUser.rejected, (state, action) => {
                state.isLoading = false;
                state.isError = true;
                state.email = "";
                state.name = "";
                state.error = action.error.message;
                state.token = null;
            });
    },
});

export const { setUserInfo } = userSlice.actions;

export default userSlice.reducer;
