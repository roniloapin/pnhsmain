@extends('layouts.app')

<style>
    .bold-title{
        font-family: Tahoma;
        font-weight: bold;
    }
    .bold-title2{
        font-family: Tahoma;
    }
</style>


@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="container center card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed table-hover">
                        <thead>
                            <tr style="text-align:center;">
                                <th>Grade Level</th>
                                <th>Subject</th>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Room</th>
                                <th>Teacher</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="text-align:center;">
                                <td>7</td>
                                <td>English</td> 
                                <td>Monday</td> 
                                <td>8:00am&nbsp;-&nbsp;9:00am</td>
                                <td>101</td> 
                                <td>Ms. Gonzales</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
              <!-- /.card-body -->
                <!-- <div class="pagination mb-0 justify-content-center">
                    <pagination :data="schedules" @pagination-change-page="getResults">
                        <span slot="prev-nav">&lt; Previous</span>
                        <span slot="next-nav">Next &gt;</span>
                    </pagination>
                </div> -->
            </div>
                </div>
        </div>
    </div>
</div>
@endsection
