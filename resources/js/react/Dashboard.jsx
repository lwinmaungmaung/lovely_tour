import NavLink from "./component/NavLink.jsx";
import {Outlet, redirect} from "react-router-dom";
import {isLoggedIn} from "./lib/userHelper.js";

export default function Dashboard() {
    return (
        <div className={"row m-3"}>
            <NavLink/>
            <div id="detail" className={"col-md-8"}>
                <Outlet/>
            </div>
        </div>
    );
}
