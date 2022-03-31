<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .px-5 {
            padding-left: 5px;
            padding-right: 5px;

        }

    </style>
</head>

<body>
    <table>
        <tr>
            <td>
                @foreach ($inventaris as $key => $data)
                    <table class="center" border="1" cellpadding="0" cellspacing="0">
                        <tr>
                            <th class="px-5">Nama Barang</th>
                            <td class="px-5">{{ $data->nama_barang }}</td>
                        </tr>
                        <tr>
                            <th class="px-5">Kode Barang</th>
                            <td class="px-5">{!! DNS1D::getBarcodeHTML($data->kode_barang, 'C39') !!}</td>
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
