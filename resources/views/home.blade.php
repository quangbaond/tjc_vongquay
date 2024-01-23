<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body style="background-image: url('{{ asset('assets/images/home/bg.jpg') }}');">
    <div class="container">
        <div class="row justify-content-center align-seft-center" style="height: 100vh; align-items: center">
            <div class="col-md-8">
                <div class="card">
                    {{-- div card header --}}
                    <div class="card-header">
                        <h3 class="text-center">Danh sách sự kiện</h3>
                    </div>
                    {{-- end div card header --}}
                    {{-- div card body --}}
                    @if($events->count() == 0)
                    <p class="p-3">Không tìm thấy sự kiện nào</p>
                    @else
                    <div class="card-body">
                        {{-- div table --}}
                        <table class="table table-bordered table-hover table-striped">
                            {{-- table head --}}
                            <thead>
                                <tr>
                                    <th style="width: 50%">Tên sự kiện</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                <tr>
                                    <td>
                                        <a style="text-decoration: none;"
                                            href="{{ env('APP_URL') . '/' . $event->slug }}">
                                            {{ $event->name }}
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{-- end table body --}}
                        </table>
                        {{-- end div table --}}
                    </div>

                    <div class="card-footer">
                        {!! $events->withQueryString()->links('vendor.pagination.bootstrap-5') !!}
                    </div>
                    @endif
                    {{-- end div card body --}}
                </div>
            </div>
        </div>
    </div>
</body>

</html>