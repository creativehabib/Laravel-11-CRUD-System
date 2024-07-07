<div class="row">
    <div class="col-md-8">
        <div class="form-group mb-3">
            <label class="form-label" for="post_title">Post Title:</label>
            <input
                type="text"
                name="post_title"
                id="post_title"
                value="{{ old('post_title', $post->post_title ?? '') }}"
                class="form-control @error('post_title') is-invalid @enderror"
                placeholder="Ex. post name"
                aria-describedby="nameHelpBlock">
                @error('post_title')
                    <div class="form-text text-danger" id="nameHelpBlock">{{ $message }}</div>
                @enderror
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="post_slug">Post Slug:</label>
            <input
                type="text"
                name="post_slug"
                id="post_slug"
                value="{{ old('post_slug', $post->post_slug ?? '') }}"
                class="form-control @error('post_slug') is-invalid @enderror"
                placeholder="Ex. post slug"
                aria-describedby="slugHelpBlock">
                @error('post_slug')
                    <div class="form-text text-danger" id="slugHelpBlock">{{ $message }}</div>
                @enderror
        </div>

        <div class="form -group mb-3">
            <label for="description" class="form-label">Post Description:</label>
            <textarea
                class="form-control @error('post_description') is-invalid @enderror"
                id="descriptions"
                oninput="countWord()"
                name="post_description"
                placeholder="Enter description"
                rows="5"
                >{{ old('post_description', $post->post_description ?? '') }}</textarea>
                <div class="d-flex justify-content-between">
                     @error('post_description')<div class="form-text text-danger">{{$message}}</div>@enderror
                     <div class="form-text">
                        <span id="show" class="fw-bold">0</span> words <span id="char_count" class="fw-bold">0</span> characters
                    </div>
                </div>
        </div>
        @include('modules.global.seo',['seo' => $post->seo ?? null])
    </div>

    <!--end post section -->

    <div class="col-md-4">
      <div class="d-flex justify-content-between mb-3 mt-4">
        <button class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-floppy-disk"></i> Draft</button>
        <button type="submit" class="btn btn-primary btn-sm">Publish</button>
      </div>
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Post Summary
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                  <label class="form-label" for="status">Status</label>
                  <select
                      name="status"
                      id="status"
                      class="form-control @error('status') is-invalid @enderror">
                      <option value="">Select</option>
                      @foreach(\App\Models\Post::STATUS_LIST as $key => $value)
                          <option value="{{$key}}" @selected( old('status', $key == $post->status ?? null))>{{ $value }}</option>
                      @endforeach
                  </select>
                  @error('status')<div class="form-text text-danger">{{ $message }} </div>@enderror
              </div>
            </div>
          </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Categories
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <label for="category_id"></label>
                    <select
                          name="category_id"
                          id="category_id"
                          class="form-control @error('category_id') is-invalid @enderror}}">
                          <option value="">Select Category</option>
                          @foreach($categories as $key => $value)
                              <option value="{{$key}}" @selected( old('category_id', $key == $post->category_id ?? null))>{{$value}}</option>
                          @endforeach
                      </select>
                      @error('category_id')
                          <div class="form-text text-danger">{{ $message }} </div>
                      @enderror
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Featured Image
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <!-- image and gallery start-->
                  <div class="mb-4" id="section-2">
                        <label class="form-label">{{ __('Blog Details Image') }}
                          (1200x700)</label>
                        <div class="tt-image-drop rounded">
                          <span class="fw-semibold">{{ __('Choose Blog Details Image') }}</span>
                          <!-- choose media -->
                          <div class="tt-product-thumb show-selected-files mt-3">
                            <div class="avatar avatar-xl cursor-pointer choose-media"
                              data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                              onclick="showMediaManager(this)" data-selection="single">
                              <input type="hidden" name="post_image" value="{{ old('post_image', $post->post_image ?? '') }}">
                              <div class="no-avatar rounded-circle">
                                <span><i class="fa fa-plus"></i></span>
                              </div>
                            </div>
                          </div>
                          <!-- choose media -->
                        </div>
                        @error('post_image')
                        <div class="form-text text-danger">{{ $message }} </div>
                    @enderror
                  </div>
                  <!-- image and gallery end-->
                </div>
              </div>
            </div>

          </div>
    </div>
</div>
