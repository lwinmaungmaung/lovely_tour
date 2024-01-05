import NavLink from "./component/NavLink.jsx";
import DisplayArea from "./component/DisplayArea.jsx";
import {Outlet} from "react-router-dom";

export default  function Dashboard(){
    return (
        <div className={"row m-3"}>
            <NavLink />
            <div id="detail" className={"col-md-8"}>
                <Outlet/>
            </div>
        </div>
    );
}
