import {useEffect, useState} from "react";
import {getTours,deleteTour} from "../../lib/TourHelper.js";
import {Link} from "react-router-dom";

function TourRow(props) {
    const tour = props.tour
    const handleDelete = (e) => {
        e.preventDefault()
        deleteTour(tour.id)
    }
    return(
        <tr>
            <th scope="row">{tour.id}</th>
            <td>{tour.name}</td>
            <td>{tour.price_per_pax}</td>
            <td>{tour.min_pax_booking}</td>
            <td>
                <Link to={'/tour/'+tour.id}>Edit</Link>
                &nbsp;
                <button onClick={handleDelete}>Delete</button>
            </td>
        </tr>
    );
}

export default function Tour(){
    const [tours, setTours] = useState([]);
    useEffect(() => {
        getTours().then(tours => {
            setTours(tours)
        }).catch(error => error);
    }, []);
    return(
        <>
            <h1 className={"h1"}>Tours</h1>
            <table className="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price per Pax</th>
                    <th scope="col">Min Pax</th>
                    <th scope="col">Management</th>
                </tr>
                </thead>
                <tbody>
                {tours.map((tour,index) => {
                    return <TourRow key={index} tour={tour} />
                } )}


                </tbody>
            </table>
        </>
    )
}
