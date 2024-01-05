import {Link} from "react-router-dom";
export default function NavLink(){
    const handleLogout = () =>{
        localStorage.removeItem('token');
        window.location.reload(false);
    }
    return (
        <div className={"col-md-2"}>
            <ul className="nav flex-column">
                <li className="nav-item">
                    <Link to={'/tour'} className={"nav-link"}>Tours</Link>
                </li>
                <li className="nav-item">
                    <Link to={'/booking'} className={"nav-link"}>Bookings</Link>
                </li>
                <li className="nav-item">
                    <a className="nav-link" href="#" onClick={handleLogout}>Logout</a>
                </li>
            </ul>
        </div>
    );
}
