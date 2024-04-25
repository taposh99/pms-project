import { createApi, fetchBaseQuery } from "@reduxjs/toolkit/query/react";

export const authApi = createApi({
    reducerPath: "authApi",
    baseQuery: fetchBaseQuery({
        baseUrl: "http://127.0.0.1:8000/api",
    }),
    endpoints: (builder) => ({
        loginUser: builder.mutation({
            query: (data) => ({
                url: "/login",
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: data,
                credentials: 'include'
            }),
        }),
    }),
});

export const { useLoginUserMutation } = authApi;
