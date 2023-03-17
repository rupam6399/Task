<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Employee Data</h1>

        <a href="{{ route('create') }}" class="btn btn-primary my-2">Add Employee</a>



        <table id="employeeData" class="table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employeeData as $data)
                    <tr>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ ucfirst($data->gender) }}</td>
                        <td>
                            <a href="{{ route('employee-data.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('employee-data.destroy', $data->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                            </form>
                            <a href="{{ route('employee-data.show', [$data->id]) }}" class="btn btn-primary btn-sm">View</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $employeeData->links() }} --}}

        <form action="{{ route('PA-Index') }}" method="GET">
            <div class="row">
                <label for="email_sort" >Sort by Email:</label>
            <select name="email_sort" id="email_sort" class="form-control w-25 ml-3">
                <option value="asc" {{ Request::get('email_sort') == 'asc' ? 'selected' : '' }}>A-Z</option>
                <option value="desc" {{ Request::get('email_sort') == 'desc' ? 'selected' : '' }}>Z-A</option>
            </select>

            <label for="username_sort" class="ml-4">Sort by Username:</label>
            <select name="username_sort" id="username_sort" class="form-control w-25 ml-3">
                <option value="asc" {{ Request::get('username_sort') == 'asc' ? 'selected' : '' }}>A-Z</option>
                <option value="desc" {{ Request::get('username_sort') == 'desc' ? 'selected' : '' }}>Z-A</option>
            </select>

            <button type="submit" class="btn btn-primary mx-3">Sort</button>
            </div>
        </form>


    </div>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <script src="{{ asset('js/style.js') }}"></script>
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });

    </script>

</body>
</html>
