@extends('layouts.app')

@section('content')
<div class="center-align z-depth-4 card-panel horizontal small">
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <div class='input-field col s12 center'>
                <h4>Football</h4>
                <div style="height: 3px; background-color:#2c3a59;margin-bottom:50px;" class="divider"></div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <a href="{{ route('student') }}" id="routeFormStudent" class="btn waves-effect waves-light blue">Cadastro aluno</a>
                </div>
            </div>
            <div class="row margin">
                <a href="{{ route('login') }}" id="routeLogin" class="btn waves-effect waves-light blue">Área do instrutor</a>
            </div>
            <br><br>
        </div>
    </div>
</div>
@endsection