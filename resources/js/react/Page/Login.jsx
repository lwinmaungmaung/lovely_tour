import React, {useState} from "react";
import axios from "axios";
import {updateItineraryDay} from "../lib/ItineraryDayHelper.js";
import {redirect} from "react-router-dom";
export async function loginAction({request, params}) {
    const formData = await request.formData();
    const updates = Object.fromEntries(formData);

    return redirect(`/tour/${tourId}/itineraryDays`);
}
function login(){
    axios.post('/api/login', {'email': 'admin@admin.com', 'password': 'password'})
        .then((response) =>
            response.data
        ).then(data => {
        localStorage.setItem('token', data.access_token)
        window.location.reload(false);
    })
        .catch(error => console.log(error));
}
export default function Login() {
    const [token, setToken] = useState([]);
    return (
        <div>
            <button onClick={login}>Click to login</button>
        </div>
    );
}
