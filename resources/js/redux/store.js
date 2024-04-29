import { configureStore } from "@reduxjs/toolkit";
import userSlice from "./features/auth/authSlice";
import { authApi } from "./features/auth/authApi";

const store = configureStore({
    reducer: {
        userSlice: userSlice,
        [authApi.reducerPath]: authApi.reducer,
    },
    middleware: (getDefaultMiddleware) =>
        getDefaultMiddleware().concat(authApi.middleware),
});

export default store;
