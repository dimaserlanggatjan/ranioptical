@extends('layouts.dashboard')

@section('title')
    Account Settings
@endsection

@section('content')
   <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">Update yout current profile</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="">
                      <div class="card">
                        <div class="card-body">
                          <div class="row mb-2">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">Nama</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  aria-describedby="emailHelp"
                                  name="name"
                                  value="Dimas Erlangga"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  id="email"
                                  aria-describedby="emailHelp"
                                  name="email"
                                  value="orangsukses@gmail.com"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="alamat"
                                  aria-describedby="emailHelp"
                                  name="alamat"
                                  value="Jl. Maliaro No.99"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <select
                                  name="provinsi"
                                  id="provinsi"
                                  class="form-control"
                                >
                                  <option value="Maluku Utara">
                                    Maluku Utara
                                  </option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="kota">Kota</label>
                                <select
                                  name="kota"
                                  id="kota"
                                  class="form-control"
                                >
                                  <option value="Ternate">Ternate</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="postalCode">Kode Pos</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="kodepos"
                                  name="kodepos"
                                  value="97711"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="nomortelepon">Nomor Telepon</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="nomortelepon"
                                  name="nomortelepon"
                                  value="+62-822-1223-4345"
                                />
                              </div>
                            </div>
                          </div>
                          <div class="col text-right">
                            <button type="submit" class="btn btn-success px-5">
                              Save Now
                            </button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection