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
                    Edit Registered Teachers
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <form action="/updateteacher" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$teacher['t_id']}}" >
                     <div class="form-group">
                       <label >user_id</label>
                         <input type="text" name="user" value="{{$teacher->user_id}}" class="form-control" >

                    </div>
                    <div class="form-group">
                        <label >education</label>
                         <input type="text" name="education" value="{{$teacher->education}}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >university</label>
                         <input type="text" name="uni" value="{{$teacher->university}}"class="form-control" >

                    </div>
                    <div class="form-group">
            <label  class="col-form-label">address</label>
            <input type="text" class="form-control" value="{{$teacher->address}}" name="address" required>
          </div>
                    <div class="form-group">
                        <label >subject</label>
          <select class="custom-select" name="subject" >
            <option selected>{{$teacher->subject}}</option>
            <option value="Math">Math</option>
               <option value="Biology">Biology</option>
                   <option value="Physics">Physics</option>
                     <option value="Chemistry">Chemistry</option>
                  <option value="English">English</option>
                  <option value="French">French</option>
                  <option value="Arabic">Arabic</option>
                   <option value="History">History</option>
                   <option value="Geography">Geography</option>
                    <option value="Civil">Civil</option>
               </select>
</div>
                      <div class="form-group">
                        <label >Language</label>
        <select class="custom-select"  name="teachingLang">
            <option selected>{{$teacher->teachingLang}}</option>
            <option value="English">English</option>
            <option value="Arabic">Arabic</option>
             <option value="French">French</option>       
         </select>
                    </div>
        <div class="form-group">
       <label >Grade</label>
        <select class="custom-select"  name="teachingGrade">
            <option selected>{{$teacher->teachingGrade}}</option>
            <option value="2">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
           <option value="6">6</option>
           <option value="7">7</option>
          <option value="8">8</option>
           <option value="9">9</option>
             <option value="10">10</option>
             <option value="11">11</option>
            <option value="12">12</option>          
         </select>
        </div>
        <div class="form-group">
            <label class="col-form-label">description</label>
            <textarea class="form-control"  name="description"  required>{{$teacher->description}}</textarea>
          </div>
          <div class="">
          <label class="col-form-label">Resume</label>
            <input type="file" class="form-control" value="$teacher->resume"  name="resume">
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