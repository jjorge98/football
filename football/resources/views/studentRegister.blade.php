@extends("layouts.app")

@section("content")
<h5>Aluno</h5>
<div style="height: 3px; background-color:#2c3a59; margin-bottom:20px;" class="divider"></div>

<form id="registerStudent">
    @csrf
    <div class="input-field col s8">
        <i class="material-icons prefix" style="color:#2c3a59">create</i>
        <label for="studentName">Nome completo</label>
        <input type="text" id="studentName" name="studentName" value="" required />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">date_range</i>
        <label for="studentBirth">Data de nascimento</label>
        <input type="text" id="studentBirth" class="birth" name="studentBirth" value="" required />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">settings_ethernet</i>
        <label for="studentRG">RG</label>
        <input type="text" id="studentRG" name="studentRG" value="" />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">settings_ethernet</i>
        <label for="studentCPF">CPF</label>
        <input class="CPF" type="text" id="studentCPF" name="studentCPF" value="" />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">directions_run</i>
        <label for="studentPosition">Posição</label>
        <input type="text" id="studentPosition" name="studentPosition" value="" required />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">accessibility</i>
        <label for="studentWeight">Peso</label>
        <input type="text" id="studentWeight" name="studentWeight" value="" required />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">accessibility</i>
        <label for="studentHeight">Altura</label>
        <input type="text" id="studentHeight" class="height" name="studentHeight" value="" required />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">phone_android</i>
        <label for="studentCel">Telefone</label>
        <input class="CEL" type="text" id="studentCel" name="studentCel" value="" />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">domain</i>
        <label for="studentSchool">Escola</label>
        <input type="text" id="studentSchool" name="studentSchool" value="" required />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">school</i>
        <label for="studentClass">Sala</label>
        <input type="text" id="studentClass" name="studentClass" value="" required />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">today</i>
        <label for="studentShift">Turno</label>
        <input type="text" id="studentShift" name="studentShift" value="" required />
    </div>

    <div class="col s12">
        <h5>Responsável</h5>
        <div style="height: 3px; background-color:#2c3a59; margin-bottom:20px;" class="divider"></div>
    </div>

    <div class="input-field col s8">
        <i class="material-icons prefix" style="color:#2c3a59">create</i>
        <label for="parentName">Nome completo</label>
        <input type="text" id="parentName" name="parentName" value="" required />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">date_range</i>
        <label for="parentBirth">Data de nascimento</label>
        <input type="text" id="parentBirth" class="birth" name="parentBirth" value="" required />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">settings_ethernet</i>
        <label for="parentRG">RG</label>
        <input type="text" id="parentRG" name="parentRG" value="" required />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">settings_ethernet</i>
        <label for="parentCPF">CPF</label>
        <input class="CPF" type="text" id="parentCPF" name="parentCPF" value="" required />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">phone_android</i>
        <label for="parentCel">Telefone</label>
        <input class="CEL" type="text" id="parentCel" name="parentCel" value="" required />
    </div>

    <div class="input-field col s2">
        <i class="material-icons prefix" style="color:#2c3a59">edit_location</i>
        <label for="parentCEP">CEP</label>
        <input class="CEP" type="text" id="parentCEP" name="parentCEP" value="" required />
    </div>

    <div class="input-field col s2">
        <i class="material-icons prefix" style="color:#2c3a59">location_searching</i>
        <label for="parentUF">UF</label>
        <input type="text" id="parentUF" name="parentUF" value="" required />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">my_location</i>
        <label for="parentCity">Cidade</label>
        <input type="text" id="parentCity" name="parentCity" value="" required />
    </div>

    <div class="input-field col s4">
        <i class="material-icons prefix" style="color:#2c3a59">location_city</i>
        <label for="parentNeighbor">Bairro</label>
        <input type="text" id="parentNeighbor" name="parentNeighbor" value="" required />
    </div>

    <div class="input-field col s10">
        <i class="material-icons prefix" style="color:#2c3a59">home</i>
        <label for="parentAddress">Endereço</label>
        <input type="text" id="parentAddress" name="parentAddress" value="" required />
    </div>

    <div class="input-field col s2">
        <i class="material-icons prefix" style="color:#2c3a59">confirmation_number</i>
        <label for="parentNumber">Número</label>
        <input type="text" id="parentNumber" name="parentNumber" value="" required />
    </div>

    <div class="input-field col s12">
        <i class="material-icons prefix" style="color:#2c3a59">location_on</i>
        <label for="parentComplement">Complemento</label>
        <input type="text" id="parentComplement" name="parentComplement" value="" />
    </div>
</form>

<button id="registerStudentButton" class="btn waves-effect waves-light blue">Cadastrar</button>
@stop