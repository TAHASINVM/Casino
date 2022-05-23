@extends('layout');
@section('completed_select','active')
@section('heading','Previous Events')
@section('title','Completed')


@section('container')
    <div class="row">
        @foreach ($completed as $item)
            <div class="col-6 d-flex my-3 shadow rounded mx-5">
                <div class="col-4">
                    <img src="https://media.istockphoto.com/vectors/winner-banner-win-congratulations-vintage-frame-golden-congratulating-vector-id1142641952?k=20&m=1142641952&s=612x612&w=0&h=IPjQ-5WJdhFIa9JaiIjdE77-CpXIF1OG5bBZ7OkM5Hk=" alt="" style="height: 100px">
                </div>
                <div class="col-8">
                    <h6>Number Of Players : {{ $item->players }}</h6>
                    <h6>Winning Slot : {{ $item->position }}</h6>
                    <h6>Winning Amount : {{ $item->winner_price }}</h6>
                    @if($item->name != null)
                        <h4>Winner : {{ $item->name }}</h4>
                    @else
                        <h4>No Winner</h4>
                    @endif
                </div>
            </div>
         @endforeach
    </div>

@endsection