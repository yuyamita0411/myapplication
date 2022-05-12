import http from "@/views/ts/http";

export class Authenticate {
    /*async check(token:string): Promise<any> {
        return http.post(
        "/api/user/check",
        {
            "token":token
        })
        .then(response => {
            console.log(response);
        })
        .catch(error => {
            console.log(error);
        });
    }*/
    check(token:string): Promise<any> {
        return http.get(
        "/api/user/check",
        {
            headers: {
                Authorization: `Bearer ${token!}`
            }
        })
        .then(response => {
            console.log(response);
        })
        .catch(error => {
            console.log(error);
        });
    }

}