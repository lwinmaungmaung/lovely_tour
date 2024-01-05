import {getTour, getTours} from "../../lib/TourHelper.js";
import {Link, useLoaderData} from "react-router-dom";
import {getItineraryDays} from "../../lib/ItineraryDayHelper.js";
import {useEffect, useState} from "react";
import {deleteItinerary, getItineraries} from "../../lib/ItineraryHelper.js";


export default function ItineraryIndex(props) {


    const tourId = props.tourId;
    const itineraryDayId = props.itineraryDayId;
    const [itineraries, setItineraries] = useState([]);
    useEffect(() => {
        getItineraries(tourId, itineraryDayId).then(itineraries => {
            setItineraries(itineraries)
        }).catch(error => console.log(error));
    }, []);
    const handleDelete = (event, itineraryId, index) => {
        deleteItinerary(tourId, itineraryDayId, itineraryId)
        let update_itineraries = [...itineraries]
        update_itineraries.splice(index, 1)
        setItineraries(update_itineraries)
    }
    return (
        <>

            {itineraries.map((itinerary, index) => {
                return (
                    <div className={"row"} key={index}>
                        <div className="col-md-3 text-right">
                            {itinerary.begin} :
                        </div>
                        <div className="col-md-6">
                            {itinerary.name}
                        </div>
                        <div className="col-md-3">
                            <button className={"text-danger"} onClick={(e) => handleDelete(e, itinerary.id, index)}>Delete</button>
                        </div>
                    </div>
                )
            })}
            <br/>
            <Link to={`/admin/tour/${tourId}/itineraryDays/${itineraryDayId}/itinerary/create`} className={"text-primary mt-3"}>Add Itinerary</Link>


        </>
    )
}
