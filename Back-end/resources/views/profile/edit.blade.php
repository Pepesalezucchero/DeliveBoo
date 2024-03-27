@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card p-4 mb-4 mt-4 bg-white shadow rounded-lg">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">


        @include('profile.partials.delete-user-form')

    </div>
</div>

<style>
    .card{
        border-radius: 20px;
    }
</style>

@endsection
