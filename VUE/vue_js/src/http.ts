import axios, { AxiosInstance } from "axios";

export const apiClient: AxiosInstance = axios.create({
    //本番反映の際はここを本番のドメインに変える
    baseURL: "https://localhost:8081",
    headers: {
        "Content-type": "application/json",
    },
});

export class GetData {
    async common(url:string, data:any, callback:any): Promise<any> {
        return apiClient.get(
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
            if(error.response.status == 401){
                localStorage.setItem('access_token',"");
                location.pathname = '/login';
            }
        });
    }

    async Postcommon(url:string, data:any, callback:any): Promise<any> {
        apiClient.defaults.headers.common.Authorization = `Bearer ${localStorage.getItem('access_token')!}`;
        return apiClient.post(
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