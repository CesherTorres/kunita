@extends('layouts.client')
@section('content')
<main class="no-main">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="ps-breadcrumb__list">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="javascript:void(0);">Fresh</a></li>
                </ul>
            </div>
        </div>
        @livewire('products.index')
    </main>
@endsection