import { createBrowserRouter } from "react-router-dom";
import Home from "../Pages/Home/Home";
import SignIn from "../Pages/AccessControl/SignIn/SignIn";
import DashboardLayout from "../layout/DashboardLayout";
import Dashboard from "../Pages/AuthorizedUser/Dashboard/Dashboard";
import AuthorizedRoute from "./AuthorizedRoute";

const router = createBrowserRouter([
    {
        path: "/",
        // element: <Home />,
        element: <SignIn />
    },
    {
        path: "/sign-in",
        element: <SignIn />,
    },
    {
        path: "/dashboard",
        element: <AuthorizedRoute><DashboardLayout /></AuthorizedRoute>,
        // element: <DashboardLayout />,
        children: [
            {
                path: '/dashboard',
                element: <Dashboard />
            },
            {
                path: "products",
                element: <h1>Hello products</h1>
            },
            {
                path: "purchase-order",
                element: <h1>Hello order</h1>
            },
            {
                path: "po-receipts",
                element: <h1>Hello receipts</h1>
            },
            {
                path: "suppliers",
                element: <h1>Hello suppliers</h1>
            },
            {
                path: "Warehouse",
                element: <h1>Hello warehouse</h1>
            },
            {
                path: "delivery",
                element: <h1>Hello delivery</h1>
            }
        ]
    }
]);

export default router;