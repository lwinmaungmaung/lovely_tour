import axios from "axios";

export function getItineraryDays(tourId) {
    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        axios.get(`/api/tour/${tourId}/day`, config)
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

export function createItineraryDay(tourId, updates) {
    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        axios.post(
            `/api/tour/${tourId}/day`, updates, config)
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

export function getItineraryDay(tourId, itineraryId) {

    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        axios.get(`/api/tour/${tourId}/day/${itineraryId}`, config)
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

export function updateItineraryDay(tourId, itineraryId, updates) {

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
                console.error(error)
                reject(error)
            });
    })
}

export function deleteItineraryDay(tourId,itineraryDayId) {
    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {

        axios.delete(
            `/api/tour/${tourId}/day/${itineraryDayId}`, config)
            .then((response) => {
                console.log(response.data)
                return response.data
            }).then(data => {
            resolve(data.data)
        })
            .catch(error => {

                console.log(error)
                reject(error)
            });
    })
}
