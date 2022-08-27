<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi</title>
    <style>
        #header { position: relative; border-collapse: collapse; }
        #header img { width: 100%; }
        #header tr td h4 { font-size: 22px; margin: 0; padding: 0;  }
        #header tr td p { font-size: 18px; margin: 0; padding: 0;  }
        h3 { margin: 5px 0 15px 0; padding: 5px 0; border-top: 1px solid #000; border-bottom: 1px solid #000;  }
        #data { position: relative; border-collapse: collapse; border: 1px solid #000; }
        #data thead {background-color: bisque;  }
        #data thead tr th,#data tbody tr td { padding: 5px; text-align: center; color: #000; font-family: Arial; border: 1px solid #000;  }
        #data tbody tr td { text-align: left; }
        #data tbody tr td.right { text-align: right; }
    </style>
</head>
<body>
    <table id="header" width="100%">
        <tr>
            <td width="10%">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </td>
            <td width="90%">
                <h4>GATA COMPUTER</h4>
                <p>Jl Thamrin 35 A Kota Madiun</p>
            </td>
        </tr>
    </table>
    <h3>Laporan Data Transaksi</h3>
    <table id="data" width="100%">
        <thead>
            <tr>
                <th>Nota</th>
                <th>Tanggal</th>
                <th>Kasir</th>
                <th>Member</th>
                <th>Pajak</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rsTransaksi as $trans)
            <tr>
                <td>{{ $trans->nota }}</td>
                <td>{{ date("d-m-Y",strtotime($trans->tanggal)) }}</td>
                <td>{{ $trans->name }}</td>
                <td>{{ $trans->nm_member }}</td>
                <td class="right">{{ number_format($trans->ppn,"0",",",".") }}</td>
                <td class="right">{{ number_format($trans->gtotal-$trans->ppn,"0",",",".") }}</td>
            </tr>
            @php
                $pajak += $trans->ppn;
                $total += $trans->gtotal;
            @endphp
            @endforeach
            <tr>
                <td colspan="4"><strong>Grand Total</strong></td>
                <td class="right">{{ number_format($pajak,"0",",",".") }}</td>
                <td class="right">{{ number_format($total-$pajak,"0",",",".") }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>