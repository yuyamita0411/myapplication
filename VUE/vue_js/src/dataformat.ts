export class Dataformat{
    Sformat(){
        interface STagFormat {
            startdate: string;
            userid: string;
            mailaddress: string;
            createdat: string;
            scheduleid: string;
            title: string;
            description: string;
            setscheduleinfo: string;
            starttime: string;
            sstime: string;
            ssminute: string;
            sendtime: string;
            sendminute: string;
            endtime: string;
            taskid: string;
            alreadyaddeduser: any;
        }
        const stag: STagFormat = {
            startdate: "",
            userid: "",
            mailaddress: "",
            createdat: "",
            scheduleid: "",
            title: "",
            description: "",
            setscheduleinfo: "",
            starttime: "",
            sstime: "",
            ssminute: "",
            sendtime: "",
            sendminute: "",
            endtime: "",
            taskid: "",
            alreadyaddeduser: []
        };
        return stag;
    }
}

export class SearchMFormat{
    Format(){
        interface Fm {
            config: object;
            data: object;
            headers: object;
            request: object;
            status: number;
            statusText: string;
        }
        const format: Fm = {
            config: {},
            data: {},
            headers: {},
            request: {},
            status: 0,
            statusText: ""
        };
        return format;
    }
}