import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";

const initialState = {
    name: "",
    email: "",
    isLoading: false,
    isError: false,
    error: "",
};

export const signinUser = createAsyncThunk(
    "userSlice/signinUser",
    async ({ email, password }) => {
        // const data = await
    }
);

const userSlice = createSlice({
    name: "userSlice",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder
            .addCase(signinUser.pending, (state) => {
                state.isLoading = true;
                state.isError = false;
                state.email = "";
                state.name = "";
                state.error = "";
            })
            .addCase(signinUser.fulfilled, (state, { payload }) => {
                state.isLoading = false;
                state.isError = false;
                state.email = payload.email;
                state.name = payload.name;
                state.error = "";
            })
            .addCase(signinUser.rejected, (state, action) => {
                state.isLoading = false;
                state.isError = true;
                state.email = "";
                state.name = "";
                state.error = action.error.message;
            });
    },
});

export default userSlice;