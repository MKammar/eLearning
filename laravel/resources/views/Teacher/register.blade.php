@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Join Us') }}</div>

                <div class="card-body">
                    <form method="POST" action="joinus" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"  required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                       
                        <div class="form-group row">
                            <label for="education" class="col-md-4 col-form-label text-md-right">{{ __('Education') }}</label>

                            <div class="col-md-6">
                                <input id="education" type="text" class="form-control" name="education" required autocomplete="education">
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <label for="uni" class="col-md-4 col-form-label text-md-right">{{ __('University') }}</label>

                            <div class="col-md-6">
                                <input id="uni" type="text" class="form-control" name="uni" required autocomplete="university">
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="input-group mb-3 col-md-8 offset-2">
                            <div class="input-group-prepend">
                             <label class="input-group-text" for="inputGroupSelect01">Subject</label>
                                         </div>
                                   <select class="custom-select" id="inputGroupSelect01" name="subject">
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
                        </div>
                       <div class="form-group row">
                        <div class="input-group mb-3 col-md-8 offset-2">
                            <div class="input-group-prepend">
                             <label class="input-group-text" for="inputGroupSelect01">Teaching Language</label>
                                         </div>
                                   <select class="custom-select" id="inputGroupSelect01" name="teachingLang">
                                              <option selected>Choose...</option>
                                                 <option value="English">English</option>
                                                    <option value="Arabic">Arabic</option>
                                                     <option value="French">French</option>
            
                                                        </select>
                                             </div>
                        </div>
                        <div class="form-group row">
                        <div class="input-group mb-3 col-md-8 offset-2">
                            <div class="input-group-prepend">
                             <label class="input-group-text" for="inputGroupSelect01">Teaching Grade</label>
                                         </div>
                                   <select class="custom-select" id="inputGroupSelect01" name="teachingGrade">
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
                        </div>
                        
                        <div class="form-group row">
                            <label for="des" class="col-md-4 col-form-label text-md-right">{{ __('About you') }}</label>

                            <div class="col-md-6">
                                <textarea id="text" type="text" class="form-control " name="description" required autocomplete="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="resume" class="col-md-4 col-form-label text-md-right">{{ __('Add resume') }}</label>

                            <div class="col-md-6">
                                <input id="resume" type="file" class="form-control" name="resume" required autocomplete="resume">
                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection