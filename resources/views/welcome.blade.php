@extends('layouts.master')

@section('body')
    <div class="fixed pin grid gap-spacing w-screen h-screen p-spacing font-normal leading-normal text-default" id="app">
        <clock position="a1:a2"></clock>
        <top-teams position="b1:d12"></top-teams>

        <number
            position="a3:a4"
            title="Open Reports"
            url="/api/open"
        ></number>

        <number
            position="a5:a6"
            title="Accepted Reports"
            url="/api/accepted"
        ></number>

        <number
            position="a7:a8"
            title="Closed Reports"
            url="/api/invalid"
        ></number>

        <powered-by position="a12:a12"></powered-by>
    </div>
@endsection
