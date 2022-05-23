@extends('layout');
@section('result_select','active')
@section('heading','Previous Results')
@section('title','Results')


@section('container')
    <table class="table shadow rounded">
        <thead class="bg-dark text-white">
            <tr>
                <th>Bet</th>
                <th>Slot</th>
                <th>Bet Amount</th>
                <th>Status</th>
                <th>Winning Amount</th>
            </tr>
        </thead>
        @foreach ($bets as $item)
            <tr>
                <th>{{ $item->name }}</th>
                <th>{{ $item->position }}</th>
                <th>{{ $item->amount }}</th>
                @if ($item->status > 0)
                    <th class="text-success">Winner</th>
                    <th>Rs {{ $item->winner_price }}</th>
                @else
                    <th class="text-danger">loss</th>
                    <th></th>
                @endif
            </tr>
        @endforeach
    </table>

@endsection