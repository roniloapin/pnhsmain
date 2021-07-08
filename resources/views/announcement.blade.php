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
            <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-primary card-outline">
                                    <h5 class="text-primary bold-title"> ANNOUNCEMENTS</h5>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" >
                                    <table class="table table-head-fixed table-hover">
                                        <thead>
                                            <tr style="text-align:center;">
                                                <th style="width:200px">Posting Date</th>
                                                <th style="text-align:left;">Announcement</th>    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($announcement as $announcement)
                                            <tr>
                                                <td style="text-align:center;">{{ $announcement->posting_date }}</td>
                                                <td style="text-align:left;">{{ $announcement->publicannouncement }}</td> 
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
@endsection
