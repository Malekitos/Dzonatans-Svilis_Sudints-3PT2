<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Group;

class TaskController extends Controller
{

    public function createGroup(Request $request)
    {
        Group::create([
            'name' => $request->groupName,
            'owner' => $request->groupOwner,
        ]);

        return response()->json('Group created successfully!');
    }



    public function storeTask(Request $request)
    {
        $taskData = $request->get('var1');
        $groupData = $request->get('var2');

        Task::create([
            'grupa' => $groupData['groupName'],
            'title' => $taskData['title'],
            'time' => $taskData['time'],
            'date' => $taskData['date'],
            'detail' => $taskData['detail'],
            'status' => $taskData['status'],

        ]);

        return response()->json('Task stored successfully!');
    }



    public function updateTask(Request $request, $id)
    {
        Task::where('id',$id)-> update([
            'title' => $request->title,
            'date' => $request->date,
            'time' => $request->time,
            'detail' => $request->detail,
        ]);

        return response()->json('Task updated successfully!');
    }

    public function completeTask(Request $request, $id)
    {
        Task::where('id',$id)-> update([
            'status' => 1,
        ]);

        return response()->json('Task updated successfully!');
    }

    public function getTasks()
    {
        return response()->json(Task::latest()->get());
    }

    public function getGroups()
    {
        return response()->json(Group::latest()->get());
    }

    public function removeTask($id){
        Task::where('id', $id)-> delete();
        return response()->json('Task deleted successfully!');
    }

    public function removeGroup($groupName){
        Group::where('name', $groupName)-> delete();
        Task::where('grupa', $groupName)-> delete();
        return response()->json('Group deleted successfully!');
    }
}
