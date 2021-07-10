@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
     <!-- Page Content -->
    <div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Cart
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table
                class="table table-borderless table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama &amp; Penjual</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Menu</th>
                  </tr>
                </thead>
                <tbody>
                  @php $totalPrice = 0 @endphp
                  @foreach ($carts as $cart)  
                  <tr>
                    <td style="width: 20%">
                      @if ($cart->product->galleries)
                      <img 
                      src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                      alt=""
                      class="cart-image"
                      />
                      @endif
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">{{ $cart->product->name }}</div>
                      <div class="product-subtitle">by {{ $cart->product->user->name }}</div>
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">IDR {{ number_format($cart->product->price) }}</div>
                    </td>
                    <td style="width: 20%">
                      <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-remove-cart"> Hapus </button>
                      </form>
                    </td>
                  </tr>  
                  @php $totalPrice += $cart->product->price @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Detail Pengiriman</h2>
            </div>
          </div>
          
          <form action="{{ route('cek_ongkir') }}" id = "locations" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-5">
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
            
            
            <div class="col-md-5">
              <div class="form-group">
                <label for="">Provinsi</label>
                <select name="province_destination" class="form-control">
                  <option value="">--PILIH PROVINSI--</option>
                  @foreach ($provinces as $prov => $value)
                  <option value="{{ $prov }}">{{ $value }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="">Kota</label>
                <select name="city_destination" class="form-control">
                  <option>--PILIH KABUPATEN/KOTA--</option>
                </select>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="">Kurir</label>
                <select name="courier" class="form-control">
                <option>--PILIH KURIR--</option>
                @foreach ($couriers as $courier => $value)
                  
                  <option value="{{ $courier }}">{{ $value }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="zip_code">Kode Pos</label>
                <input
                  type="text"
                  class="form-control"
                  id="kodepos"
                  name="kodepos"
                  value="97711"
                />
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="country">Negara</label>
                <input
                  type="text"
                  class="form-control"
                  id="country"
                  name="country"
                  value="Indonesia"
                />
              </div>
            </div>

            <div class="col-md-5">
              <div class="form-group">
                <label for="phone_number">Nomor Telepon</label>
                <input
                  type="text"
                  class="form-control"
                  id="phone_number"
                  name="phone_number"
                  value="+62-822-1223-4345"
                />
              </div>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
          
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2>Jasa Ongkir</h2>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="200">
          
          @foreach($result as $rslt)
            <div class="col-4 col-md-2">
              <div class="product-title">{{ $courier }}</div>
              <div class="product-subtitle">Jasa Pengiriman</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title">IDR {{ number_format($rslt['biaya'] ?? 0) }}</div>
              <div class="product-subtitle">Biaya Ongkir</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title">{{ $rslt['etd'] }}</div>
              <div class="product-subtitle">Estimasi Pengiriman</div>
            </div>
            <div class="col-4 col-md-3">
              <div class="product-title text-success">{{ $rslt['description'] }}</div>
              <div class="product-subtitle">Service</div>
            </div>
            @php $totalPrice += $rslt['biaya'] @endphp
            @endforeach
            <div class="col-8 col-md-3">
            
            <button
                type="submit"
                class="btn btn-success mt-4 px-4 btn-block"
              >
                Cek Ongkir
              </button>
              </form>
            </div>
            
          </div>
          
          <form action="{{ route('checkout') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="total_price" value="{{ $totalPrice }}">
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2>Detail Pembayaran</h2>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-4 col-md-2">
              <div class="product-title">0</div>
              <div class="product-subtitle">Quantity</div>
            </div>
            <div class="col-4 col-md-3">
              <div class="product-title">IDR 0</div>
              <div class="product-subtitle">Asurasni Produk</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title">IDR {{ number_format($rslt['biaya'] ?? 0) }}</div>
              <div class="product-subtitle">Ongkos Kirim</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title text-success">IDR {{ number_format($totalPrice ?? 0) }}</div>
              <div class="product-subtitle">Total</div>
            </div>
            <div class="col-8 col-md-3">
            
                        <button type="submit" class="btn btn-success mt-4 px-4 btn-block"> Checkout Now </button>
                     </form>
            
            </div>
          </div>
          
        </div>
      </section>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
        $('select[name="province_destination"]').on('change', function(){
          let provinceId = $(this).val();
          if(provinceId) {
            jQuery.ajax({
              url: '/province/'+provinceId+'/cities',
              type: "GET",
              dataType: "json",
              success:function(data){
                $('select[name="city_destination"]').empty();
                $.each(data, function(key, value){
                  $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                });
              },
            });
          }else {
            $('select[name="city_destination"]').empty();
          }
        });
            $('select[name="city_destination"]').on('change', function()
                {
                    let city_id = $(this).val();
                    if(city_id) {
            jQuery.ajax({
              url: 'district/' + city_id,
              type: "GET",
              dataType: "json",
              success:function(data){
                $('select[name="district"]').empty();
                $.each(data, function(key, value){
                  $('select[name="district"]').append('<option value="' + key + '">' + value + '</option>');
                });
              },
            });
          }else {
            $('select[name="district"]').empty();
          }
      });
  });
    
    
    </script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          AOS.init();
          this.getProvincesData();
        },
        data: {
          provinces: null,
          regencies: null,
          districts: null,
          provinces_id: null,
          regencies_id: null,
          districts_id: null,
        },
        methods: {
          getProvincesData() {
            var self = this;
            axios.get('{{ route('api-provinces') }}')
              .then(function (response) {
                  self.provinces = response.data;
              })
          },
          getRegenciesData() {
            var self = this;
            axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
              .then(function (response) {
                  self.regencies = response.data;
              })
          },
          getDistrictsData() {
            var self = this;
            axios.get('{{ url('api/districts') }}/' + self.regencies_id)
              .then(function (response) {
                  self.districts = response.data;
              })
          },
        },
        watch: {
          provinces_id: function (val, oldVal) {
            this.regencies_id = null;
            this.getRegenciesData();
          },
           regencies_id: function (val, oldVal) {
            this.districts_id = null;
            this.getDistrictsData();
          },
        }
      });
    </script>
@endpush