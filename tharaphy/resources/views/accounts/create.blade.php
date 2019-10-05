@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#000040; color:white;">{{ __('Account Create Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('accounts.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="address" name="address" value="{{ old('address') }}" placeholder="Address...">
                            </div>


                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('D.O.B') }}</label>
                            <div class="col-md-6">
                                <input id="dob" type="dob" name="dob" value="{{ old('dob') }}" placeholder="DD/MM/YYYY">
                            </div>

                            <label for="bank" class="col-md-4 col-form-label text-md-right">{{ __('Bank Account') }}</label>
                            <div class="col-md-6">
                                <input id="bank" type="bank" name="bank" value="{{ old('bank') }}" placeholder="1111 1111 1111 1111">
                            </div>

                            <label for="cvv" class="col-md-4 col-form-label text-md-right">{{ __('CVV') }}</label>
                            <div class="col-md-6">
                                <input id="cvv" type="cvv" name="cvv" value="{{ old('cvv') }}" placeholder="124">
                            </div>

                            <label for="exp" class="col-md-4 col-form-label text-md-right">{{ __('Expired') }}</label>
                            <div class="col-md-6">
                                <input id="exp" type="exp" name="exp" value="{{ old('exp') }}" placeholder="MM/YY">
                            </div>

                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <select name="role" id="role" class="form-control">
                                    <option value="Doctor"> I'm Doctor </option>
                                    <option value="User"> I'm User </option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color:#000040; color:white;">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
