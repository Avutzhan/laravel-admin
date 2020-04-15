@extends('layouts.app')

@section('title', 'Modex')

@section('content')



    <!--HEADER NAVBAR-->
    @include('main.partials.header')
    <!--HEADER NAVBAR END-->

    <!--BANNER-->
    @include('main.partials.banner')
    <!--BANNER END-->

    <!--CONSTRUCTION PRINCIPLES-->
    @include('main.partials.construction_principles')
    <!--CONSTRUCTION PRINCIPLES END-->

    <!--PROJECTS-->
    @include('main.partials.projects')
    <!--PROJECTS END-->

    <!--VIDEO-->
    @include('main.partials.video')
    <!--VIDEO END-->

    <!--NEWS-->
    @include('main.partials.media_about_us')
    <!--NEWS END-->

    <!--MAP-->
    @include('main.partials.map')
    <!--MAP END-->

    <!--CONTACTS-->
    @include('main.partials.contacts')
    <!--CONTACTS END-->

    <!--FOOTER-->
    @include('main.partials.footer')


    <!--FOOTER END-->
@endsection
