@extends('admin_layouts.master')

@section('title')
Edit Teacher
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Requests of Requested Teachers
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <form action="/updaterequest" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$req['r_id']}}" >
                     <div class="form-group">
                       <label >user</label>
                         <input type="text" name="user" value="{{$req->user_id}}" class="form-control" >

                    </div>
                    <div class="form-group">
                        <label >teacher</label>
                         <input type="text" name="teacher" value="{{$req->t_id}}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >meetingDate</label>
                         <input type="date" name="meetingDate" value="{{$req->meetingDate}}"class="form-control" >

                    </div>
                    <div class="form-group">
            <label  class="col-form-label">meeting time</label>
            <input type="time" class="form-control" value="{{$req->meetingTime}}" name="meetingTime" >
          </div>            
        <div class="form-group">
            <label class="col-form-label">Response</label>
            <input type="text" class="form-control"  name="Response" value="{{$req->Response}}" required></textarea>
          </div>
         
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/teachers" class="btn btn-danger">Cancel</a>
                    </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection