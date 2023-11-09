@extends('efipix::layouts.master')
@section('pix.index')
<section class="container">
        @include('efipix::pix.alerts')
        <a href="{{route('efipix.create')}}" class="btn btn-dark mb-3">Gerar nova Cobranca</a>
        @include('efipix::pix.show')
    </section>
@endsection