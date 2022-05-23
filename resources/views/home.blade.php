@extends('layout')
@section('home_select','active')
@section('heading','Available Bets')
@section('title','Home')

@section('container')
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}  
        </div> 
    @endif
    <div class="row justify-content-center">
        @foreach ($result as $bet)
            @php
                $start_date = new DateTime($bet->created_at);
                $since_start = $start_date->diff(new DateTime());
            @endphp
            @if ($since_start->i > 2)
                <script>window.location="{{ url('stop/'.$bet->id) }}"</script>
            @endif
            
            <div class="col-3">
                <div class="card shadow m-0 p-0">
                    <img class="card-img-top w-100" src="https://media.istockphoto.com/photos/the-croupier-holds-a-roulette-ball-in-a-casino-in-his-hand-picture-id1158005632?k=20&m=1158005632&s=612x612&w=0&h=DeeyqQewMX_Y3ZUnUoYEu7HriAXGVkf7WBOjCQjqrSc=" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $bet->name }}</h5>
                        <p class="card-text">Players : {{ $bet->players }}</p>
                        <a href="{{ url('makeBet/'.$bet->id ) }}" class="btn btn-warning">Play</a>
                    </div>
                    <div class="countdown"></div>

                </div>
            </div>
        @endforeach
    </div>
@endsection




