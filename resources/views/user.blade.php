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
                                            <a href="{{ route('user.create') }}" class="btn btn-primary">Qo'shish</a>
                                        </div>
                                        {{-- seach start --}}
                                        <form class="form-inline mr-auto" style="margin-left: 20px" action="{{route('user.index')}}" method="get">
                                            <div class="search-element">
                                                <input class="form-control" type="text" placeholder="Search"
                                                    aria-label="Search" data-width="200" name="search" value="{{$search}}">
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
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            Id
                                                        </th>
                                                        <th>FIO</th>
                                                        <th>Tug'ilgan sana</th>
                                                        <th>Email</th>
                                                        <th>Manzil</th>
                                                        <th>Amalar</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $item)
                                                        <tr>
                                                            <td>{{ $item->id }}</td>
                                                            <td>{{ $item->last_name }}{{ $item->first_name }}</td>
                                                            <td>{{ $item->birthday }}</td>
                                                            <td>{{ $item->email }}</td>
                                                            <td>{{ $item->address }}</td>
                                                            <td>
                                                                <form action="{{ route('user.edit', ['id' => $item->id]) }}"
                                                                    method="get" style="display: inline">
                                                                    <button type="submit"
                                                                        class="btn btn-success">O'zgartirish</button>
                                                                </form>

                                                                <form action="{{ route('user.destroy', ['id' => $item->id]) }}"
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
