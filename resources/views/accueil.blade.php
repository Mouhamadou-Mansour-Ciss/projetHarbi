@extends('layout.layout')

@section('content')
    <!-- Contenu spécifique de la page -->
    <!-- Par exemple, pour la page d'accueil -->
    <h1>Bienvenue sur Khar-bi !</h1>
    <p>Découvrez notre sélection de moutons de race.</p>
    <div class="content d-flex align-items-center justify-content-center">
        <div class="container rounded">
            <div class="h1 fw-bold text-center mt-2">Découvrez l'univers fascinant de Khar Bi</div>
            <div class="h3 text-center pt-2">votre destination en ligne pour l'achat de moutons de qualité directement 
                auprès des éleveurs</div>
            <div class="fs-5 text-center pb-3 mb-3">Plongez dans un marché animé virtuel où les éleveurs passionnés 
                présentent leurs précieuses bêtes, élevées avec soin et dévouement</div>
            <div class="rollers position-relative overflow-hidden">
                <div class="start-roller"></div>
                <div class="wrapper">
                    <div class="items-container roll-LL">
                        <div class="item">
                            <img src="{{ asset('assets/images/Ladum.jpg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img3.jpeg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img2.jpg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img1.jpg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img4.jpeg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img5.jpg')}}" alt="" class="company">
                        </div>
                    </div>
                    <div class="items-container roll-RL">
                        <div class="item">
                            <img src="{{ asset('assets/images/img6.jpeg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img7.jpeg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img8.jpeg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img9.jpeg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img10.jpeg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img11.jpeg')}}" alt="" class="company">
                        </div>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="items-container reverse-roll-LL">
                        <div class="item">
                            <img src="{{ asset('assets/images/img12.jpeg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img13.jpeg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img14.jpeg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img15.jpeg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img15.jpg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img16.jpg')}}" alt="" class="company">
                        </div>
                    </div>
                    <div class="items-container reverse-roll-RL">
                        <div class="item">
                            <img src="{{ asset('assets/images/img17.jpg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img18.jpeg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img23.jpg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/Ladoum.jpg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img24.jpg')}}" alt="" class="company">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img21.png')}}" alt="" class="company">
                        </div>
                    </div>
                </div>
                <div class="end-roller"></div>
            </div>
        </div>
    </div>
@endsection
