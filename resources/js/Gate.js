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

    isAdminOrRegistrar(){
        if(this.user.role === 'admin' || this.user.role === 'registrar'){
            return true;
        }
    }

    isTeacherOrAdmin(){
        if(this.user.role === 'admin' || this.user.role === 'teacher'){
            return true;
        }
    }

    isTeacherOrAdminOrRegistrar(){
        if(this.user.role === 'admin' || this.user.role === 'teacher' || this.user.role === 'registrar'){
            return true;
        }
    }

    isStudent(){
        return this.user.role === 'student';
    }



}