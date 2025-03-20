<?php

namespace App\Controllers;
use App\Models\TaskModel;
use App\Models\CompletedTaskModel;
use CodeIgniter\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $taskModel = new TaskModel();
        $tasks = $taskModel->where('user_id', session()->get('user_id'))->findAll();
        return view('tasks/index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks/create');
    }

    
    public function store()
{
    $taskModel = new TaskModel();
    $data = json_decode($this->request->getBody(), true);
    $data['user_id'] = session()->get('user_id');

    if ($taskModel->save($data)) {
        return $this->response->setJSON(['success' => true]);
       
    } else {
        return $this->response->setJSON(['success' => false]);
    }
}

public function edit($id)
{
    $taskModel = new TaskModel();
    $task = $taskModel->find($id);
    return view('tasks/edit', ['task' => $task]);
}



public function update($id)
{
    $taskModel = new TaskModel();
    $data = [
        'title' => $this->request->getPost('title'),
        'description' => $this->request->getPost('description'),
        'due_date' => $this->request->getPost('due_date'),
        
    ];
    $taskModel->update($id, $data);
    return redirect()->to('/dashboard');
}


public function delete($id)
{
    if ($this->request->isAJAX()) { 
        $taskModel = new TaskModel();

        
        $task = $taskModel->where('id', $id)->where('user_id', session()->get('user_id'))->first();

       
            $taskModel->delete($id);

            return $this->response->setJSON(['success' => true, 'message' => 'Task deleted successfully']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Task not found or unauthorized']);
        }
    }


    public function completedtasks()
    {
        $completedtask = new CompletedTaskModel();
        $data['completed_tasks'] = $completedtask->findAll();
        return view('tasks/completed_tasks', $data);
    }

}
