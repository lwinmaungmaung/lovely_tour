import {Form, Link, redirect, useLoaderData} from "react-router-dom";
import {getPublicTour} from "../lib/PublicHelper.js";

export async function PublicTourLoader({params}) {
    const tour = await getPublicTour(params.tourId);
    console.log(tour);
    return {tour}
}
export async function bookAction({request, params}) {
    const tourId = params.tourId;

    const formData = await request.formData();
    const updates = Object.fromEntries(formData);

    return redirect(`/booking/${tourId}`);

}

export default function BookingDetail(){
    const rawdata = useLoaderData();
    const tour = rawdata.tour;
    return(
        <div className={"container"}>

            <div className="row">
                <div className="col-md-6">
                    <div className="card mb-3">
                        <div className="card-body">
                            <h5 className="card-title h3">{tour.name}</h5>
                            <p className="card-text">{tour.description}</p>
                        </div>
                    </div>
                </div>
                <div className="col-md-6">
                    'title','name','email','phone','tour_id','adult','children','special_instruction'
                    <Form method={"post"} id={"AddItineraryDayForm"}>
                        <h1 className={"h1"}>Book Now</h1>
                        <input type="hidden" name={"tour_id"} value={tour.id} className="form-control" id="exampleInputName"
                               aria-describedby="nameHelp"/>
                        <div className="mb-3">
                            <label htmlFor="exampleInputName" className="form-label">Title</label>
                            <input type="text" name={"title"} className="form-control" id="exampleInputName"
                                   aria-describedby="nameHelp"/>
                        </div>
                        <div className="mb-3">
                            <label htmlFor="exampleInputName" className="form-label">name</label>
                            <input type="text" name={"name"} className="form-control" id="exampleInputName"
                                   aria-describedby="nameHelp"/>
                        </div>
                        <div className="mb-3">
                            <label htmlFor="exampleInputName" className="form-label">E-Mail</label>
                            <input type="email" name={"email"} className="form-control" id="exampleInputName"
                                   aria-describedby="nameHelp"/>
                        </div>
                        <div className="mb-3">
                            <label htmlFor="exampleInputName" className="form-label">Phone</label>
                            <input type="text" name={"phone"} className="form-control" id="exampleInputName"
                                   aria-describedby="nameHelp"/>
                        </div>
                        <div className="mb-3">
                            <label htmlFor="exampleInputName" className="form-label">Adult</label>
                            <input type="number" name={"adult"} className="form-control" id="exampleInputName"
                                   aria-describedby="nameHelp"/>
                        </div>
                        <div className="mb-3">
                            <label htmlFor="exampleInputName" className="form-label">Children</label>
                            <input type="number" name={"children"} className="form-control" id="exampleInputName"
                                   aria-describedby="nameHelp"/>
                        </div>
                        <div className="mb-3">
                            <label htmlFor="exampleInputName" className="form-label">Special Instruction</label>
                            <input type="text" name={"special_instruction"} className="form-control" id="exampleInputName"
                                   aria-describedby="nameHelp"/>
                        </div>

                        <input type="hidden" name={"type"} value="default" className="form-control" id="exampleInputName"
                               aria-describedby="nameHelp"/>
                        <input type="submit" value={"Create"} className={"btn btn-primary"}/>
                    </Form>
                </div>
            </div>



        </div>
    )
}
