@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                    {{ date('Y-m-d | h:i:s') }}

                    <br>
                    <br>
                    <button class="btn btn-primary test-alert">Test Alert</button>
                    <button class="btn btn-primary test-toast">Test Toast</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('foot')
<script>
    $(".test-alert").click(function() {

        Swal.fire({
            icon: 'success',
            title: 'Min Ga Lar Par',
            text: 'San Kyi Tar Par',
        })

    });

    $(".test-toast").click(function() {

        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'San Kyi Tar Par'
        })

    })
</script>
@endsection