import { createBrowserRouter } from "react-router-dom";
import Home from "../Pages/Home/Home";
import SignIn from "../Pages/AccessControl/SignIn/SignIn";
import DashboardLayout from "../layout/DashboardLayout";

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
        element: <DashboardLayout />
    }
]);

export default router;