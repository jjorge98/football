@extends('layouts.template')

@section('content')

<h5 class="center-align">Alunos</h5>
<div style="height: 3px; background-color:#2c3a59; margin-bottom:50px;" class="divider"></div>

<div class="col s12" style="margin-bottom:40px;">
    <div class="col s6">
        <select id="yearPayment" name="yearPayment">
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
        </select>
    </div>

    <div class="col s6">
        <button id="showYearPayment" class="btn waves-effect waves-light blue">Pesquisar</button>
    </div>
</div>


{{-- style="display:none" --}}
<div id="divHiddenTable" class="col s12">
    <table id="paymentTable" class="table table-striped table-bordered" style="width:100%;">
        <thead>
            <tr>
                <th class="center-align">Aluno</th>
                <th class="center-align">Jan</th>
                <th class="center-align">Fev</th>
                <th class="center-align">Mar</th>
                <th class="center-align">Abr</th>
                <th class="center-align">Mai</th>
                <th class="center-align">Jun</th>
                <th class="center-align">Jul</th>
                <th class="center-align">Ago</th>
                <th class="center-align">Set</th>
                <th class="center-align">Out</th>
                <th class="center-align">Nov</th>
                <th class="center-align">Dez</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>
@endsection