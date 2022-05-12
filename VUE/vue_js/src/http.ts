import http from "@/views/ts/http";

export const loading = `
    <div class="loadingcover w-100 pr-0 pl-0 pl-lg-1 float-lg-left d-inline-block text-center h-100 position-relative">
        <div class="sk-chase position-absolute" style="width:3rem; top:5rem; left:calc((100% - 3rem) / 2);">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
        <p class="text-center position-absolute d-inline-block" style="top:9rem; left:calc((100% - 4rem) / 2);">Loading</p>
    </div>
`;
export class GetData {
    async common(url:string, callback:any): Promise<any> {
        return http.get(
            url,
        {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('access_token')!}`
            }
        })
        .then(response => {
            callback(response);
        })
        .catch(error => {
            console.log(error);
        });
    }

}