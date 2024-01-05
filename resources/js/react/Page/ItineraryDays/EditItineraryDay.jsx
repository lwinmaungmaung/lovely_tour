import {getTour} from "../../lib/TourHelper.js";
import {Form, useLoaderData, redirect} from "react-router-dom";
import {updateTour} from "../../lib/TourHelper.js";
import {getItineraryDay, updateItineraryDay} from "../../lib/ItineraryDayHelper.js";


export async function ItineraryDayLoader({params}) {
    const itineraryDay = await getItineraryDay(params.tourId,params.itineraryDayId);
    return {itineraryDay};
}

export async function updateItineraryDayAction({request, params}) {
    const tourId = params.tourId;
    const itineraryDayId = params.itineraryDayId;
    const formData = await request.formData();
    const updates = Object.fromEntries(formData);
    await updateItineraryDay(tourId,itineraryDayId, updates);
    return redirect(`/admin/tour/${tourId}/itineraryDays`);
}

export default function EditItineraryDay() {

    const {itineraryDay} = useLoaderData();

    return (
        <Form method={"post"} id={"updateTourForm"}>
            <h1 className={"h1"}>Edit Itinerary</h1>
            <div className="mb-3">
                <label htmlFor="exampleInputName" className="form-label">Name</label>
                <input type="text" name={"header"} defaultValue={itineraryDay.header} className="form-control" id="exampleInputName"
                       aria-describedby="nameHelp"/>
            </div>
            <input type="submit" value={"Update"} className={"btn btn-primary"}/>
        </Form>
    )
}
