@extends('layouts.app')

@section('title', 'Lacak Pesanan - Teras Hilda')
@section('description', 'Lacak status pesananmu di Teras Hilda dengan nomor pesanan.')

@section('content')
    <section class="section dot-bg">
        <div class="wrap" style="max-width:740px">
            <div class="center" style="margin-bottom:34px" data-reveal>
                <span class="sticker rot-1">Lacak Pesanan</span>
                <h1 class="section-title display" style="margin-top:16px">Pesananmu di Mana?</h1>
                <p class="section-sub">Masukkan nomor pesanan atau nomor HP yang kamu gunakan saat memesan.</p>
            </div>
            <div data-reveal data-delay="100">
                <livewire:order-tracking-component />
            </div>
        </div>
    </section>
@endsection
