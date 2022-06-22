@extends('layout.form')
@section('content')
    <section>
        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                    <h2 class="title" style="margin-bottom: 20px; display: flex;justify-content: center;">To'lov qo'shish
                    </h2>
                    <form class="account-form" action="{{ route('home.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="user_id">Foydalanuvchi<span>*</span></label>
                            <select name="user_id" id="user_id" style="background: #001232; ">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->last_name }}{{ $user->first_name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="amount">Narxi<span>*</span></label>
                            <input type="number" placeholder="Ismgizni kiriting" id="amount" required name="amount">
                        </div>
                        <div class="form-group">
                            <label for="date">Sana<span>*</span></label>
                            <input type="date" placeholder="Familiyagizni kiriting" id="date" required
                                name="date">
                        </div>
                        <div class="form-group">
                            <label for="debit_cost">Foydalanuvchi<span>*</span></label>
                            <select name="debit_cost" id="debit_cost" style="background: #001232; ">
                                <option value="1">Kirim</option>
                                <option value="0">Chiqim</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pay_type">Foydalanuvchi<span>*</span></label>
                            <select name="pay_type" id="pay_type" style="background: #001232; ">
                                <option value="1">Naqd</option>
                                <option value="0">Plastik</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Sabab<span>*</span></label>
                            <input type="text" placeholder="Nima sababligi" id="description" required name="description">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Jo'natish">
                        </div>
                    </form>
                    {{-- <div class="option"><a href="sign-in.html">Login qilish</a> --}}
                </div>

            </div>
        </div>
    </section>
@endsection
