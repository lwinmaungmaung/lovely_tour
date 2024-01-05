import axios from "axios";

export function getBookings() {
    const token = localStorage.getItem('token');
    let config = {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }
    return new Promise((resolve, reject) => {
        axios.get('/api/booking', config)
            .then((response) =>{
                    console.log(response.data);
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
