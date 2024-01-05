import {getBookings} from "../../lib/BookingHelper.js";
import {useEffect, useState} from "react";

export default function BookingIndex(){
    const [ bookings, setBookings ]= useState([])
    useEffect(() => {
        getBookings().then((bookings_data) => setBookings(bookings_data)).catch(error=>console.error(error))
    }, []);

    return(
        <div>
            Booking Index
            {JSON.stringify(bookings)}
        </div>
    )

}
