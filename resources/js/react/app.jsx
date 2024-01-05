import {createRoot} from "react-dom/client";
import React from "react";
import {isLoggedIn} from "./lib/userHelper.js";
import Dashboard from "./Dashboard.jsx";
import {createBrowserRouter, RouterProvider} from "react-router-dom";
import ErrorPage from "./Page/errorPage.jsx";
import Tour from "./Page/Tour/Tour.jsx";
import DisplayArea from "./component/DisplayArea.jsx";
import TourDetail, {TourLoader, updateTourAction} from "./Page/Tour/TourDetail.jsx";
import CreateTour, {createTourAction} from "./Page/Tour/CreateTour.jsx";
import ItineraryDayIndex from "./Page/ItineraryDays/ItineraryDayIndex.jsx";
import CreateItineraryDay, {createItineraryDayAction} from "./Page/ItineraryDays/CreateItineraryDay.jsx";
import EditItineraryDay, {
    ItineraryDayLoader,
    updateItineraryDayAction
} from "./Page/ItineraryDays/EditItineraryDay.jsx";
import CreateItinerary, {createItineraryAction} from "./Page/Itineraries/CreateItinerary.jsx";
import Login, {loginAction} from "./Page/Login.jsx";
import Booking from "./Page/Booking.jsx";
import BookingDetail, {bookAction, PublicTourLoader} from "./Page/BookingDetail.jsx";
import BookingIndex from "./Page/Bookings/BookingIndex.jsx";





const router = createBrowserRouter([
    {
        path: "/admin",
        element: <Dashboard/>,
        errorElement: <ErrorPage/>,
        children: [
            {
                path: '/admin/tour/:tourId/ItineraryDays/:itineraryDayId/itinerary/create',
                loader: ItineraryDayLoader,
                action: createItineraryAction,
                element: <CreateItinerary/>
            },
            {
                path: '/admin/tour/:tourId/ItineraryDays',
                loader: TourLoader,
                element: <ItineraryDayIndex/>
            },
            {
                path: '/admin/tour/:tourId/ItineraryDays/create',
                loader: TourLoader,
                action: createItineraryDayAction,
                element: <CreateItineraryDay/>
            },
            {
                path: '/admin/tour/:tourId/ItineraryDays/:itineraryDayId',
                loader: ItineraryDayLoader,
                action: updateItineraryDayAction,
                element: <EditItineraryDay/>
            },
            {
                path: '/admin/tour/:tourId',
                loader: TourLoader,
                action: updateTourAction,
                element: <TourDetail/>
            },
            {
                path: '/admin/tour/create',
                element: <CreateTour/>,
                action: createTourAction,
            },
            {
                path: '/admin/tour',
                element: <Tour/>,
            },


            {
                path: '/admin/booking',
                element: <BookingIndex/>
            }
        ]
    },
    {
        path: '/booking/:tourId',
        loader: PublicTourLoader,
        action: bookAction,
        element:<BookingDetail/>
    },
    {
        path:'/',
        element:<Booking/>
    },

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
    root.render(<Login/>);
}

