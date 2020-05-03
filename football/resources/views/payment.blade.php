@extends('layouts.template')
@section('content')
<form id="formPayment" method="POST" action="{{ route('savePayment') }}">
    @csrf
    <div class="col s12">
        <select id="student" name="student">
            @foreach ($students as $student)
            <option value="{{ $student->idAluno }}">{{ $student->nomeAluno }}</option>
            @endforeach
        </select>
    </div>


    <div class="col s6">
        <select id="month" name="month">
            <option value="Jan">Jan</option>
            <option value="Fev">Fev</option>
            <option value="Mar">Mar</option>
            <option value="Abr">Abr</option>
            <option value="Mai">Mai</option>
            <option value="Jun">Jun</option>
            <option value="Jul">Jul</option>
            <option value="Ago">Ago</option>
            <option value="Set">Set</option>
            <option value="Out">Out</option>
            <option value="Nov">Nov</option>
            <option value="Dez">Dez</option>
        </select>
    </div>

    <div class="col s6">
        <select id="year" name="year">
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
        </select>
    </div>

    <div class="col s12">
        <button id="savePayment" class="btn waves-effect waves-light blue">Salvar</button>
    </div>

</form>
@endsection