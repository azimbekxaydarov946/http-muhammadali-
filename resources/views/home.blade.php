@extends('layout.base')
@section('content')
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                    </ul>
                </div>
                <h4>By Ahmadonov Muhammadali</h4>

            </nav>


            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ route('home') }}"> <img alt="image" src="{{ asset('assets/images/logo.png') }}"
                                style="width: 220px;height: 200px; margin-bottom: 5px" />

                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Sahifalar</li>
                        <li class="dropdown active ">
                            <a href="{{ route('user.index') }}" class="nav-link " style="background-color: #353c48;"><i
                                    class="fa fa-user"><span style="margin-left: 20px">Foydaanuvchi</span></i></a>
                        </li>

                    </ul>
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div style="display: flex; justify-content: space-between">
                                            <a href="{{ route('home.create') }}" class="btn btn-primary">Qo'shish</a>
                                        </div>
                                        {{-- seach start --}}
                                        <form class="form-inline mr-auto" style="margin-left: 20px"
                                            action="{{ route('home') }}" method="get">
                                            <div class="search-element">
                                                {{-- <input class="form-control" type="date" placeholder="Search" data-width="150" name="search"> --}}

                                                <select name="debit_cost" id="" class="form-control"
                                                    data-width="100">
                                                    <option value="" isset($debit_cost) ? 'selected' : '' }}>
                                                        Foyda</option>
                                                    <option value="1"
                                                        {{ isset($debit_cost) ? ($debit_cost == 1 ? 'selected' : '') : '' }}>
                                                        Kirim
                                                    </option>
                                                    <option value="0"
                                                        {{ isset($debit_cost) ? ($debit_cost == 0 ? 'selected' : '') : '' }}>
                                                        Chiqim
                                                    </option>
                                                </select>
                                                <select name="pay_type" id="" class="form-control"
                                                    data-width="110">
                                                    <option value="" isset($pay_type) ? 'selected' : '' }}>Barchasi</option>
                                                    <option value="1" {{ isset($pay_type) ? ($pay_type == 1 ? 'selected' : '') : '' }}> Naqd </option>
                                                    <option value="0" {{ isset($pay_type) ? ($pay_type == 0 ? 'selected' : '') : '' }}> Plastik </option>
                                                </select>
                                                <button class="btn" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                        {{-- seach end --}}
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead align="center">
                                                    <tr>
                                                        <th class="text-center">
                                                            Id
                                                        </th>
                                                        <th>FIO</th>
                                                        <th>To'lov</th>
                                                        <th>Sana</th>
                                                        <th>To'lov turi</th>
                                                        <th>Kirim Chiqim</th>
                                                        <th>Sabab</th>
                                                        <th>Amalar</th>

                                                    </tr>
                                                </thead>
                                                <tbody align="center">
                                                    @php
                                                        $kirim = 0;
                                                        $chiqim = 0;

                                                    @endphp
                                                    @foreach ($data as $item)
                                                        @php

                                                            if ($debit_cost == 'null') {
                                                                if ($item->debit_cost == 0) {
                                                                    $chiqim = $chiqim + $item->amount;
                                                                } elseif ($item->debit_cost == 1) {
                                                                    $kirim += $item->amount;
                                                                }
                                                            } else {
                                                                if ($item->debit_cost == 0) {
                                                                    $chiqim = $chiqim + $item->amount;
                                                                } elseif ($item->debit_cost == 1) {
                                                                    $kirim += $item->amount;
                                                                }
                                                                $sum[] = $item->amount;
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>
                                                                {{ $item->id }}
                                                            </td>
                                                            <td>{{ $item->user->last_name }}
                                                                {{ $item->user->last_name }}
                                                            </td>
                                                            <td class="align-middle">{{ Number_format($item->amount) }}
                                                                So'm
                                                            </td>
                                                            <td>{{ $item->date }}</td>
                                                            <td>
                                                                <div
                                                                    class="badge badge-{{ $item->pay_type == 1 ? 'success' : 'danger' }}badge-shadow">
                                                                    {{ $item->pay_type == 1 ? 'Naqd' : 'Plastik' }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    class="badge badge-{{ $item->debit_cost == 1 ? 'success' : 'danger' }}badge-shadow">
                                                                    {{ $item->debit_cost == 1 ? 'Kirim' : 'Chiqim' }}
                                                                </div>
                                                            </td>
                                                            <td>{{ $item->description }}</td>
                                                            <td>
                                                                <form
                                                                    action="{{ route('home.edit', ['id' => $item->id]) }}"
                                                                    method="get" style="display: inline">
                                                                    <button type="submit"
                                                                        class="btn btn-success">O'zgartirish</button>
                                                                </form>

                                                                <form
                                                                    action="{{ route('home.destroy', ['id' => $item->id]) }}"
                                                                    method="post" style="display: inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger">O'chrish</button>
                                                                </form>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div style="width: 200px">
                                                <h4> Jami:
                                                    {{ isset($debit_cost) ? ($debit_cost == 'null' ? number_format($kirim - $chiqim) : (isset($sum) ? ($sum ? number_format(array_sum($sum)) : '0') : '0')) : number_format($kirim - $chiqim) }}

                                                    so'm
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </section>
            </div>

        </div>
    </div>
@endsection
