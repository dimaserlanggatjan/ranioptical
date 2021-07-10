@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product Details
@endsection

@section('content')
    <!---Section-content-->
          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">#RaniOptical0892</h2>
                <p class="dashboard-subtitle">Transactions / Details</p>
              </div>
              <div class="dashboard-content" id="transactionDetails">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 col-md-4">
                            <img
                              src="/images/0288a.jpeg"
                              class="w-75 mb-3"
                              alt=""
                            />
                          </div>
                          <div class="col-12 col-md-8">
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="product-title">Nama Pelanggan</div>
                                <div class="product-subtitle">
                                  Dimas Erlangga
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Nama Produk</div>
                                <div class="product-subtitle">
                                  Kacamata Code 0288
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">
                                  Tanggal Transaksi
                                </div>
                                <div class="product-subtitle">10 Mei 2021</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">
                                  Status Pembayaran
                                </div>
                                <div class="product-subtitle text-danger">
                                  Tertunda
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">
                                  Total Pembayaran
                                </div>
                                <div class="product-subtitle">Rp. 300.000</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Telepon</div>
                                <div class="product-subtitle">
                                  0822 9337 4323
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 mt-4">
                            <h5>Informasi Pengiriman</h5>
                            <div class="col-12">
                              <div class="row">
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Alamat</div>
                                  <div class="product-subtitle">
                                    Jl. Maliaro No.99
                                  </div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Kecamatan</div>
                                  <div class="product-subtitle">
                                    Ternate Tengah
                                  </div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Kota</div>
                                  <div class="product-subtitle">Ternate</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Provinsi</div>
                                  <div class="product-subtitle">
                                    Maluku Utara
                                  </div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Kode Pos</div>
                                  <div class="product-subtitle">97711</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Negara</div>
                                  <div class="product-subtitle">Indonesia</div>
                                </div>
                                <div class="col-12 col-md-3">
                                  <div class="product-title">Status Pengiriman</div>
                                  <select
                                    name="status"
                                    id="status"
                                    class="form-control"
                                    v-model="status"
                                  >
                                    
                                    <option value="PENDING">Tertunda</option>
                                    <option value="SHIPPING">Pengiriman</option>
                                    <option value="SUCCESS">Berhasil</option>
                                  </select>
                                </div>
                                <template v-if="status == 'SHIPPING'">
                                  <div class="col-md-3">
                                    <div class="product-title">Input Resi</div>
                                    <input
                                      type="text"
                                      class="form-control"
                                      name="resi"
                                      v-model="resi"
                                    />
                                  </div>
                                  <div class="col-md-2">
                                    <button
                                      type="submit"
                                      class="btn btn-success btn-block mt-4"
                                    >
                                      Update Resi
                                    </button>
                                  </div>
                                </template>
                              </div>
                            </div>
                            <div class="row mt-4">
                              <div class="col-12 text-right">
                                <button
                                  type="submit"
                                  class="btn btn-success btn-lg mt-4"
                                >
                                  Save Now
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var transactionDetails = new Vue({
        el: "#transactionDetails",
        data: {
          status: "PENGIRIMAN",
          resi: "JNE20839149021029301231",
        },
      });
    </script>
@endpush