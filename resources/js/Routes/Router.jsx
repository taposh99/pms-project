import { createBrowserRouter } from "react-router-dom";
import Home from "../Pages/Home/Home";
import SignIn from "../Pages/AccessControl/SignIn/SignIn";

const router = createBrowserRouter([
    {
        path: "/",
        element: <Home />,
    },
    {
        path: "/sign-in",
        element: <SignIn />,
    },
]);

export default router;