import axios from "axios";

export function getItineraries(tourId,itineraryId) {
    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        axios.get(`/api/tour/${tourId}/day/${itineraryId}/itinerary/`, config)
            .then((response) =>
                response.data
            ).then(data =>
            resolve(data.data)
        )
            .catch(error => {
                reject(error)
            });
    })

}

export function createItinerary(tourId, itineraryDayId, updates) {
    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        axios.post(
            `/api/tour/${tourId}/day/${itineraryDayId}/itinerary/`, updates, config)
            .then((response) => {

                    return response.data

                }
            ).then(data => {
                console.log(data.data)
            resolve(data.data)
        })
            .catch(error => {

                console.error(error)
                reject(error)
            });
    })
}

export function getItinerary(tourId, itineraryDayId, itineraryId) {

    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        axios.get(`/api/tour/${tourId}/day/${itineraryDayId}`, config)
            .then((response) =>
                response.data
            ).then(data => {

            resolve(data.data)
        })
            .catch(error => {

                reject(error)
            });
    })

}

export function updateItinerary(tourId, itineraryId, updates) {

    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {

        axios.put(
            `/api/tour/${tourId}/day/${itineraryId}`, updates, config)
            .then((response) => {

                    return response.data

                }
            ).then(data => {
            resolve(data.data)
        })
            .catch(error => {

                reject(error)
            });
    })
}

export function deleteItinerary(tourId,itineraryDayId,itineraryId) {
    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {

        axios.delete(
            `/api/tour/${tourId}/day/${itineraryDayId}/itinerary/${itineraryId}`, config)
            .then((response) => {
                return response.data
            }).then(data => {
            resolve(true)
        })
            .catch(error => {

                console.log(error)
                reject(false)
            });
    })
}
