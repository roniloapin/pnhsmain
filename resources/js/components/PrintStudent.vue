<template>
    <div class="container">
        <!-- <button class=" btn-secondary" @click="printme"><i class="fas fa-print fa-fw"></i></button> -->
        <div class="row mt-2">
            <div >
                <div class="card">
                    <!-- /.card-header -->
                    <div>
                        <th class="tg-h25s">
                            <button id="printpagebutton" class="btn btn-primary btn-block p-1" @click="printme">Print <i class="fas fa-print fa-fw"></i></button>
                        </th>
                        <table class="tg">
                            
                            <thead>
                                <tr>
                                    <!-- <th class="" colspan="4">School Logo</th> -->
                                    <th class="tg-8jgo" colspan="4"> <img src="data:image/jpeg;base64,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" alt="PNHS" width="100" height="100">
                                    </th>
                                </tr> 
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="tg-zgs3" colspan="4"><span style="color:#00009B">PAG-ASA NATIONAL HIGH SCHOOL</span><br><span >Legazpi City, Albay</span></td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                </tr>
                                <tr>
                                    <td class="tg-63xc" colspan="4">STUDENT ENROLLMENT FORM</td>
                                </tr>
                                <tr>
                                    <td class="tg-t6b0">PERSONAL INFORMATION</td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Full Name:</td>
                                    <td class="tg-km2t" colspan="3">Last Name, First name, M.I., Ext.</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Date of Birth:</td>
                                    <td class="tg-km2t">December 31, 2021</td>
                                    <td class="tg-zv4m">Gender:</td>
                                    <td class="tg-km2t">Female</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Contact Number:</td>
                                    <td class="tg-km2t">09123456789</td>
                                    <td class="tg-zv4m">E-mail:</td>
                                    <td class="tg-km2t">sample@gmail.com</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Address: </td>
                                    <td class="tg-km2t" colspan="3">House No. &amp; Street, Barangay, City/Municipality, Province, Region</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Religion:</td>
                                    <td class="tg-km2t">Roman Catholic</td>
                                    <td class="tg-zv4m">Birth Cert.:</td>
                                    <td class="tg-km2t">1234567891</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">IP Community <br>Tribe:</td>
                                    <td class="tg-2eyt">Yes</td>
                                    <td class="tg-z4i2">Mother <br>Tongue:</td>
                                    <td class="tg-2eyt">Bicol</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">LSEN or PWD?</td>
                                    <td class="tg-km2t">Yes</td>
                                    <td class="tg-zv4m">Specify:</td>
                                    <td class="tg-km2t">Handicapped</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                </tr>
                                <tr>
                                    <td class="tg-t6b0" colspan="4">SCHOOL ADMISSION DETAILS</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Learner Type:</td>
                                    <td class="tg-km2t">Incoming Regular Student</td>
                                    <td class="tg-ofj5">Key Stage:</td>
                                    <td class="tg-km2t">Senior High School</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Grade Level/<br>STRAND:</td>
                                    <td class="tg-2eyt" colspan="3">Science, Technology, Engineering and Mathematics (STEM)</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">School year:</td>
                                    <td class="tg-km2t">2021-2022</td>
                                    <td class="tg-zv4m">LRN:</td>
                                    <td class="tg-km2t">123456789</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-km2t"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                </tr>
                                <tr>
                                    <td class="tg-t6b0" colspan="4">PARENT/GUARDIAN INFORMATION</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Father's Name:</td>
                                    <td class="tg-km2t" colspan="3">Last Name, First Name, M.I.</td>
                                </tr>
                                <tr>
                                    <td class="tg-z4i2">Highest Educational <br> Attainment:<span style="font-weight:bold"> </span></td>
                                    <td class="tg-2eyt" colspan="3">College&nbsp;&nbsp;Graduate</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Employment:</td>
                                    <td class="tg-km2t">Self Employed</td>
                                    <td class="tg-zv4m">Contact No.</td>
                                    <td class="tg-km2t">09123456789</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Mother's Name:</td>
                                    <td class="tg-km2t" colspan="3">Last Name, First Name, M.I.</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Highest Educational <br> Attainment:<span style="font-weight:bold"> </span></td>
                                    <td class="tg-km2t" colspan="3">College  Graduate</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Employment:</td>
                                    <td class="tg-km2t">Self Employed</td>
                                    <td class="tg-zv4m">Contact No.</td>
                                    <td class="tg-km2t">09123456789</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Guardian's Name:</td>
                                    <td class="tg-km2t" colspan="3">Last Name, First Name, M.I.</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Highest Educational <br> Attainment:</td>
                                    <td class="tg-km2t" colspan="3">College Graduate</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Employment:</td>
                                    <td class="tg-km2t">Self Employed</td>
                                    <td class="tg-zv4m">Contact No.</td>
                                    <td class="tg-km2t">09123456789</td>
                                </tr>
                                <tr>
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
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-z4i2{border-color:#ffffff;text-align:left;vertical-align:middle}
    .tg .tg-km2t{border-color:#ffffff;font-weight:bold;text-align:left;vertical-align:top}
    .tg .tg-zv4m{border-color:#ffffff;text-align:left;vertical-align:top}
    .tg .tg-8jgo{border-color:#ffffff;text-align:center;vertical-align:top}
    .tg .tg-zgs3{border-color:#ffffff;font-family:Arial, Helvetica, sans-serif !important;;font-size:15px;font-weight:bold;
    text-align:center;vertical-align:top}
    .tg .tg-t6b0{border-color:#ffffff;color:#00009b;font-weight:bold;text-align:left;text-decoration:underline;vertical-align:top}
    .tg .tg-63xc{border-color:#ffffff;color:#000000;font-family:"Arial Black", Gadget, sans-serif !important;;font-size:18px;
    font-weight:bold;text-align:center;vertical-align:top}
    .tg .tg-2eyt{border-color:#ffffff;font-weight:bold;text-align:left;vertical-align:middle}
    .tg .tg-ofj5{border-color:#ffffff;text-align:right;vertical-align:top}
    .tg .tg-h25s{border-color:#ffffff;font-weight:bold;text-align:right;vertical-align:top}
</style>


