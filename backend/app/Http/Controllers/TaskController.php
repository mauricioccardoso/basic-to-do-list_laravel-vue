<?php

namespace App\Http\Controllers;

use App\Helpers\Logger;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index()
    {
        try{
            $tasks = Task::orderBy('name')->get();
            return response()->json($tasks);

        } catch (Exception $e) {
            $error = 'Não foi possível carregar a lista de Tarefas';
            Logger::log($e, $error);
            return response()->json(['errors' => $error], 500);

        }
    }

    public function store(TaskRequest $request)
    {
        DB::beginTransaction();
        try{
            $task = Task::create($request->all());
            DB::commit();
            return response()->json(['task' => $task], 201);

        } catch (Exception $e) {
            DB::rollBack();
            $error = 'Não foi possível criar uma nova Tarefa';
            Logger::log($e, $error);
            return response()->json(['errors' => $error], 500);

        }
    }

    public function update(TaskRequest $request, Task $task)
    {
        DB::beginTransaction();
        try{
            $task->update($request->all());
            DB::commit();
            return response()->json(null, 204);

        } catch (Exception $e) {
            DB::rollBack();
            $error = 'Não foi possível atualizar a Tarefa selecionada';
            Logger::log($e, $error);
            return response()->json(['errors' => $error], 500);

        }

    }

    public function destroy(Task $task)
    {
        DB::beginTransaction();
        try{
            $task->delete();
            DB::commit();
            return response()->json(null, 204);

        } catch (Exception $e) {
            DB::rollBack();
            $error = 'Não foi possível excluir a Tarefa selecionada';
            Logger::log($e, $error);
            return response()->json(['errors' => $error], 500);

        }

    }
}
