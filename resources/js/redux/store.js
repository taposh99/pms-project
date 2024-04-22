import { configureStore } from "@reduxjs/toolkit";
import { signinSlice } from "./features/signin/signin";

export const store = configureStore({
    reducer: {
        signinSlice: signinSlice
    },
});
