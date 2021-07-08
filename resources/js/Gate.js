export default class Gate{

    constructor(user){
        this.user = user;
    }

    isAdmin(){
        return this.user.role === 'admin';
    }

    isTeacher(){
        return this.user.role === 'teacher';
    }

    isTeacherOrAdmin(){
        if(this.user.role === 'admin' || this.user.role === 'teacher'){
            return true;
        }
    }

    isStudent(){
        return this.user.role === 'student';
    }



}