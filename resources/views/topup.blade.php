@extends('layouts.app')

<?php
$page = 'Top Up';
?>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header">Top Up</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4>BALANCE : <b>{{ $saldo->saldo }}</b></h4>

                        <form method="POST" action="{{ route('transaksi.create') }}">
                            @csrf
                            <div class="form-group mt-4">
                                <label>Amount</label>
                                <input type="number" name="jumlah" class="form-control" placeholder="Nominal Input">
                                <input type="hidden" name="type" value="1">
                            </div>
                            <button class="btn btn-primary mt-5" type="submit">Top Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
