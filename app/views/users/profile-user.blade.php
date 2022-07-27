@extends('layouts.main')
@section('content')
                <link rel="stylesheet" href="{{ BASE_URL . 'css/main.css'}}">
                <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{ IMAGE_URL . '' . $user->avatar }}"></div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Profile </h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" value="{{ $user->email }}" readonly></div>
                                    <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" value="{{ $user->name }}" readonly></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" value="*************************" readonly></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Role</label><input type="text" class="form-control" readonly value="{{ $role }}"></div>
                                </div>
                                <form action="{{BASE_URL.'logout'}}" method="POST">
                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">LOG OUT</button></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center experience"><span>SUBJECT CREATE BY YOU</span></div><br>
                                <div class="card" style="width: 18rem">
                                    <ul class="list-group list-group-flush">
                                       @foreach($subjects as $sub)
                                        <li class="list-group-item">{{$sub->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection


