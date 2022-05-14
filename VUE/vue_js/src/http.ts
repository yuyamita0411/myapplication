import http from "@/views/ts/http";

//ロード時のパーツ
export const loading = `
    <div class="loadingcover w-100 pr-0 pl-0 pl-lg-1 float-lg-left d-inline-block text-center h-100 position-relative">
        <div class="sk-chase position-absolute" style="width:rem; top:5rem; left:calc((100% - 3rem) / 2);">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
        <h4 id="LoadingStr" class="loading text-center position-absolute d-flex w-100" style="top:12rem; left:calc((100% - 4rem) / 2); color:rgb(255, 183, 90);">
            <span>L</span>
            <span>o</span>
            <span>a</span>
            <span>d</span>
            <span>i</span>
            <span>n</span>
            <span>g</span>
        </h4>
    </div>
    <style>
        #LoadingStr{   
        color: rgb(255, 183, 90);
        }

        .loading span {
            animation: loading .7s infinite alternate;
        }
        .loading span:nth-child(2) {
            animation-delay: .1s;
        }
        .loading span:nth-child(3) {
            animation-delay: .2s;
        }
        .loading span:nth-child(4) {
            animation-delay: .3s;
        }
        .loading span:nth-child(5) {
            animation-delay: .4s;
        }
        .loading span:nth-child(6) {
            animation-delay: .5s;
        }
        .loading span:nth-child(7) {
            animation-delay: .6s;
        }

        /* ローディング関連 */
        .sk-chase {
          width: 70px;
          height: 70px;
          position: relative;
          animation: sk-chase 2.5s infinite linear both;
        }
        
        .sk-chase-dot {
          width: 100%;
          height: 100%;
          position: absolute;
          left: 0;
          top: 0; 
          animation: sk-chase-dot 2.0s infinite ease-in-out both; 
        }
        
        .sk-chase-dot:before {
          content: '';
          display: block;
          width: 25%;
          height: 25%;
          background-color: #0069d9;
          border-radius: 100%;
          animation: sk-chase-dot-before 2.0s infinite ease-in-out both; 
        }
        
        .sk-chase-dot:nth-child(1) { animation-delay: -1.1s; }
        .sk-chase-dot:nth-child(2) { animation-delay: -1.0s; }
        .sk-chase-dot:nth-child(3) { animation-delay: -0.9s; }
        .sk-chase-dot:nth-child(4) { animation-delay: -0.8s; }
        .sk-chase-dot:nth-child(5) { animation-delay: -0.7s; }
        .sk-chase-dot:nth-child(6) { animation-delay: -0.6s; }
        .sk-chase-dot:nth-child(1):before { animation-delay: -1.1s; }
        .sk-chase-dot:nth-child(2):before { animation-delay: -1.0s; }
        .sk-chase-dot:nth-child(3):before { animation-delay: -0.9s; }
        .sk-chase-dot:nth-child(4):before { animation-delay: -0.8s; }
        .sk-chase-dot:nth-child(5):before { animation-delay: -0.7s; }
        .sk-chase-dot:nth-child(6):before { animation-delay: -0.6s; }
        
        @keyframes sk-chase {
          100% { transform: rotate(360deg); } 
        }
        
        @keyframes sk-chase-dot {
          80%, 100% { transform: rotate(360deg); } 
        }
        
        @keyframes sk-chase-dot-before {
          50% {
            transform: scale(0.4); 
          } 100%, 0% {
            transform: scale(1.0); 
          } 
        }
        /* ローディング関連 */

        @keyframes loading {
            0% {
                opacity:0.3;
                //letter-spacing:5px;
                transform: scale(0.8);
            }
            20%{
                opacity:0.36;
                transform: scale(0.82);
                //letter-spacing:4.2px;
            }
            40%{
                opacity:0.48;
                transform: scale(0.86);
                //letter-spacing:3px;
            }
            60%{
                opacity:0.66;
                transform: scale(0.92);
                //letter-spacing:2.6px;
            }
            80%{
                opacity:0.8;
                transform: scale(0.98);
                //letter-spacing:2.2px;
            }
            100% {
                opacity:1;
                //letter-spacing:2px;
                transform: scale(1);
            }
        }
    </style>
`;
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

}