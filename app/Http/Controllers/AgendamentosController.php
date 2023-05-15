<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamentos;

class AgendamentosController extends Controller
{
    // Método post para validar e enviar os dados
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Variável para armazenar os dados enviados pelos campos
            'nome' => 'required|max:255',
            'telefone' => 'required|max:20',
            'origem' => 'required|max:255',
            'contato' => 'required|max:255',
            'observacao' => 'required|max:255',
        ]);

            // Enviando os dados para o banco de dados
            $agendamento = new Agendamentos();
            $agendamento->nome = $request->nome;
            $agendamento->telefone = $request->telefone;
            $agendamento->origem = $request->origem;
            $agendamento->data_contato = $request->contato;
            $agendamento->observacao = $request->observacao;
            $agendamento->save();

            // Retornando para o formulário de cadastro
        return redirect()->route('index')
            ->with('success', 'Agendamento criado com sucesso!');
    }

    // Método get para mostrar os dados na tabela
    public function show(){

        // Recupera todos os agendamentos do banco de dados
        $tableagenda = Agendamentos::all();
        
        // Retorna a view 'consultar' com os agendamentos recuperados
        return view('consulta', ['agendamentos' => $tableagenda]);
    }
    // Método delete para deletar os dados da tabela
    public function destroy($id)
    {
        // Encontra os dados na tabela e manda para um método que deleta os dados
        Agendamentos::find($id)->delete();

        // Retorna a view 'consultar' com os dados apagados
        return redirect('consulta');
    }

    // Método edit para enviar os dados para um arquivo chamado "editar", para fazer alteração.
    public function edit($id)
    {
        // Encontra os dados da tabela e manda para um método que preenche os inputs com os mesmos dados
        $agendamento = Agendamentos::find($id);

        // Retorna os dados para a view chamada "editar"
        return view('editar', ['agendamento' => $agendamento]);
    }

    // Método update para atualizar os dados dentro do banco do arquivo "editar" que foram alterados.
    public function update(Request $request)
    {
        // Encontra os dados da tabela e manda para um método que atualiza os possíveis novos dados digitados.
        Agendamentos::findOrFail($request->id)->update($request->all());

        // Retorna os dados atualizados para a view de "consulta"
        return redirect('consulta');
    }
}
