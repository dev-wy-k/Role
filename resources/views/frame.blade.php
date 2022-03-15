@extends('layouts.app')

@section('title') Frame @endsection

@section('content')

<x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Frame</li>
</x-breadcrumb>

<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-body">

            </div>
        </div>
    </div>
</div>


@endsection

@section('foot')
<script>

</script>
@endsection