@extends('layout.form')
@section('content')
    <section>
        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                    <h2 class="title" style="margin-bottom: 20px; display: flex;justify-content: center;">Foydalanuvchini o'zgartirish</h2>
                    <form class="account-form" action="{{ route('user.update',['id'=>$data->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="first_name">Ism<span>*</span></label>
                            <input type="text" placeholder="Ismgizni kiriting" id="first_name" required
                                name="first_name" value="{{$data->first_name}}">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Familiya<span>*</span></label>
                            <input type="text" placeholder="Familiyagizni kiriting" id="last_name" required
                                name="last_name" value="{{$data->last_name}}">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Tug'ilgan sana<span>*</span></label>
                            <input type="date" placeholder="Yoshingizni kiriting" id="birthday" required
                                name="birthday" value="{{$data->birthday}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email<span>*</span></label>
                            <input type="text" placeholder="Emailgizni kiriting" id="email" required name="email" value="{{$data->email}}">
                        </div>
                        <div class="form-group">
                            <label for="address">Manzil<span>*</span></label>
                            <input type="text" placeholder="Manzilgizni kiriting" id="address" required name="address" value="{{$data->address}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password<span>*</span></label>
                            <input type="password" placeholder="Passwordgizni kiriting" id="password" required
                                name="password">
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
