import axios from "axios";

export function getTours() {
    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        axios.get('/api/tour', config)
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

export function getTour(tourId) {

    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        axios.get('/api/tour/' + tourId, config)
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

export function updateTour(tourId, updates) {
    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        console.log(tourId)
        axios.put(
            '/api/tour/' + tourId, updates, config)
            .then((response) => {
                    console.log(response.data)
                    return response.data

                }
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

export function deleteTour(tourId) {
    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        console.log(tourId)
        axios.delete(
            '/api/tour/' + tourId, config)
            .then((response) => {
                console.log(response.data)
                return response.data
            }).then(data => {
            resolve(data.data)
        })
            .catch(error => {
                console.log("error")
                console.log(error)
                reject(error)
            });
    })
}
