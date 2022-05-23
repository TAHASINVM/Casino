@extends('layout');
@section('home_select','active')
@section('heading','Select One')

@section('container')
    <div>
        <h3>Please Select One Slot</h3>
        <div class="row flex-wrap justify-content-around mt-5 p-5">
            @foreach ($betPosition as $position)
                <button class="rounded-pill btn d-flex justify-content-center align-items-center bg-success text-white slot" data-id="{{ $position->id }}" style="width: 50px;height:50px;font-weight:bold">
                    {{ $position->position }}
                </button>
            @endforeach
        </div>
        <form action="{{ url('makeBetProcess') }}" id="make_bet_form" method="post" class="col-6 mx-auto">
            @csrf 
            <div class="form-group">
                <input name="bet_amount" type="text" class="form-control" placeholder="Enter amount">
                <input name="slot_id" type="hidden">
                <input name="bet_id" type="hidden" value="{{ $betId }}">
            </div>
            
            @if($errors->any())
                <div class="mb-2 text-danger">
                    {{ $errors->first() }}
                </div>
            @endif
           
            <div class="form-group">
                <input type="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function(){


            $('.slot').on('click',function(){
                $('#make_bet_form input[name=slot_id]').val($(this).data('id'));
                $('.slot').removeClass('bg-danger').addClass('bg-success');
                $(this).removeClass('bg-success').addClass('bg-danger');

            })




        })
    </script>

@endsection