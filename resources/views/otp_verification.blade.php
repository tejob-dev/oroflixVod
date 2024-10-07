@extends('layouts.theme')
@section('title','Enter OTP | ')
@section('main-wrapper')
    <div class="container">
        <h1>Enter OTP</h1>
        <form method="POST" action="{{ route('otp.verify') }}">
            @csrf
            <div class="form-group">
                <label for="otp">Enter OTP:</label>
                <input type="text" id="otp" name="otp" class="form-control" required>
            </div>
            <input type="hidden" name="phone_number" value="{{ $formattedPhoneNumber }}">
            <button type="submit" class="btn btn-primary">Verify OTP</button>
        </form>
    </div>
@endsection
