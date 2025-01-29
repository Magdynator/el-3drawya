@extends('website.template.master')
@section('content')
<link rel="stylesheet" href="css/CSS1.css">
<div class="search-container">
    <h1>Search </h1>
    <input type="text" id="searchBox" placeholder="Search by person id" onkeyup="searchItems()">
    <ul id="itemList">
        @foreach($users as $user)
        @php
        $route = $user['gender'].'/'.$user['pin'];
        $url = route('portfolio.show', ['qrcode' => $route]);
        $qrcode = QrCode::size(70)->backgroundColor(255, 255, 255)
        ->color(70, 150, 200)->generate($url);
        $barcode = strval($user['pin']);
        @endphp
        <li>{{$user['personal_id']}} - <span>{{$qrcode}}</span> </br> </br>- <img
                src="data:image/png;base64, {{ DNS1D::getBarcodePNG(".$barcode ", 'c39','4') }} alt=" barcode" width ='200px' height = '30px' />
            </br> p- {{$barcode}}</li>
        </br>
        @endforeach

    </ul>
</div>

</div>
<script src="javascript/js.js"></script>

@endsection()