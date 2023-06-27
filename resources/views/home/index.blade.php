@extends('layouts.home')


@section('title', 'Ana Sayfa | ')




@include('home._header')

@include('home._slider')




@include('home.content')

    @include('home._footer')

    @yield('footerjs')


