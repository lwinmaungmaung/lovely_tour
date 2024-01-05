import axios from "axios";

export function isLoggedIn() {
    const token = localStorage.getItem('token');
    if (token === null) return false;
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        axios.get('/api/profile', config)
            .then((response) =>
                response.data
            ).then(data => {
            console.log("authenticated")
            resolve(true)
        })
            .catch(error => {
                console.log("error")
                localStorage.removeItem('token')
                reject(false)
            });
    })

    console.log("result", result);
    return result;
}

export function getProfile() {
    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        axios.get('/api/profile', config)
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
