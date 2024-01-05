import {useEffect, useState} from "react";
import {getTours,deleteTour} from "../../lib/TourHelper.js";
import {Link} from "react-router-dom";

function TourRow(props) {
    const deleteItem = props.deleteItem
    const index = props.index
    const tour = props.tour
    const handleDelete = (e) => {
        e.preventDefault()
        deleteTour(tour.id)
        deleteItem(index)
    }
    return(
        <tr>
            <th scope="row">{tour.id}</th>
            <td>{tour.name}</td>
            <td>{tour.price_per_pax}</td>
            <td>{tour.min_pax_booking}</td>
            <td>
                <Link to={'/admin/tour/'+tour.id+'/itineraryDays'}>Itineraries</Link>
                <br/>
                <Link to={'/admin/tour/'+tour.id}>Edit</Link>
                <br/>
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

    function handleDelete (index) {

        let update_tours = [...tours]
        update_tours.splice(index, 1)
        setTours(update_tours);
    }
    return(
        <>
            <h1 className={"h1"}>Tours </h1>
            <Link to={'/admin/tour/create'}>Create Tour</Link>
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
                    return <TourRow key={index} index={index} tour={tour} deleteItem={handleDelete}/>
                } )}


                </tbody>
            </table>
        </>
    )
}
