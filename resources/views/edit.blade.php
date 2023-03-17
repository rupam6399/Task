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
        <div class="card">
            <div class="card-header">
                Edit Employee Data
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('employee-data.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Username:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="username" value="{{ $data->username }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Email:</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ $data->email }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Phone:</label>
                        <div class="col-md-6">
                            <input type="tel" class="form-control" name="phone" value="{{ $data->phone }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Gender:</label>
                        <div class="col-md-6">
                            <select name="gender" class="form-control" required>
                                <option value="">--Select--</option>
                                <option value="Male" {{ $data->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $data->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ $data->gender == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>
