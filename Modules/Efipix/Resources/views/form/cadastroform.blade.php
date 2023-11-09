@extends('efipix::layouts.master')
@section('pix.create')
<section class="container">
  @include('efipix::pix.error')
  <div class="text-center mb-4">
      <h3>Gerar um Qrcode Pix</h3>
      <p class="text-muted">Preencha as informacoes do recebedor</p>
  </div>
  <div class="container d-flex justify-content-center">
      <form action="{{route('efipix.store')}}" method="POST" style="widht:50vw; min-width:300px;">
        @csrf
          <div class="row">
              <div class="mb-3">
                  <label for="" class="form-label">Nome Pagante:</label>
                  <input maxlength="200" type="text" 
                  @isset($flash["_old_input"])
                      value="{{$flash['_old_input']['nome_pagante']}}"
                  @endisset
                  class="form-control" name="nome_pagante" >
              </div>
              <div class="mb-3">
                <label for="" class="form-label">CPF Pagante:</label>
                <input type="text" maxlength="11"
                @isset($flash["_old_input"])
                  value="{{$flash['_old_input']['cpf_pagante']}}"
                @endisset
            class="form-control" name="cpf_pagante" >
            </div>

              <div class="mb-3">
                  <label for="" class="form-label">Nome Recebedor:</label>
                  <input type="text" maxlength="200"
                  @isset($flash["_old_input"])
                  value="{{$flash['_old_input']['nome_recebedor']}}"
                  @endisset
                  class="form-control" name="nome_recebedor" >
              </div>

              <fieldset class="mb-3">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="tipo" value="CPF_CNPJ"
                      {{($data ?? '') ? ($data -> tipo == 'CPF_CNPJ' ? 'checked' : null) : null}}>
                      <label class="form  -check-label">
                        CPF ou CNPJ
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="Celular"
                      name="tipo" {{($data ?? '') ? ($data -> tipo == 'Celular' ? 'checked' : null) : null}}>
                      <label class="form-check-label">
                        Telefone
                      </label>
                    </div>
                    
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="Email" 
                      name="tipo" {{($data ?? '') ? ($data -> tipo == 'Email' ? 'checked' : null) : null}}>
                      <label class="form-check-label">
                        E-mail
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" 
                      name="tipo" value="Aleatoria" {{($data ?? '') ? ($data -> tipo == 'Aleatoria' ? 'checked' : null) : null}}>
                      <label class="form-check-label">
                        Chave Aleatoria
                      </label>
                    </div>
              </fieldset>

              <div class="mb-3">
                  <label for="" class="form-label">Chave do recebedor:</label>
                  <input type="text" maxlength="200"
                  @isset($flash["_old_input"])
                    value="{{$flash['_old_input']['chave']}}"
                  @endisset
                  class="form-control" name="chave" >
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Valor:</label>
                <input type="text" maxlength="100"
                @isset($flash["_old_input"])
                  value="{{$flash['_old_input']['valor']}}"
                @endisset
                class="form-control" name="valor" >
              </div>

  
              <div class="mb-3" style="display: flex; justify-content: space-between;">
                  <a href="{{route('efipix.index')}}" style="width: 25%;" class="btn btn-danger">Sair</a>

                  <button type="submit" class="btn btn-success" name="btn_submit" style="width: 25%;" onclick="">Gerar</button>
              </div>
          </div>
      </form>
  </div>
</section>
@endsection
