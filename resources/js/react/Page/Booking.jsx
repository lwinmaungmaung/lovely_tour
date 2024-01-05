import {useEffect, useState} from "react";
import {Link} from "react-router-dom";
import {getPublicTours} from "../lib/PublicHelper.js";

export default function Booking() {
    const [tours, setTours] = useState([]);
    useEffect(() => {
        getPublicTours().then(tours => setTours(tours))
    }, []);
    return (
        <div className={"container"}>
            <h1 className="h1">Tours</h1>
            {tours.map((tour, index) => {
                return (
                    <div className="card mb-3" key={index}>
                        <div className="card-body">
                            <h5 className="card-title">{tour.name}</h5>
                            <p className="card-text">{tour.description}</p>
                            <Link to={`/booking/${tour.id}`} className="btn btn-primary">Book</Link>
                        </div>
                    </div>
                )
            })}
        </div>
    )
}
