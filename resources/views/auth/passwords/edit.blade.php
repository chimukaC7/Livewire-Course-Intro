@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-6">

        {{-- passing parameters to the component --}}
{{--        @livewire('profile',['user_id'])--}}

        @livewire('profile')
    </div>
</div>
@endsection
