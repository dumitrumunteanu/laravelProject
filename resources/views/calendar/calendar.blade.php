@extends('layouts.app_logged_in')

@section('content')
    <div id="calendar-container"><div id="calendar"></div></div>

    @include('components.toast')

    @include('calendar.add_event_modal')
@endsection

