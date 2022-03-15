@extends('layouts.app')

@section('title') User Manager @endsection

@section('content')

<x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Users</li>
</x-breadcrumb>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4>
                    <i class="feather-users"></i>
                    Users Lists
                </h4>
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <!-- <th>Role</th> -->
                            <th>Control</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td class="text-left">
                                {{ $user->name }}
                                @if($user->isBaned == 1)
                                <span class="badge badge-danger">Banned</span>
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>
                            <!-- <td>{{ $user->role }}</td> -->
                            <td>
                                @if($user->role == 1)
                                <button class="btn btn-sm btn-outline-warning" onclick="return changePassword({{$user->id}}, '{{ $user->name }}')">Change Password</button>
                                @if($user->isBaned == 0)

                                <form class="d-inline-block" action="{{ route('user-manager.makeAdmin') }}" id="roleChange{{$user->id}}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="return askConfirm({{$user->id}})">Make Admin</button>
                                </form>

                                <form class="d-inline-block" action="{{ route('user-manager.banUser') }}" id="banUser{{$user->id}}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="return banUser({{$user->id}})">Ban User</button>
                                </form>                                

                                @else

                                <form class="d-inline-block" action="{{ route('user-manager.restoreUser') }}" id="unBanUser{{$user->id}}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="return restore({{$user->id}})">Restore</button>
                                </form>

                                
                                @endif

                                @else

                                <button class="btn btn-sm btn-primary w-75">Admin</button>

                                @endif

                            </td>
                            <td class="text-left">
                                <small>
                                    <i class="feather-calendar"></i>
                                    {{ $user->created_at->format("d F Y") }}
                                    <br>
                                    <i class="feather-clock"></i> 
                                    {{ $user->created_at->format("h:i a") }}
                                </small>
                            </td>
                            <td class="text-left">
                                <small>
                                    <i class="feather-calendar"></i>
                                    {{ $user->updated_at->format("d F Y") }}
                                    <br>
                                    <i class="feather-clock"></i> 
                                    {{ $user->updated_at->format("h:i a") }}
                                </small>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


@endsection

@section('foot')
<script>
    function askConfirm(id) {
        Swal.fire({
            title: 'Are you sure <br> to upgrade role ?',
            text: "Role ချိန်းလိုက်ရင် Admin လုပ်ပိုင်ခွင့်များရရှိမှာဖြစ်ပါတယ်",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#1b9aaa',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Upgrade'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Upgraded !',
                    'Role မြှင့်တင်ချင်း အောင်မြင်ပါတယ်',
                    'success'
                )
                setTimeout(function() {
                    $("#roleChange" + id).submit()
                }, 1500)
            }
        })
    }

    function banUser(id) {
        Swal.fire({
            title: 'Are you sure <br> to bann user ?',
            text: "User ကို Bann လိုက်ရင် အသုံးပြုခွင့်မရှိတော့ပါ",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#1b9aaa',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ban'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Banned !',
                    'အကောင့်ပိတ်ခြင်း အောင်မြင်ပါတယ်',
                    'success'
                )
                setTimeout(function() {
                    $("#banUser" + id).submit()
                }, 1500)
            }
        })
    }

    function restore(id) {
        Swal.fire({
            title: 'Are you sure <br> to allow user ?',
            text: "User အတွက် ပြန်လည်အသုံးပြုခွင့် ရရှိပါမည်",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#1b9aaa',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Allow'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Welocme Back !',
                    'ပြန်လည် အသုံးပြုနိုင်ပါပီ',
                    'success'
                )
                setTimeout(function() {
                    $("#unBanUser" + id).submit()
                }, 1500)
            }
        })
    }

    function changePassword(id, name) {  
        let url = "{{ route('user-manager.changeUserPassword') }}" ;
        Swal.fire({
            title: 'Change Password for '+name,
            input: 'password',
            inputAttributes: {
                autocapitalize: 'off',
                required : "required",
                minLength : 8 
            },
            showCancelButton: true,
            confirmButtonText: 'Change',
            showLoaderOnConfirm: true,
            preConfirm : function (newPassword) {
                $.post(url, {
                    id : id ,
                    password : newPassword ,
                    _token : '{{ csrf_token() }}'
                }).done(function (data) {  
                    if(data.status == 200){
                        Swal.fire({
                            icon : "success",
                            title : "Password Change Complete !",
                            text :  data.message 
                        })
                    }else{
                        Swal.fire({
                            icon : "error",
                            title : "Something was wrong !",
                            text : data.message.password[0],
                        })
                    }
                })
            }
        })
    }
</script>
@endsection