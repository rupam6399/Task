<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeData;

class EmployeeDataController extends Controller
{
    // public function index()
    // {
    //     $employeeData = EmployeeData::all();
    //     return view('index', compact('employeeData'));
    // }

    public function create()
    {
        return view('create');
    }
    public function show($id)
    {
        $data = EmployeeData::findOrFail($id);
        return view('show', compact('data'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => ' unique:employees,email',
            'phone' => 'required',
            'gender' => 'required',
        ]);

        $employeeData = new EmployeeData();
        $employeeData->username = $validatedData['username'];
        $employeeData->email = $validatedData['email'];
        $employeeData->phone = $validatedData['phone'];
        $employeeData->gender = $validatedData['gender'];
        $employeeData->save();

        return redirect()->route('PA-Index')->with('success', 'Employee Data Added successfully.');
    }

    public function edit($id)
    {
        $data = EmployeeData::findOrFail($id);
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = EmployeeData::findOrFail($id);
        $data->username = $request->input('username');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->gender = $request->input('gender');
        $data->save();

        return redirect()->route('PA-Index')->with('success', 'Employee Data updated successfully.');
    }

    public function destroy($id)
    {
        $data = EmployeeData::findOrFail($id);
        $data->delete();

        return redirect()->route('PA-Index')->with('success', 'Employee Data deleted successfully.');
    }

    // public function index(Request $request)
    // {
    //     $sort = $request->query('sort', 'id'); // default sort by id

    //     $employeeData = EmployeeData::orderBy($sort)->get();

    //     return view('index', compact('employeeData'));
    // }
    public function index(Request $request)
    {
        $emailSort = $request->query('email_sort', 'asc');
        $usernameSort = $request->query('username_sort', 'asc');

        // Check if the sort parameter is valid, if not use the default sort by id
        if (!in_array($emailSort, ['asc', 'desc']) || !in_array($usernameSort, ['asc', 'desc'])) {
            $emailSort = 'asc';
            $usernameSort = 'asc';
        }

        $employeeData = EmployeeData::orderBy('email', $emailSort)
            ->orderBy('username', $usernameSort)
            ->paginate(10);
        // dd($employeeData);

        return view('index', compact('employeeData', 'emailSort', 'usernameSort'));
    }



}
