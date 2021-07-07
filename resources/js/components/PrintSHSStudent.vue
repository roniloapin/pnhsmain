<template>
    <div class="container">
        <!-- <button class=" btn-secondary" @click="printme"><i class="fas fa-print fa-fw"></i></button> -->
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div>
                        <table class="tg">
                            <colgroup>
                                <col style="width: 205px">
                                <col style="width: 156px">
                                <col style="width: 229px">
                                <col style="width: 80px">
                                <col style="width: 153px">
                                <col style="width: 301px">
                                <col style="width: 86px">
                                <col style="width: 72px">
                                <col style="width: 178px">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="tg-mcqj" colspan="4">ICT FORM 1</th>
                                    <th class="tg-zv4m"></th>
                                    <th class="tg-km2t"></th>
                                    <th class="tg-km2t"></th>
                                    <th class="tg-km2t"></th>
                                    <th class="tg-h25s">
                                        <!-- <a href="#" @click="printme">
                                            <i id="printpagebutton" class="fa fa-print color-blue" title="Print"></i>
                                        </a> -->
                                        <button id="printpagebutton" class="btn btn-primary btn-block p-1" @click="printme">Print <i class="fas fa-print fa-fw"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td class="tg-8jgo" colspan="4">Please submit the accomplished form to the ICT Unit.</td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Equipment:<br>Model:</td>
                                    <td class="tg-km2t" colspan="3">{{ student.last_name }}</td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-44qx"></td>
                                    <td class="tg-44qx"></td>
                                    <td class="tg-44qx" colspan="2"></td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m" colspan="4">Thank you!!!</td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                </tr>
                                
                                <tr>
                                    <td class="tg-ofj5" colspan="3">DOH-ICTForm 2-REV 0</td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue2Filters from 'vue2-filters'
    export default {
        mixins: [Vue2Filters.mixin],
        props: ['id'],
        data(){
            return{
                editMode: false,
                students: {},
                // form: new Form({
                //     id: '',
                //     unit: '',
                //     name: '',
                //     position: '',
                //     email: '',
                //     password: '',
                //     type: '',
                //     photo: ''
                // }),
                 student: {}
            }
        },
        methods:{
            
            loadStudents(){
                    axios.get("api/shsstudent").then(({ data }) => (this.students = data));
            },
            printme(){
                var printButton = document.getElementById("printpagebutton");
                //Set the print button visibility to 'hidden'
                printButton.style.visibility = 'hidden';
                //Print the page content
                
                var css = '@page { size: portrait; }',
                    head = document.head || document.getElementsByTagName('head')[0],
                    style = document.createElement('style');

                style.type = 'text/css';
                style.media = 'print';

                if (style.styleSheet){
                  style.styleSheet.cssText = css;
                } else {
                  style.appendChild(document.createTextNode(css));
                }

                head.appendChild(style);
                window.print();
                //Set the print button to 'visible' again
                //[Delete this line if you want it to stay hidden after printing]
                printButton.style.visibility = 'visible';
                // window.print('right=1px;')
            },
            getStudentDetails() {
                axios.get(`/api/shsstudent/${this.id}`).then(({ data }) => ( this.students = data.data ));
            }
        },
        created() {
            this.getStudentDetails();
            this.loadStudents();
            fire.$on('AfterCreate', ()=>{
                this.loadStudents();
            });
            // setInterval(()=>this.loadUsers,3000);
        }
    }
</script>


<style scoped>
    /*@media print {
        @page {
            size: portrait;
            margin: 0;
        }
    }*/
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-z4i2{border-color:#ffffff;text-align:left;vertical-align:middle}
    .tg .tg-km2t{border-color:#ffffff;font-weight:bold;text-align:left;vertical-align:top}
    .tg .tg-zv4m{border-color:#ffffff;text-align:left;vertical-align:top}
    .tg .tg-8jgo{border-color:#ffffff;text-align:center;vertical-align:top}
    .tg .tg-44qx{border-color:#ffffff;font-weight:bold;text-align:center;vertical-align:middle}
    .tg .tg-mcqj{border-color:#000000;font-weight:bold;text-align:left;vertical-align:top}
    .tg .tg-h25s{border-color:#ffffff;font-weight:bold;text-align:right;vertical-align:top}
    .tg .tg-mqa1{border-color:#000000;font-weight:bold;text-align:center;vertical-align:top}
    .tg .tg-rz0x{border-color:#ffffff;font-size:medium;font-weight:bold;text-align:center;vertical-align:top}
    .tg .tg-0a7q{border-color:#000000;text-align:left;vertical-align:middle}
    .tg .tg-73oq{border-color:#000000;text-align:left;vertical-align:top}
    .tg .tg-ofj5{border-color:#ffffff;text-align:right;vertical-align:top}
    .tg .tg-aw21{border-color:#ffffff;font-weight:bold;text-align:center;vertical-align:top}
    .center {margin-left:0; margin-right:0;}
    .title-custom{font-weight: bold; font-family: Tahoma; font-size: 20px;}
</style>