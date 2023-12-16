import axios from "axios";


const headers = {
    "Content-Type": "application/json"
}

axios.defaults.baseURL = "http://localhost:8086";

axios.defaults.withCredentials = true;

// axios.defaults.headers = headers

export default axios;