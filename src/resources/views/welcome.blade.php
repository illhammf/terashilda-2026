@extends('layouts.app')

@section('title', 'Teras Hilda - Rasanya Beda, Harganya Bersahabat')
@section('description', 'Teras Hilda - Mie Jebew Mentai, Kwetiaw, Burger, Pangsit dan berbagai makanan lezat lainnya. Pesan online, tanpa ribet!')

@section('content')
    @include('sections.hero')
    @include('sections.menu')
    @include('sections.about')
    @include('sections.testimonials')
    @include('sections.contact')
@endsection
