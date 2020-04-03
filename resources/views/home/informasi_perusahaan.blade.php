@extends('home.layout')

@section('title', 'Informasi Perusahaan')

@section('content')


        <div class="about">
            <div class="about-top text-center">
                <h3 class="about-heading v-color1">{{$wo->nama_perusahaan}}</h3>
            </div>
            <div class="container">
                <div class="about-top-img text-center">
                    <div class="about-img">
                        <a href="" class="hover-images"><img src="{{Storage::url($wo->foto_profil)}}" alt=""></a>
                        <div class="about-title"><h3 class="v-color1">About <br>{{$wo->nama_perusahaan}}</h3></div>
                    </div>
                </div>
                <div class="about-content">
                    <h3 style="margin-left: 20px">Tentang {{$wo->nama_perusahaan}}</h3>

                    <div class="checkout-price">
                        <div class="checkout-item color-all">
                            <div>Deskripsi</div>
                            <div>{{$wo->tentang_perusahaan}}</div>
                        </div>
                        <div class="checkout-item color-all">
                            <div>Alamat</div>
                            <div>{{$wo->alamat}}</div>
                        </div>
                        <div class="checkout-item ">
                            <div>Nomor Telepon</div>
                            <div>{{$wo->nomor_telepon}}</div>
                        </div>
                        <div class="checkout-item color-all">
                            <div>Total</div>
                            <div>315.00 USD</div>
                        </div>
                    </div>
                </div>
                <div class="about-author text-center">
                    <div class="intro">
                        <h3 class="v-color1">Our Packages</h3>
                        <br>
                    </div>

                    <div class="collection-full">
                            <div class="row">
                            
                            @foreach($wo->paket as $paket)
                                <div class="range range-xs-center offset-top-45">
                                  <div class="cell-xs-8 cell-sm-5 cell-md-3">
                                    <div class="box-pricing">
                                      <div class="box-pricing-inner">
                                        <div class="box-pricing-label">
                                          <span>TOP RATED</span> </div>
                                        <p class="text-bold text-ubold text-uppercase text-gray-base text-big text-uppercase">{{$paket->nama_paket}}</p>
                                        <br>
                                        <div class="text-primary"><span><h3><sup>Rp</sup>{{$paket->harga}}</h3></span></div>
                                        <br>
                                        <div class="offset-top-8">
                                          <p class="text-extra-small text-silver-chalice">{{$paket->deskripsi}}</p>
                                        </div>
                                        <div class="offset-top-25">
                                          <hr class="hr bg-gallery">
                                        </div>
                                        <div class="offset-top-25 reveal-inline-block">
                                          <ul class="list list-12 list-marked-icon text-gray-base text-small text-left">
                                            @foreach($paket->item_pakets as $item)
                                            <li>{{$item->item->nama_item}}</li>
                                            @endforeach
                                          </ul>
                                        </div>
                                      </div>
                                      @if(auth()->guard('customer')->check())
                                      <div class="offset-top-4"><a href="/customer/tanggal/{{$paket->id}}" class="btn btn-block btn-primary">BOOK NOW</a></div>
                                      @else
                                      <div class="offset-top-4"><a onclick="login()" class="btn btn-block btn-primary">BOOK NOW</a></div>
                                      @endif
                                    </div>
                                  </div>
                                </div>
                            @endforeach

                            </div>
                    </div>
                </div>

                <div id="review" class="tab-pane fade in active " style="margin-top: 100px">
                    <div class="tab-review">
                        <h3 class="text-uppercase">( {{count($wo->reviews)}} ) REVIEW</h3>
                        @foreach($wo->reviews as $review)
                        <div class="author">
                            <div class="author-avt">
                                <img src="{{Storage::url($review->customer->foto_profil)}}" alt="">
                            </div>
                            <div class="author-cmt">
                                <span class="author-name text-uppercase">{{$review->customer->nama_lengkap}}</span>
                                <span class="post-date">/ {{$review->created_at}} </span>
                                <div class="rating-star">
                                    @if($review->bintang == 0)
                                    <i>0</i>
                                    @elseif($review->bintang > 0 && $review->bintang < 1)
                                        <i class="fa fa-star-half"></i>
                                    @elseif($review->bintang == 1)
                                        <i class="fa fa-star"></i>
                                    @elseif($review->bintang > 1 && $review->bintang <2)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                    @elseif($review->bintang == 2)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    @elseif($review->bintang > 2 && $review->bintang <3)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                    @elseif($review->bintang == 3)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    @elseif($review->bintang > 3 && $review->bintang <4)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                    @elseif($review->bintang == 4)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    @elseif($review->bintang > 4 && $review->bintang <5)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                    @elseif($review->bintang == 5)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    @endif
                                </div>
                                <p class="cmt">{{$review->komentar}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



      <!-- modal hapus -->
      <div class="modal fade" id="login">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Login Akses</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Anda Harus login untuk melakukan booking wedding organizer paket <br>
              Apakah anda ingin menuju halaman login ?</p>
              <br>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <a href="/login" target="_blank" class="btn btn-primary">Ya</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

        <script>
          function login(){
            $('#login').modal();
          }
        </script>
        

@endsection