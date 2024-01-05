import axios from "axios";

export function getPublicTours() {
    let config = {
        headers: {
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        axios.get('/api/public/tour', config)
            .then((response) =>
                response.data
            ).then(data => {
            resolve(data.data)
        })
            .catch(error => {
                console.log("error")
                console.log(error)
                reject(error)
            });
    })

}

export function getPublicTour(tourId) {
    let config = {
        headers: {
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        axios.get('/api/public/tour/' + tourId, config)
            .then((response) =>
            {
                console.log(response.data)
                return response.data
            }

            ).then(data => {
            resolve(data.data)
        })
            .catch(error => {
                console.log(error)
                reject(error)
            });
    })

}

export function placeBooking(updates) {
    let config = {
        headers: {
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        axios.post('/api/public/book/',updates, config)
            .then((response) =>
                {
                    console.log(response.data)
                    return response.data
                }

            ).then(data => {
            resolve(data.data)
        })
            .catch(error => {
                console.log(error)
                reject(error)
            });
    })

}
