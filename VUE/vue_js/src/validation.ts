export class Validation{
    static onlyInt (str:string){

        const onlyint = /^[0-9]*$/;
        if(!onlyint.test(str)){
            return;
        }
    }
}