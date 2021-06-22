@extends('admin_layouts.master')

@section('title')
Edit User
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Registered Users
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <form action="/update" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$user['id']}}" >
                    <div class="form-group">
                        <label >firstname</label>
                         <input type="text" name="firstName" value="{{$user->firstName}}" class="form-control" >

                    </div>
                    <div class="form-group">
                        <label >lastname</label>
                         <input type="text" name="lastName" value="{{$user->lastName}}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >email</label>
                         <input type="email" name="email" value="{{$user->email}}"class="form-control" >

                    </div>
                    <div class="form-group">
                        <label >phone</label>
                         <input type="tel" name="phone"value="{{$user->phone}}" class="form-control" >

                    </div>
                    <div class="form-group">
                        <label >Give Role</label>
                         <select name="role" class="form-control">
                         <option selected>{{$user->role}}</option>
                             <option value="admin" >Admin</option>
                             <option value="student" >Student</option>
                             <option value="teacher" >Teacher</option>
                         </select>     
                    </div>
                    <div class="form-group">
                        <label >isDeleted</label>
                         <input type="text" name="del"value="{{$user->isDeleted}}" class="form-control" >

                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/users" class="btn btn-danger">Cancel</a>
                    </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection