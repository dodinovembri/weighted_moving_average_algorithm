    <tr style="text-align:center">
        <th colspan="2"><b>Sales Transaction</b></th>
    </tr>
    <table border="1">
        <thead>    
            <tr>
                <th style="background-color: #FFFF00;"><strong>TANGGAL</strong></th>
                <th style="background-color: #FFFF00;"><strong>TOTAL</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $key => $value)
            <tr>
                <td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
                <td>{{ $value->total }}</td>
            </tr>
            @endforeach  
        </tbody>
    </table>