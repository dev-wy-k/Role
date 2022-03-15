@extends("layouts.app")

@section('title') Update Name & Email @endsection

@section('content')

<x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">Upadate Name & Email</li>
</x-breadcrumb>

<div class="row">
    <div class="col-12 col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('profile.changeName') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">
                            <i class="mr-1 feather-user"></i>
                            User Name
                        </label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                        @error("name")
                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="chnageName" required>
                            <label class="custom-control-label" for="chnageName">I'm Sure</label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="mr-1 feather-refresh-ccw"></i>
                            Change Now
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('profile.changeEmail') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">
                            <i class="mr-1 feather-mail"></i>
                            Email
                        </label>
                        <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
                        @error("name")
                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="ChangeEmail" required>
                            <label class="custom-control-label" for="ChangeEmail">I'm Sure</label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="mr-1 feather-refresh-ccw"></i>
                            Change Now
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('profile.update.info') }}" method="post" id="infoUpdate">
                    @csrf
                    <div class="form-group">
                        <label>
                            <i class="mr-1 feather-phone"></i>
                            Your Phone
                        </label>
                        <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}" required>
                        @error("phone")
                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>
                            <i class="mr-1 feather-map"></i>
                            Address
                        </label>
                        <textarea name="address" class="form-control" rows="5" required>{{ Auth::user()->address }}</textarea>
                        @error("address")
                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="changePhoneAndAddress" required>
                            <label class="custom-control-label" for="changePhoneAndAddress">I'm Sure</label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="mr-1 feather-refresh-ccw"></i>
                            Change Now
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @endsection