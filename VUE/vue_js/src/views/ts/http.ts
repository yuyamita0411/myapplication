import axios, { AxiosInstance } from "axios";

const apiClient: AxiosInstance = axios.create({
    //本番反映の際はここを本番のドメインに変える
    baseURL: "https://localhost:8081",
    headers: {
        "Content-type": "application/json",
    },
});

export default apiClient;