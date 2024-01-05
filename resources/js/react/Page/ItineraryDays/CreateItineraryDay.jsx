import {Form, useLoaderData, redirect} from "react-router-dom";
import {createItineraryDay} from "../../lib/ItineraryDayHelper.js";

export async function createItineraryDayAction({request, params}) {
    const tourId = params.tourId;
    const formData = await request.formData();
    const updates = Object.fromEntries(formData);
    await createItineraryDay(params.tourId,updates);
    return redirect(`/admin/tour/${tourId}/itineraryDays/`);

}

export default function CreateItineraryDay() {
    const tour = useLoaderData();
    const tour_id = tour.tour.id;
    return (
        <Form method={"post"} id={"AddItineraryDayForm"}>
            <h1 className={"h1"}>Add Itinerary Day</h1>
            <div className="mb-3">
                <label htmlFor="exampleInputName" className="form-label">Header</label>
                <input type="text" name={"header"} className="form-control" id="exampleInputName"
                       aria-describedby="nameHelp"/>
            </div>
            <input type="submit" value={"Create"} className={"btn btn-primary"}/>
        </Form>
    )
}
