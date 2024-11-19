@extends('layouts.app')
@section('content')
    @include('components.hero-section')

    <!-- Catalog Section -->
    @include('components.catalog-section')

    <!-- Kegiatan Section -->
    @include('components.kegiatan-section')
    @include('components.about-us')
@endsection
