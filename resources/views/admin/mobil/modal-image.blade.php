                <div class="row">
                    <div class="col-6">
                        <label class="imagecheck mb-4">Gambar Produk 1
                          <figure class="imagecheck-figure">
                            <img src="{{ asset('image_produk/'.$produk->gambar_produk) }}" class="imagecheck-image" width="200" height="220">
                          </figure>
                        </label>
                    </div> 
                    <div class="col-6">
                        <label class="imagecheck mb-4">Gambar Produk 2
                          <figure class="imagecheck-figure">
                            <img src="{{ asset('image_produk/'.$produk->gambar_produk_2) }}" class="imagecheck-image" width="200" height="220">
                          </figure>
                        </label>
                    </div>
                    <div class="col-6">
                        <label class="imagecheck mb-4">Gambar Produk 3
                          <figure class="imagecheck-figure">
                            <img src="{{ asset('image_produk/'.$produk->gambar_produk_3) }}" class="imagecheck-image" width="200" height="220">
                          </figure>
                        </label>
                    </div>
                    <div class="col-6">
                        <label class="imagecheck mb-4">Gambar Produk 4
                          <figure class="imagecheck-figure">
                            <img src="{{ asset('image_produk/'.$produk->gambar_produk_4) }}" class="imagecheck-image" width="200" height="220">
                          </figure>
                        </label>
                    </div>
                    <div class="col-12">
                        <label>Deskripsi </label>
                        <textarea class="summernote-simple" style="margin-top: 0px; margin-bottom: 0px; height: 100px; width: 100%;">{{$produk  ->deskripsi}}</textarea>
                    </div>
                </div>  