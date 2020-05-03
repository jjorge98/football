<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function register()
    {
        return view('studentRegisterAdm');
    }

    public function studentList()
    {
        $students = DB::table('aluno')
            ->get();

        return view('studentList', compact(['students']));
    }

    public function studentInfo(Request $request)
    {
        $student = DB::table('aluno')
            ->where('idAluno', $request->id)
            ->first();
        $data['result'] = "OK";
        $data['student'] = $student;

        return $data;
    }

    public function parentInfo(Request $request)
    {
        $parent = DB::table('responsavel')
            ->where('idResponsavel', $request->id)
            ->first();

        $data['result'] = "OK";
        $data['parent'] = $parent;

        return $data;
    }

    public function addressInfo(Request $request)
    {
        $idEndereco = DB::table('responsavel')
            ->select('idEndereco')
            ->where('idResponsavel', $request->id)
            ->first()->idEndereco;
        $address = DB::table('endereco as e')
            ->join('cidade as c', 'e.idCidade', 'c.idCidade')
            ->join('estado as es', 'es.idEstado', 'c.idEstado')
            ->where('e.idEndereco', $idEndereco)
            ->first();

        $data['result'] = "OK";
        $data['address'] = $address;

        return $data;
    }

    public function paymentRegister()
    {
        $paymentData = DB::table('pagamento as p')
            ->join('aluno as a', 'a.idAluno', 'p.idAluno')
            ->get();

        // dd($paymentData);
        return view('paymentRegister', compact(['paymentData']));
    }

    public function payment()
    {
        $students = DB::table('aluno')
            ->select('nomeAluno', 'idAluno')
            ->get();

        return view('payment', compact(['students']));
    }

    public function savePayment(Request $request)
    {

        DB::table('pagamento')
            ->updateOrInsert([
                'mes' => $request->month,
                'ano' => $request->year,
                'idAluno' => $request->student
            ]);

        return redirect()->route('payment');
    }

    public function yearPayment(Request $request)
    {
        $studentsData = DB::table('aluno')
            ->select('idAluno', 'nomeAluno')
            ->orderBy('nomeAluno', 'asc')
            ->get();

        $payments = DB::table('pagamento as p')
            ->where('p.ano', $request->year)
            ->get();

        $result = array();

        foreach ($studentsData as $studentD) {
            $student = array();
            $student['name'] = $studentD->nomeAluno;
            $student['id'] = $studentD->idAluno;
            $student['months'] = array();
            foreach ($payments as $payment) {
                if ($payment->idAluno == $studentD->idAluno) {
                    array_push($student['months'], $payment->mes);
                }
            }

            array_push($result, $student);
        }

        $data['result'] = 'OK';
        $data['students'] = $result;

        return $data;
    }
}

//Ver a questão do hórário
