import {Link, useLoaderData} from "react-router-dom";
import {deleteItineraryDay, getItineraryDays} from "../../lib/ItineraryDayHelper.js";
import {useEffect, useState} from "react";
import ItineraryIndex from "../Itineraries/ItineraryIndex.jsx";


export default function ItineraryDayIndex(props) {

    const tour = useLoaderData();
    const tour_id = tour.tour.id;
    const [itineraryDays, setItineraryDays] = useState([]);
    useEffect(() => {
        getItineraryDays(tour_id).then(itineraryDays => {
            setItineraryDays(itineraryDays)
        }).catch(error => console.log(error));
    }, []);
    const handleDelete = (index) => {
        let updateItineraryDays = [...itineraryDays]
        const itineraryDay = updateItineraryDays[index]
        deleteItineraryDay(tour_id, itineraryDay.id);
        updateItineraryDays.splice(index, 1)
        setItineraryDays(updateItineraryDays)
    }
    return (
        <>
            <h1 className="h1">Tour Details</h1>
            <Link to={`/admin/tour/${tour_id}/itineraryDays/create`} className={"btn btn-primary my-3"}>Add Day</Link>
            <div><b>Tour Name</b>: {tour.tour.name}</div>
            <table className="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Mgmt</th>

                </tr>
                </thead>
                <tbody>
                {itineraryDays.map((itineraryDay, index) => {
                    return (
                        <tr key={index}>
                            <th scope="row">{index+1}</th>
                            <td>
                                {itineraryDay.header}
                                <ItineraryIndex tourId={tour_id} itineraryDayId={itineraryDay.id}/>
                            </td>
                            <td>
                                <Link to={`/admin/tour/${tour_id}/itineraryDays/${itineraryDay.id}`}
                                      className={"text-primary"}>Edit</Link>
                                &nbsp;

                                {
                                    itineraryDay.itineraries_count <= 0 &&
                                    <button className={"text-danger"}
                                            onClick={() => handleDelete(index)}>Delete</button>
                                }
                            </td>
                        </tr>
                    )
                })}
                </tbody>
            </table>

        </>
    )
}
