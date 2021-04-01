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

    isStudent(){
        return this.user.role === 'student';
    }



}