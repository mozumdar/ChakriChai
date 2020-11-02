@extends('layouts.app')

@section('content')
<div style="background-color: #DAE9EE" class="container-fluid">
    <h1 class="row justify-content-center">All Applicantions</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">       
            @foreach($users->applications as $job) 
            <div class="card">
                <div>       
                    <table class="table" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td>Applied on: {{ date('F d, Y', strtotime($job->created_at)) }}</td>
                                <td>Application Id: {{ $job->id }}</td>
                                <td>Job Title: {{ $job->job_title }}</td>
                                <td>Position: {{ $job->job_position }}</td>
                                <td>Company Name: {{ $job->company_name }}</td>
                                @if($job->status=='0')
                                    <td><h6 class="text text-danger">Pending</h6></td>
                                @else
                                    <td><h6 class="text text-success">You are Selected</h6></td>
                                @endif
                            </tr>
                        </tbody> 
                    </table>
                </div>
            </div> 
           @endforeach
        </div>
    </div>
</div>

<!-- 
    Mahmudul Hasan Mozumdar
    Id. 161-115-019
    Md. Abu. Salek Khan
    Id. 161-115-009
    -->
@endsection