import {Form, useLoaderData, redirect} from "react-router-dom";
import {createTour} from "../../lib/TourHelper.js";

export async function createTourAction({request, params}) {
    const formData = await request.formData();
    const updates = Object.fromEntries(formData);
    await createTour(updates);
    return redirect('/tour/');
}

export default function CreateTour() {
    return (
        <Form method={"post"} id={"AddTourForm"}>
            <h1 className={"h1"}>Add Tour</h1>
            <div className="mb-3">
                <label htmlFor="exampleInputName" className="form-label">Name</label>
                <input type="text" name={"name"} className="form-control" id="exampleInputName"
                       aria-describedby="nameHelp"/>
                <div id="nameHelp" className="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div className="mb-3">
                <label htmlFor="exampleInputDescription" className="form-label">Description</label>
                <input type="text" name="description" className="form-control"
                       id="exampleInputDescription" aria-describedby="descriptionHelp"/>
                <div id="descriptionHelp" className="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div className="row">
                <div className="col-md-6">
                    <div className="mb-3">
                        <label htmlFor="exampleInputPricePerPax" className="form-label">Price Per Pax</label>
                        <input type="text" name={"price_per_pax"}
                               className="form-control" id="exampleInputPricePerPax"
                               aria-describedby="pricePerPaxHelp"/>
                        <div id="pricePerPaxHelp" className="form-text">We'll never share your email with anyone else.
                        </div>
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="mb-3">
                        <label htmlFor="exampleInputMinPax" className="form-label">Min Pax</label>
                        <input type="text" name="min_pax_booking"
                               className="form-control" id="exampleInputMinPax" aria-describedby="minPaxHelp"/>
                        <div id="minPaxHelp" className="form-text">We'll never share your email with anyone else.</div>
                    </div>
                </div>
            </div>
            <input type="submit" value={"Create"} className={"btn btn-primary"}/>
        </Form>
    )
}
