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
                Employee Data
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Username:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $data->username }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $data->email }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Phone:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $data->phone }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Gender:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $data->gender }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
