import axios, { AxiosInstance } from "axios";

const apiClient: AxiosInstance = axios.create({
    //本番反映の際はここを本番のドメインに変える
    baseURL: "https://localhost:8081",
    headers: {
        "Content-type": "application/json",
    },
});

export default apiClient;

export class GetData {
    async common(url:string, data:any, callback:any): Promise<any> {
        return axios.get(
            url,
            {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('access_token')!}`
                },
                params: data
            }
        )
        .then(response => {
            callback(response);
        })
        .catch(error => {
            console.log(error);
        });
    }
    async Postcommon(url:string, data:any, callback:any): Promise<any> {
        axios.defaults.headers.common.Authorization = `Bearer ${localStorage.getItem('access_token')!}`;
        return axios.post(
            url,
            data
        )
        .then(response => {
            callback(response);
        })
        .catch(error => {
            console.log(error);
        });
    }
}