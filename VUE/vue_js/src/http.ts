import http from "@/views/ts/http";
export class GetData {
    async common(url:string, data:any, callback:any): Promise<any> {
        return http.get(
            url,
            {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('access_token')!}`,
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
        return http.post(
            url,
            {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('access_token')!}`,
                }
            },
            data
        )
        .then(response => {
            console.log(response);
            callback(response);
        })
        .catch(error => {
            console.log(error);
        });
    }
}