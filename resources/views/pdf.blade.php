<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style type="text/css">

        table.customer tr td:nth-child(1) {

            width: 200px;
            font-weight: bold;
            text-align: left;
        }


        .letters tr>th {

            border-bottom: 1px solid #555;
            text-align: left;
        }

        table.letters tr td:nth-child(1) { width: 50px; }
        table.letters tr td:nth-child(2) { width: 350px; }
        table.letters tr td:nth-child(3) { width: 100px; }
        table.letters tr td:nth-child(4) { width: 180px; }


        body {

            font-family: DejaVu Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
        }

    </style>
</head>
<body>


    <h3>Potwierdzenie przekazania korespondencji</h3>
    <h4>Dane Klienta:</h4>

    <table class="customer">

        <tr>
            <td>Nazwa</td>
            <td>{{$customer->name}}</td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td>{{$customer->email}}</td>
        </tr>
        <tr>
            <td>Telefon</td>
            <td>{{$customer->phone}}</td>
        </tr>

    </table>
    <br><br><hr><br>

    <table class="letters">
        <tr>
            <td><strong>id</strong></td>
            <td><strong>Nadawna</strong></td>
            <td><strong>Typ</strong></td>
            <td><strong>Otrzymano</strong></td>
        </tr>

        @foreach ($print as $item)
        <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['name']}}</td>
            <td>{{$item['type']}}</td>
            <td>{{$item['date']}}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>