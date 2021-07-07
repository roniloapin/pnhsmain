<style scoped>
.page-break {
    page-break-after: always;
}
.tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    overflow:hidden;padding:5px 2px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-z4i2{border-color:#ffffff;text-align:left;vertical-align:middle}
    .tg .tg-km2t{border-color:#ffffff;font-weight:bold;text-align:left;vertical-align:top}
    .tg .tg-km3t{border-color:#ffffff;font-weight:bold;text-align:left;vertical-align:top;text-transform: uppercase;}
    .tg .tg-zv4m{border-color:#ffffff;text-align:left;vertical-align:top}
    .tg .tg-8jgo{border-color:#ffffff;text-align:center;vertical-align:top}
    .tg .tg-zgs3{border-color:#ffffff;font-family:Arial, Helvetica, sans-serif !important;;font-size:15px;font-weight:bold;
    text-align:center;vertical-align:top}
    .tg .tg-t6b0{border-color:#ffffff;color:#00009b;font-weight:bold;text-align:left;text-decoration:underline;vertical-align:top;line-height:200%;}
    .tg .tg-63xc{border-color:#ffffff;color:#000000;font-family:"Arial Black", Gadget, sans-serif !important;;font-size:18px;
    font-weight:bold;text-align:center;vertical-align:top}
    .tg .tg-2eyt{border-color:#ffffff;font-weight:bold;text-align:left;vertical-align:middle}
    .tg .tg-ofj5{border-color:#ffffff;text-align:right;vertical-align:top}
    .tg .tg-h25s{border-color:#ffffff;font-weight:bold;text-align:right;vertical-align:top}

</style>
<!-- <h1>Page 1</h1>
<p>{{ $data->first_name }}</p>
<div class="page-break"></div>
<h1>Page 2</h1> -->

<table class="tg">
                            
                            <thead>
                                <tr>
                                    <!-- <th class="" colspan="4">School Logo</th> -->
                                    <th class="tg-8jgo" colspan="10"> <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/logo.png'))) }}" alt="PNHS" width="100" height="100">
                                    </th>
                                </tr> 
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="tg-zgs3" colspan="10"><span style="color:#00009B">PAG-ASA NATIONAL HIGH SCHOOL</span><br><span >Legazpi City, Albay</span></td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                </tr>
                                <tr>
                                    <td class="tg-63xc" colspan="10">STUDENT ENROLLMENT FORM</td>
                                </tr>
                                
                                <tr>
                                    <td class="tg-t6b0" colspan="10">PERSONAL INFORMATION</td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Full Name:</td>
                                    <td class="tg-km2t" colspan="3">{{ $data->last_name }}, {{ $data->first_name }} {{ $data->middle_name }} {{ $data->extension }}</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Date of Birth:</td>
                                    <td class="tg-km2t">{{ $data->date_of_birth }}</td>
                                    <td class="tg-zv4m">Gender:</td>
                                    <td class="tg-km2t">{{ $data->gender }}</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Contact Number:</td>
                                    <td class="tg-km2t">{{ $data->picture }}</td>
                                    <td class="tg-zv4m">E-mail:</td>
                                    <td class="tg-km2t">{{ $data->email }}</td>
                                </tr>
                                
                                <tr>
                                    <td class="tg-zv4m">Religion:</td>
                                    <td class="tg-km2t">{{ $data->religion->religion_name }}</td>
                                    <td class="tg-zv4m">Birth Cert.:</td>
                                    <td class="tg-km2t">{{ $data->psa }}</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">IP Community <br>Tribe:</td>
                                    <td class="tg-2eyt">{{ $data->indigenous }}</td>
                                    <td class="tg-z4i2">Mother Tongue:</td>
                                    <td class="tg-2eyt">{{ $data->mother_tongue->mother_tongue }}</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">LSEN or PWD?</td>
                                    <td class="tg-km2t">{{ $data->special_educational }}</td>
                                    <td class="tg-zv4m">Specify:</td>
                                    <td class="tg-km2t">{{ $data->specify_lrn }}</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Address: </td>
                                    <td class="tg-km2t" colspan="3">{{ $data->house_no_street }}, {{ $data->barangay }}, {{ $data->city_municipality }}, {{ $data->province }}, {{ $data->region }}</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                </tr>
                                
                                <tr>
                                <br><br><br><br><td class="tg-t6b0" colspan="4">SCHOOL ADMISSION DETAILS</td>
                                </tr>
                                <tr>
                                    
                                    @if($data->key_stage == "jhs")
                                    <td class="tg-zv4m">Grade Level:</td>
                                    <td class="tg-2eyt" colspan="3">{{ $data->jhs_grade_level }}</td>
                                    @elseif($data->key_stage == "shs")
                                    <td class="tg-zv4m">STRAND:</td>
                                    <td class="tg-2eyt" colspan="3">{{ $data->strand->strand_name }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Learner Type:</td>
                                    <td class="tg-km2t">{{ $data->learner_type->learner_type }}</td>
                                    <td class="tg-zv4m">Key Stage:</td>
                                    @if($data->key_stage == "jhs")
                                    <td class="tg-km2t">Junior High School</td>
                                    @elseif($data->key_stage == "shs")
                                    <td class="tg-km2t">Senior High School</td>
                                    @endif
                                </tr>
                                
                                <tr>
                                    <td class="tg-zv4m">School year:</td>
                                    <td class="tg-km2t">{{ $data->schoolyear->schoolyear }}</td>
                                    <td class="tg-zv4m">LRN:</td>
                                    <td class="tg-km2t">{{ $data->lrn }}</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-km2t"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                </tr>
                                
                                <tr>
                                
                                <br><br><br><br><td class="tg-t6b0" colspan="4">PARENT/GUARDIAN INFORMATION</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Father's Name:</td>
                                    <td class="tg-km2t" colspan="3">{{ $data->father_name }}</td>
                                </tr>
                                
                                <tr>
                                    <td class="tg-zv4m">Employment:</td>
                                    <td class="tg-km2t">{{ $data->father_employment }}</td>
                                    <td class="tg-zv4m">Contact No.</td>
                                    <td class="tg-km2t">{{ $data->father_number }}</td>
                                </tr>
                                <tr>
                                    <td class="tg-z4i2">Highest Educational Attainment:<span style="font-weight:bold"> </span></td>
                                    <td class="tg-2eyt" colspan="3">{{ $data->father_education }}</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Mother's Name:</td>
                                    <td class="tg-km2t" colspan="3">{{ $data->mother_name }}</td>
                                </tr>
                                
                                <tr>
                                    <td class="tg-zv4m">Employment:</td>
                                    <td class="tg-km2t">{{ $data->mother_employment }}</td>
                                    <td class="tg-zv4m">Contact No.</td>
                                    <td class="tg-km2t">{{ $data->mother_number }}</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Highest Educational Attainment:<span style="font-weight:bold"> </span></td>
                                    <td class="tg-km2t" colspan="3">{{ $data->mother_education }}</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Guardian's Name:</td>
                                    <td class="tg-km2t" colspan="3">{{ $data->guardian_name }}</td>
                                </tr>
                                
                                <tr>
                                    <td class="tg-zv4m">Employment:</td>
                                    <td class="tg-km2t">{{ $data->guardian_employment }}</td>
                                    <td class="tg-zv4m">Contact No.</td>
                                    <td class="tg-km2t">{{ $data->guardian_number }}</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m">Highest Educational Attainment:</td>
                                    <td class="tg-km2t" colspan="3">{{ $data->guardian_education }}</td>
                                </tr>
                                <tr>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
