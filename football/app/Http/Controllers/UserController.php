<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function deleteUser(Request $request)
    {
        try {
            DB::table('aluno')
                ->where('idAluno', $request->id)
                ->update([
                    'deleted_at' => Carbon::now()
                ]);

            $data['result'] = "OK";
        } catch (\Exception $e) {
            $data['result'] = 'ERROR';
            $data['title'] = 'Ocorreu um erro ao excluir aluno!';
            $data['text'] = 'Por favor tente novamente ou contate o adm do sistema!';
        }

        return $data;
    }

    public function editStudent(Request $request)
    {
        $response = DB::table('aluno as a')
            ->join('responsavel as r', 'a.idResponsavel', 'r.idResponsavel')
            ->join('endereco as e', 'e.idEndereco', 'r.idEndereco')
            ->join('cidade as c', 'c.idCidade', 'e.idCidade')
            ->join('estado as es', 'es.idEstado', 'c.idEstado')
            ->first();

        return view('editStudent', compact(['response']));
    }

    public function saveStudentData(Request $request)
    {
        $dados = $request->data;

        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
        $b = array('a', 'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');

        if (DB::table('estado')->where('sigla', strtoupper($dados['parentUF']))->doesntExist()) {
            $data['result'] = 'ERROR';
            $data['title'] = 'Estado inválido!';
            $data['text'] = 'Por favor, verifique o campo \'estado\'!';
        } else {
            $CPF = preg_replace('/\D/', '', $dados['studentCPF']);
            try {
                $CPFRESP = preg_replace('/\D/', '', $dados['studentCPF']);
                $cidade = strtoupper(str_replace($a, $b, $dados['parentCity']));

                if (DB::table('cidade')->where('nomeCidade', $cidade)->exists()) {
                    $idCidade = DB::table('cidade')->select('idCidade')->where('nomeCidade', $cidade)->first()->idCidade;
                } else {
                    $idCidade = DB::table('cidade')->insertGetId(
                        [
                            'nomeCidade' => $cidade,
                            'idEstado' => DB::table('estado')->select('idEstado')->where('sigla', strtoupper($dados['parentUF']))->first()->idEstado
                        ]
                    );
                }

                DB::table('endereco')
                    ->where('idEndereco', $dados['idAddress'])
                    ->update(
                        [
                            'cep' => str_replace('/\D/', '', $dados['parentCEP']),
                            'bairro' => strtoupper(str_replace($a, $b, $dados['parentNeighbor'])),
                            'logradouro' => strtoupper(str_replace($a, $b, $dados['parentAddress'])),
                            'numero' => $dados['parentNumber'],
                            'complemento' => strtoupper(str_replace($a, $b, $dados['parentComplement'])),
                            'idCidade' => $idCidade
                        ]
                    );

                DB::table('responsavel')
                    ->where('idResponsavel', $dados['idParent'])
                    ->update(
                        [
                            'nomeResp' => strtoupper(str_replace($a, $b, $dados['parentName'])),
                            'cpfResp' => $CPFRESP,
                            'rgResp' => preg_replace('/\D/', '', $dados['parentRG']),
                            'dataNascimentoResp' => $dados['parentBirth'],
                            'telefoneResp' => preg_replace('/\D/', '', $dados['parentCel']),
                            'idEndereco' => $dados['idAddress']
                        ]
                    );

                DB::table('aluno')
                    ->where('idAluno', $dados['idStudent'])
                    ->update(
                        [
                            'nomeAluno' => strtoupper(str_replace($a, $b, $dados['studentName'])),
                            'cpfAluno' => $CPF,
                            'rgAluno' => preg_replace('/\D/', '', $dados['studentRG']),
                            'dataNascimentoAluno' => $dados['studentBirth'],
                            'telefoneAluno' => preg_replace('/\D/', '', $dados['studentCel']),
                            'posicao' => strtoupper(str_replace($a, $b, $dados['studentPosition'])),
                            'peso' => $dados['studentWeight'],
                            'altura' => $dados['studentHeight'],
                            'escola' => strtoupper(str_replace($a, $b, $dados['studentSchool'])),
                            'sala' => strtoupper(str_replace($a, $b, $dados['studentClass'])),
                            'turno' => strtoupper(str_replace($a, $b, $dados['studentShift'])),
                            'idResponsavel' => $dados['idParent']
                        ]
                    );

                $data['result'] = 'OK';
            } catch (\Exception $e) {
                $data['result'] = 'ERROR';
                $data['title'] = 'Erro no cadastro. Por favor, entre em contato com o administrador do sistema';
                $data['error'] = $e;
            }
        }

        return $data;
    }
}
