<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        return view('studentRegister');
    }

    public function save(Request $request)
    {
        $dados = $request->data;

        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
        $b = array('a', 'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');

        /* retirar todos os acentos dos inputs */
        // colocar uppercase os requests para consultar e inserir no banco

        $data = array();

        if (DB::table('estado')->where('sigla', strtoupper($dados['parentUF']))->doesntExist()) {
            $data['resultado'] = 'ERROR';
            $data['title'] = 'Estado inválido!';
            $data['text'] = 'Por favor, verifique o campo \'estado\'!';
        } else {
            $CPF = preg_replace('/\D/', '', $dados['studentCPF']);

            if (DB::table('aluno')->where('cpfAluno', $CPF)->exists()) {
                $data['resultado'] = 'ERROR';
                $data['title'] = 'CPF do aluno já cadastrado!';
                $data['text'] = 'O CPF deste aluno já está cadastrado no sistema. Caso queira, entre em contato com a equipe para verificar o processo!';
            } else {
                $cidade = strtoupper(str_replace($a, $b, $dados['parentCity']));

                try {
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

                    $idEndereco = DB::table('endereco')->insertGetId(
                        [
                            'cep' => str_replace('/\D/', '', $dados['parentCEP']),
                            'bairro' => strtoupper(str_replace($a, $b, $dados['parentNeighbor'])),
                            'logradouro' => strtoupper(str_replace($a, $b, $dados['parentAddress'])),
                            'numero' => $dados['parentNumber'],
                            'complemento' => strtoupper(str_replace($a, $b, $dados['parentComplement'])),
                            'idCidade' => $idCidade
                        ]
                    );

                    $CPFRESP = preg_replace('/\D/', '', $dados['studentCPF']);

                    if (DB::table('responsavel')->where('cpfResp', $CPFRESP)->exists()) {
                        $idResponsavel = DB::table('responsavel')->select('idResponsavel')->where('cpfResp', $CPFRESP)->first()->idResponsavel;
                    } else {
                        $idResponsavel = DB::table('responsavel')->insertGetId(
                            [
                                'nomeResp' => strtoupper(str_replace($a, $b, $dados['parentName'])),
                                'cpfResp' => $CPFRESP,
                                'rgResp' => preg_replace('/\D/', '', $dados['parentRG']),
                                'dataNascimentoResp' => $dados['parentBirth'],
                                'telefoneResp' => preg_replace('/\D/', '', $dados['parentCel']),
                                'idEndereco' => $idEndereco
                            ]
                        );
                    }

                    DB::table('aluno')->insert(
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
                            'idResponsavel' => $idResponsavel
                        ]
                    );

                    $data['resultado'] = 'OK';
                } catch (\Exception $e) {
                    $data['resultado'] = 'ERROR';
                    $data['title'] = 'Erro no cadastro. Por favor, entre em contato com o administrador do sistema';
                    $data['error'] = $e;
                }
            }
        }

        return $data;
    }
}
