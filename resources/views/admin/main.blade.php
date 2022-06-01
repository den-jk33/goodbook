<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }


        .pagination-area{
            margin-top: 25px;
            display: flex;
            justify-content: center;
        }
        .pagination-area .el{
            background-color: #7c7c7c;
            color: rgb(255 255 255);
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin: 0 5px;
        }

        .table{
            width: 100%;
            max-width: 100%;
            border-spacing: 0;
            text-align: left;
        }
        .table .t-body td {
            padding: 20px 20px;
            color: rgba(0, 0, 0, 0.78);
        }
        .table .t-title td {
            padding: 20px 20px;
            color: rgba(0, 0, 0, 0.78);
        }
        .table_radius td:first-child {
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }
        .table_radius td:last-child {
            border-bottom-right-radius: 8px;
            border-top-right-radius: 8px;
        }
        .table_stripe tr:nth-child(2n) {
            background: rgba(226, 226, 226, 0.19);
        }



        .full-height {
            height: 100vh;
        }

        .flex-center {
           /* align-items: center;*/
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            Activity
        </div>

        <div>
            @if(!empty($activities))
                <table class="table table_radius table_stripe">
                    <tr class="t-title">
                        <td>URL</td>
                        <td>Визитов</td>
                        <td>Последний визит</td>
                    </tr>
                    @foreach($activities as $log)
                        <tr class="t-body">
                            <td>{{ $log['url'] }}</td>
                            <td>{{ $log['url_count'] }}</td>
                            <td>{{ $log['visit_last'] }}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>

        <div>
            @if(!empty($activities_pagination))
                <div class="pagination-area">
                    @if(!empty($activities_pagination['prev_page_url']))
                        <a  class="el" href="?page={{ $activities_pagination['current_page']-1 }}">Предыдущая страница</a>
                    @endif
                        @if(!empty($activities_pagination['next_page_url']))
                            <a class="el" href="?page={{ $activities_pagination['current_page']+1 }}">Следующая страница</a>
                        @endif
                </div>
            @endif
        </div>

    </div>
</div>
</body>
</html>
