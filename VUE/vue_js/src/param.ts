export class Param {
    GetUrlParamObj(){
        let queryString = window.location.search;
        const queryObject:any = new Object();
        if(queryString){
            queryString = queryString.substring(1);
            const parameters = queryString.split('&');

            for (let i = 0; i < parameters.length; i++) {
                const element = parameters[i].split('=');

                const paramName:string = decodeURIComponent(element[0]);
                const paramValue:string = decodeURIComponent(element[1]);

                queryObject[paramName] = paramValue;
            }
        }
        return queryObject;
    }
}