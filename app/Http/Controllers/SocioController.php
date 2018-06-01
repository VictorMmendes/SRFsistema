<?php

namespace App\Http\Controllers;

use Request;
use App\Mail;
use App\SocioModel;
use App\Mail\Mailing;

class SocioController extends Controller
{
    public function listar()
    {
        $socios = SocioModel::all();
        return view('main')->with('socios', $socios);
    }

    public function cadastrar()
    {
        $socio = new SocioModel();
        $socio->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
        $socio->email = mb_strtolower(Request::input('email'), 'UTF-8');
        $socio->save();

        return redirect()->action('SocioController@listar')->withInput();
    }

    public function enviarEmail()
    {
        // Arquivo Selecionado
        $arquivo = Request::file('arq_financas');
        // Nenhum Arquivo Selecionado
        if (empty($arquivo)) {
            $msg = "Selecione o ARQUIVO para Importação dos E-mails!";

            return view('messagebox')->with('tipo', 'alert alert-danger')
                    ->with('titulo', 'ENTRADA DE DADOS INVÁLIDA')
                    ->with('msg', $msg)
                    ->with('acao', "/");
        }
        // Efetua o Upload do Arquivo
        $path = $arquivo->store('uploads');

        // Efetua a Leitura do Arquivo
        $fp = fopen("../storage/app/".$path, "r");

        if ($fp != false)
        {
            // Array que receberá os dados do Arquivo
            $dados = array();
            $si = 0;
            $r = 0;
            $d = 0;
            $sf = 0;

            while(!feof($fp))
            {
                $linha = utf8_decode(fgets($fp));

                if(!empty($linha))
                {
                    $dados = explode("#", $linha);

                    if($dados[0] == "S")
                    {
                        $si += $dados[1];
                    } else if($dados[0] == "R"){
                        $r += $dados[1];
                    } else if($dados[0] == "D"){
                        $d += $dados[1];
                    }
                }
            }
        }

        $sf = $si - $d + $r;

        $checks = Request::input("checks");
        $titulo = "Sistema relatório Financeiro";
        $dados['si'] = $si;
        $dados['r'] = $r;
        $dados['d'] = $d;
        $dados['sf'] = $sf;
        foreach ($checks as $ck)
        {
            // Envia e-mail com a senha para os gênios importados do .txt
            $dados_mail = array();
            $email = mb_strtolower($ck, 'UTF-8');
            \Mail::to($email)->send( new Mailing("mailImport", $dados, $titulo) );
            sleep(1);
        }

        // Importação Finalizada com Sucesso
        $msg = "E-mails enviados com sucesso";

        return view('messagebox')->with('tipo', 'alert alert-success')
                ->with('titulo', 'RELATÓRIO MENSAL')
                ->with('msg', $msg)
                ->with('acao', "/");
    }
}
