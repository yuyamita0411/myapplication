export class Validation {
    IfIsNotEmpty(terget){
        return terget.length != 0;
    }
    IsSmaller255(terget){
        return terget.length <= 255;
    }
    IfIsMunOnly(target){
        var Reg = new RegExp(/^[0-9]*$/);
        var result = Reg.test(target);
        return result;
    }
}