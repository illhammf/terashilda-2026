@extends('layouts.app')

@section('title', 'Buat Pesanan - Teras Hilda')
@section('description', 'Selesaikan pesananmu di Teras Hilda. Pilih ambil sendiri atau diantar.')

@section('content')
    <section class="section dot-bg">
        <div class="wrap" style="max-width:740px">
            <div class="center" style="margin-bottom:34px" data-reveal>
                <span class="sticker rot-2">Pesan Sekarang</span>
                <h1 class="section-title display" style="margin-top:16px">Buat Pesanan</h1>
                <p class="section-sub">Isi data diri dan detail pesananmu, lalu lacak statusnya sampai siap.</p>
            </div>
            <div data-reveal data-delay="100">
                <livewire:order-form-component />
            </div>
        </div>
    </section>
@endsection
