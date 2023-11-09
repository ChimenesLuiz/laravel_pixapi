@extends('efipix::layouts.master')
@section('pix.index')
@if (session() -> has('message'))
    
@endif

    <section class="container">
        <a href="{{route('efipix.create')}}" class="btn btn-dark mb-3">Gerar nova Cobranca</a>
        <table class="table table-hover text-left">
            <thead style="background-color: #1d3557; color: #ffffff">
            <tr>
                <th scope="col">Pagante</th>
                <th scope="col">CPF Pagante</th>
                <th scope="col">Recebedor</th>
                <th scope="col">Tipo de Chave</th>
                <th scope="col">Chave</th>
                <th scope="col">Status</th>
                <th scope="col">Valor</th>
                <th scope="col">Acao</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($pixs as $row)
                <tr>
                    <td>{{$row -> nome_pagante}}</td>
                    <td>{{$row -> cpf_pagante}}</td>
                    <td>{{$row -> nome_recebedor}}</td>
                    <td>{{$row -> tipo}}</td>
                    <td>{{$row -> chave}}</td>
                    <td>{{$row -> status}}</td>
                    <td>{{$row -> valor}}</td>
                    <td>
                        <a href="{{route('efipix.edit', ['id' => $row -> id])}}" class="link-dark">
                            <i style="color: #1d3557" class="fa-regular fa-pen-to-square fs-6"></i>
                        </a>
                        <a href="{{route('efipix.destroy', ['id' => $row -> id])}}" class="link-dark">
                            <i style="color: #1d3557" class="fa-solid fa-trash fs-6"></i>
                        </a>
                    </td> 
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection