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
            <nav class="mt-3">
                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link color-blue active" id="nav-jhs-schedule-type-tab" data-toggle="tab" href="#nav-jhs-schedule-type" role="tab" aria-controls="nav-jhs-schedule-type" aria-selected="true"> <strong>JHS Schedule</strong> </a>
                    <a class="nav-item nav-link color-green" id="nav-shs-schedule-tab" data-toggle="tab" href="#nav-shs-schedule" role="tab" aria-controls="nav-shs-schedule" aria-selected="true"><strong>SHS Schedule</strong> </a>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-jhs-schedule-type" role="tabpanel" aria-labelledby="nav-jhs-schedule-tab">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-primary card-outline">
                                    <h5 class="m-0 fas text-primary"> Junior High School Schedule</h5>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" >
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
                                            @foreach($schedules as $schedule)
                                            <tr style="text-align:center;">
                                                <td>{{ $schedule->grade_level }}</td>
                                                <td>{{ $schedule->subject->subject }}</td> 
                                                <td>{{ $schedule->day }}</td> 
                                                <td>{{ $schedule->time_start }}&nbsp;-&nbsp;{{ $schedule->time_end }}</td>
                                                <td>{{ $schedule->room->room }}</td> 
                                                <td>{{ $schedule->user->name }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="nav-shs-schedule" role="tabpanel" aria-labelledby="nav-shs-schedule-tab">
                    <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-success card-outline">
                                        <h5 class="m-0 fas text-success"> Senior High School Schedule</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0" >
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
                                                @foreach($schedules as $schedule)
                                                <tr style="text-align:center;">
                                                    <td>{{ $schedule->grade_level }}</td>
                                                    <td>{{ $schedule->subject->subject }}</td> 
                                                    <td>{{ $schedule->day }}</td> 
                                                    <td>{{ $schedule->time_start }}&nbsp;-&nbsp;{{ $schedule->time_end }}</td>
                                                    <td>{{ $schedule->room->room }}</td> 
                                                    <td>{{ $schedule->user->name }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
