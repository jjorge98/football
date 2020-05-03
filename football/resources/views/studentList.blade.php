@extends('layouts.template')
@section('content')

<h5 class="center-align">Alunos</h5>
<div style="height: 3px; background-color:#2c3a59;margin-bottom:50px;" class="divider"></div>

<table id="studentsTable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th class="center-align">Nome</th>
            <th class="center-align">Posição</th>
            <th class="center-align">Peso</th>
            <th class="center-align">Altura</th>
            <th class="center-align">Info Aluno</th>
            <th class="center-align">Info responsável</th>
            <th class="center-align">Endereço</th>
            <th class="center-align">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td class="center-align">{{ $student->nomeAluno }}</td>
            <td class="center-align">{{ $student->posicao }}</td>
            <td class="center-align">{{ $student->peso }}</td>
            <td class="center-align">{{ $student->altura }}</td>
            <td class="center-align">
                <a class="btn-floating btn-small waves-effect waves-light green"
                    onclick="showInfo({{$student->idAluno}})"><i class="material-icons">info</i></a>
            </td>
            <td class="center-align">
                <a class="btn-floating btn-small waves-effect waves-light green"
                    onclick="showInfoParent({{$student->idResponsavel}})"><i class="material-icons">info</i></a>
            </td>
            <td class="center-align">
                <a class="btn-floating btn-small waves-effect waves-light green"
                    onclick="showInfoAddress({{$student->idResponsavel}})"><i class="material-icons">info</i></a>
            </td>
            <td>
                <a class="btn-floating btn-small waves-effect waves-light blue"
                    href="{{route('editStudent',['id' => $student->idAluno])}}"><i class="material-icons">edit</i></a>
                <a class="btn-floating btn-small waves-effect waves-light red"
                    onclick="deleteUser({{$student->idResponsavel}})"><i class="material-icons">close</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop