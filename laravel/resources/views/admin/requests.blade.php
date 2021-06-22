@extends('admin_layouts.master')

@section('title')
Users
@endsection

@section('content')
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/addrequest" method="post">
        @csrf
          <div class="form-group">
            <label for="userid" class="col-form-label">teacher_id</label>
            <input type="text" class="form-control"  name="t_id" required>
          </div>
          <div class="form-group">
            <label class="col-form-label">student_id</label>
            <input type="text" class="form-control" name="u_id" required>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Request</button>
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

                <h4 class="card-title"> Requests Table</h4>
                <x-alert />
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal" >Add</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-stripped" id="userstable">
                    <thead class=" text-primary">
                    <th>r_id</th>
                    <th>user_id </th>
                    <th>t_id </th>
                      <th>t_FirstName </th>
                      <th>t_lastName </th>
                      <th class="text-center">t_email</th>
                      <th>t_subject</th>
                      <th>Meeting Date</th>
                      <th>meeting time</th>
                      <th>Respnse</th>
                      <th >Edit</th>
                      <th >Delete</th>
                    </thead>
                    <tbody>
                        @foreach($reqs as $req)
                       
                      <tr>
                        <td>{{$req->r_id}}</td>
                        <td>{{$req->id}}</td>
                        <td>{{$req->t_id}}</td>
                        @foreach ($users as $user)
                        @if($user->t_id==$req->t_id)
                        <td>{{$user->firstName}}</td>
                        <td >{{$user->lastName}}</td>
                        <td >{{$user->email}}</td>
                        @endif
                        @endforeach
                       
                        <td >{{$req->subject}}</td>
                        <td >{{$req->meetingDate}}</td>
                        <td >{{$req->meetingTime}}</td>
                        <td >{{$req->Response}}</td>
                       
                        <td >
                            <a href="/editrequest/{{$req->r_id}}" class="btn btn-success">Edit</a>
                        </td>
                        <td >
                            <a href="/deleterequest/{{$req->r_id}}" class="btn btn-danger">Delete</a>
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
    $('#userstable').DataTable();
} );
</script>
@endsection