import {createRoot} from "react-dom/client";
import {useEffect, useState} from "react";
import React from "react";
import axios from "axios";
import {getProfile, isLoggedIn} from "./lib/userHelper.js";
import Dashboard from "./Dashboard.jsx";
import {createBrowserRouter, RouterProvider} from "react-router-dom";
import ErrorPage from "./Page/errorPage.jsx";
import Tour from "./Page/Tour/Tour.jsx";
import DisplayArea from "./component/DisplayArea.jsx";
import TourDetail, {TourLoader, updateTourAction} from "./Page/Tour/TourDetail.jsx";
import CreateTour, {createTourAction} from "./Page/Tour/createTour.jsx";


export default function Home() {
    const [token, setToken] = useState([]);

    const login = () => {
        axios.post('/api/login', {'email': 'admin@admin.com', 'password': 'password'})
            .then((response) =>
                response.data
            ).then(data => {
            localStorage.setItem('token', data.access_token)
            window.location.reload(false);
        })
            .catch(error => console.log(error));
    }
    return (
        <div>
            <button onClick={login}>Click to login</button>
        </div>
    );
}


const router = createBrowserRouter([
    {
        path: "/",
        element: <Dashboard/>,
        errorElement: <ErrorPage/>,
        children: [
            {
                path: '/tour/:tourId',
                loader: TourLoader,
                action: updateTourAction,
                element: <TourDetail/>
            },
            {
                path: '/tour/create',
                element: <CreateTour/>,
                action: createTourAction,
            },
            {
                path: '/tour',
                element: <Tour/>,
            },

            {
                path: '/booking',
                element: <DisplayArea/>
            }
        ]
    }
]);

document.body.innerHTML = '<div id="app"></div>';
let root = createRoot(document.getElementById('app'));
if (isLoggedIn()) {
    root.render(
        <React.StrictMode>
            <RouterProvider router={router}/>
        </React.StrictMode>
    )

} else {
    root.render(<Home/>);
}

