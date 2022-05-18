export class Dataformat{
    schedulemodalformat(e:any){
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
            endtime: string;
            taskid: string;
            alreadyaddeduser: any;
        }
        const stag: STagFormat = {
            startdate: e.target.dataset.setscheduleinfo,
            userid: e.target.dataset.buttonuserid,
            mailaddress: e.target.dataset.mailaddress,
            createdat: e.target.dataset.createdat,
            scheduleid: e.target.dataset.scheduleid,
            title: e.target.dataset.title,
            description: e.target.dataset.description,
            setscheduleinfo: e.target.dataset.setscheduleinfo,
            starttime: e.target.dataset.starttime,
            endtime: e.target.dataset.endtime,
            taskid: e.target.dataset.taskid,
            alreadyaddeduser: [],
        };
        return stag;
    }
}