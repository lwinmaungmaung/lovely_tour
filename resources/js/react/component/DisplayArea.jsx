import {useEffect, useState} from "react";
import {getProfile} from "../lib/userHelper.js";

export default function DisplayArea() {
    const [profile, setProfile] = useState([]);
    useEffect(() => {
        getProfile().then(profile => {
            setProfile(profile)
        }).catch(error => error);
    }, []);
    return (
        <>
            <h1>You are Logged In</h1>
            <h2>Your Profile information:</h2>
            <ul>
                <li>Name: {profile.name}</li>
                <li>Email: {profile.email}</li>
                <li>User Level: {profile.user_level}</li>
            </ul>
        </>
    )
}
