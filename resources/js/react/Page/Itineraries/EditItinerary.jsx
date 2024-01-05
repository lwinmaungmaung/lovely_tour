import {Form, useLoaderData, redirect} from "react-router-dom";
import {createItinerary} from "../../lib/ItineraryHelper.js";


export async function updateItineraryAction({request, params}) {
    const tourId = params.tourId;
    const itineraryDayId = params.itineraryDayId;

    const formData = await request.formData();
    console.log(formData)
    const updates = Object.fromEntries(formData);
    await createItinerary(tourId, itineraryDayId,updates);
    return redirect(`/admin/tour/${tourId}/itineraryDays/${itineraryDayId}/itinerary/create`);

}

export default function CreateItinerary() {
    const data = useLoaderData();

    return (
        <Form method={"post"} id={"AddItineraryDayForm"}>
            <h1 className={"h1"}>Add Itinerary</h1>
            <div className="mb-3">
                <label htmlFor="exampleInputName" className="form-label">Begin</label>
                <input type="text" name={"begin"} className="form-control" id="exampleInputName"
                       aria-describedby="nameHelp"/>
            </div>
            <div className="mb-3">
                <label htmlFor="exampleInputName" className="form-label">Name</label>
                <input type="text" name={"name"} className="form-control" id="exampleInputName"
                       aria-describedby="nameHelp"/>
            </div>
            <div className="mb-3">
                <label htmlFor="exampleInputName" className="form-label">Description</label>
                <input type="text" name={"description"} className="form-control" id="exampleInputName"
                       aria-describedby="nameHelp"/>
            </div>
            <input type="hidden" name={"type"} value="default" className="form-control" id="exampleInputName"
                   aria-describedby="nameHelp"/>
            <input type="submit" value={"Create"} className={"btn btn-primary"}/>
        </Form>
    )
}
