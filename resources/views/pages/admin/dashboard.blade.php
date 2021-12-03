@extends('layouts.admin')

@section('title')
    Store Dashboard
@endsection

@section('content')
    <!---Section-content-->
          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin Dashboard</h2>
                <p class="dashboard-subtitle">This is Rani Optical Administrator Panel!</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Pelanggan</div>
                        <div class="dashboard-card-subtitle">{{ $customer }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Pendapatan</div>
                        <div class="dashboard-card-subtitle">
                          Rp. {{ $revenue }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Transaksi</div>
                        <div class="dashboard-card-subtitle">{{ $transaction }}</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12 mt-2">
                    <h5 class="mb-3">Transaksi Terbaru</h5>
                    <a
                      class="card card-list d-block"
                      href="{{ route('dashboard-transaction') }}"
                    >
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img
                              src="/images/0288.jpeg" width="75px"
                              alt=""
                            />
                          </div>
                          <div class="col-md-4">Kacamta code 0288</div>
                          <div class="col-md-3">Dimas Erlangga</div>
                          <div class="col-md-3">10 Mei, 2021</div>
                          <div class="col-md-1 d-none d-md-block">
                            <img
                              src="/images/dashboard-arrow-right.svg"
                              alt=""
                            />
                          </div>
                        </div>
                      </div>
                    </a>
                    <a
                      class="card card-list d-block"
                      href="{{ route('dashboard-transaction') }}"
                    >
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img
                              src="/images/0544.jpeg" width="75px"
                              alt=""
                            />
                          </div>
                          <div class="col-md-4">Kacamata Code 0544</div>
                          <div class="col-md-3">Iqbal koko</div>
                          <div class="col-md-3">16 Mei, 2021</div>
                          <div class="col-md-1 d-none d-md-block">
                            <img
                              src="/images/dashboard-arrow-right.svg"
                              alt=""
                            />
                          </div>
                        </div>
                      </div>
                    </a>
                    <a
                      class="card card-list d-block"
                      href="{{ route('dashboard-transaction') }}"
                    >
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img
                              src="/images/0545.jpeg" width="75px"
                              alt=""
                            />
                          </div>
                          <div class="col-md-4">Kacamata Code 0545</div>
                          <div class="col-md-3">Yaya Hagya</div>
                          <div class="col-md-3">17 Mei, 2020</div>
                          <div class="col-md-1 d-none d-md-block">
                            <img
                              src="/images/dashboard-arrow-right.svg"
                              alt=""
                            />
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection