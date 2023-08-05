@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="row-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col" style="padding: 1%;">
                        <div style="background: #FFF;border-radius:20px;padding: 10px;text-align: center;">
                            <img src="{{ URL ('/images/PKU2.jpg') }}" width="100%" alt="AdminLTE Logo" style="border-radius:20px;">
                        </div>
                    </div>
                    <div class="col">
                            <p style="text-align: justify;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mangrove (Rhizophora)</b> Pohon besar, dengan akar tunjang yang menyolok dan bercabang-cabang. 
                            Tinggi total 4–30 m, dengan tinggi akar mencapai 0,5–2 m atau lebih di atas lumpur, dan diameter batang mencapai 50 cm. 
                            Bakau merupakan salah satu jenis pohon penyusun utama ekosistem hutan bakau.</p>
                            <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ekosistem pesisir yang sehat adalah elemen kunci dalam menjaga keseimbangan alam dan keanekaragaman hayati. 
                                Tanaman bakau memiliki peran penting dalam ekosistem ini. 
                                Mereka bertindak sebagai benteng alami yang melindungi wilayah pesisir dari erosi, banjir, dan badai. 
                                Selain itu, mereka juga menjadi tempat berlindung, berkembang biak, dan mencari makan bagi berbagai spesies makhluk 
                                hidup seperti ikan, burung, dan krustasea.</p>
                    </div>
                    <div class="col" style="text-align: center;">
                        <img src="{{ URL ('/images/bakao.jpg') }}" width="100%" alt="AdminLTE Logo"
                            style="border-radius:20px;">
                            <br>
                            <br>
                            <p><i>Mangrove (Rhizophora)</i></p>
                    </div>
        </div>
    </div>
</div>
@endsection
