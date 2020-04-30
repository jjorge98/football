@extends('layouts.template')
@section('content')

<table id="mytable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th class="center-align">Nome</th>
            <th class="center-align">Posição</th>
            <th class="center-align">Peso</th>
            <th class="center-align">Altura</th>
            <th class="center-align">Info Aluno</th>
            <th class="center-align">Info responsável</th>
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
                <a class="btn-floating btn-small waves-effect waves-light red" onclick="showInfo({{$student->idResponsavel}})"><i class="material-icons">info</i></a>
            </td>
            <td class="center-align">
                <a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">info</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop