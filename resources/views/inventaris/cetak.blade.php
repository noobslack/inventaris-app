<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <td>
                @foreach ($inventaris as $key => $data)
                    <table class="center" border="1" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Nama Barang</th>
                            <td>{{ $data->nama_barang }}</td>
                        </tr>
                        <tr>
                            <th>Kode Barang</th>
                            <td>{!! DNS1D::getBarcodeHTML($data->kode_barang, 'C39') !!}</td>
                        </tr>
                    </table>
                    <br>
                    @if ($key != 0)
                        @if (($key + 1) % 9 == 0)
            </td>
            <td>
                @endif
                @if (($key + 1) % 18 == 0)
            </td>
        </tr>
        <tr>
            <td>
                <div class="page-break"></div>
                @endif
                @endif
                @endforeach
            </td>
        </tr>
    </table>
</body>

</html>
