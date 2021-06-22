@extends('admin_layouts.master')

@section('title')
Teachers
@endsection

@section('content')
<!-- Modal-->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/addteacher" method="post" enctype=multipart/form-data>
        @csrf
          <div class="form-group">
            <label for="userid" class="col-form-label">User</label>
            <input type="text" class="form-control" id="user" name="user" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">education</label>
            <input type="text" class="form-control"  name="education" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">university</label>
            <input type="text" class="form-control"  name="uni" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">address</label>
            <input type="text" class="form-control"  name="address" required>
          </div>
          <div class="form-group">
            <label  class="col-form-label">subjects</label>
            <select class="custom-select" name="subject">
            <option selected>Choose...</option>
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
            <label  class="col-form-label">Language</label>
            <select class="custom-select" id="inputGroupSelect01" name="teachingLang">
            <option selected>Choose...</option>
            <option value="English">English</option>
            <option value="Arabic">Arabic</option>
             <option value="French">French</option>       
  </select>
</div>
        <div class="form-group">
        <label  class="col-form-label">Grade</label>
        <select class="custom-select"  name="teachingGrade">
         <option selected>Choose</option>
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
            <textarea class="form-control"  name="description" required></textarea>
          </div>
          <div class="">
          <label class="col-form-label">Add Resume</label>
            <input type="file" class="form-control" value="add resume"  name="resume" required>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Teacher</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Teachers Table</h4>
                <x-alert />
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal" >Add</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-stripped" id="teacherstable">
                    <thead class=" text-primary">
                      <th> t_id </th>
                      <th> user_id </th>
                      <th> education </th>
                      <th> university </th>
                      <th> subject </th>
                      <th > teachingLanguage</th>
                      <th > teachingGrade</th>
                      <th > address</th>
                      <th > description</th>
                      <th > resume</th>
                      <th >isstaff</th>
                      <th >Edit</th>
                      <th >Delete</th>
                      <th >Download</th>
                      <th >Accept</th>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teacher)
                      <tr>
                        <td class="text-center">{{$teacher->t_id}}</td>
                        <td class="text-center"> {{$teacher->user_id}}</td>
                        <td class="text-center"> {{$teacher->education}}</td>
                        <td class="text-center">{{$teacher->university}}</td>
                        <td class="text-center">{{$teacher->subject}}</td>
                        <td class="text-center">{{$teacher->teachingLang}}</td>
                        <td class="text-center">{{$teacher->teachingGrade}}</td>
                        <td >{{$teacher->address}}</td>
                        <td >{{$teacher->description}}</td>
                        <td >{{$teacher->resume}}</td>
                        <td >{{$teacher->isstaff}}</td>
                        <td >
                            <a href="/teacheredit/{{$teacher->t_id}}" class="btn btn-success">Edit</a>
                        </td>
                        <td >
                            <a href="/deleteteacher/{{$teacher->t_id}}" class="btn btn-danger">Delete</a>
                        </td>
                         <td >
                            <a href="upload/resumes/{{$teacher->resume}}" class="btn btn-secondary" download="{{$teacher->resume}}">
                             Download Cv
                            </a>
                        </td>
                        <td >
                            <a href="/accept/{{$teacher->t_id}}" class="btn btn-success">Accept</a>
                        </td>
                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')
<script>
  $(document).ready( function () {
    $('#teacherstable').DataTable();
} );
</script>
@endsection