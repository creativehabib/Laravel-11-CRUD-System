    <div class="row">
    <div class="col-md-8">
        <div class="form-group mb-3">
            <label class="form-label" for="name">Name:</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $category->name ?? '') }}"
                class="form-control @error('name') is-invalid @enderror"
                placeholder="Exa. category name"
                aria-describedby="nameHelpBlock">
                @error('name')
                    <div class="form-text text-danger" id="nameHelpBlock">{{ $message }}</div>
                @enderror
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="slug">Slug:</label>
            <input
                type="text"
                name="slug"
                id="slug"
                value="{{ old('slug', $category->slug ?? '') }}"
                class="form-control @error('slug') is-invalid @enderror"
                placeholder="Exa. category slug"
                aria-describedby="slugHelpBlock">
                @error('slug')
                    <div class="form-text text-danger" id="slugHelpBlock">{{ $message }}</div>
                @enderror
        </div>

        <div class="form group d-flex mb-4">
            <div class="col-md-6" style="padding-right: 25px">
                <label class="form-label" for="status">Status</label>
                <select
                    name="status"
                    id="status"
                    class="form-control @error('status') is-invalid @enderror">
                    @foreach(\App\Models\Category::STATUS_LIST as $key => $value)
                        <option value="{{$key}}" @selected( old('status', $key == $category->status ?? null))>{{ $value }}</option>
                    @endforeach
                </select>
                    @error('status')
                        <div class="form-text text-danger">{{ $message }} </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="parent_id" class="form-label">Parent Category</label>
                <select
                    name="parent_id"
                    id="parent_id"
                    class="form-control @error('parent_id') is-invalid @enderror}}">
                    <option value="">Select</option>
                    @foreach($categories as $key => $value)
                        <option value="{{$key}}" @selected( old('parent_id', $key == $category->parent_id ?? null))>{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form -group mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea
                class="form-control @error('description') is-invalid @enderror"
                id="description"
                oninput="countWord()"
                name="description"
                placeholder="Enter description"
                rows="5"
                >{{ old('description', $category->description ?? '') }}</textarea>
                <div class="d-flex justify-content-between">
                    @error('description')<div class="form-text text-danger">{{$message}}</div>@enderror
                    <div class="form-text">
                        <span id="show" class="fw-bold">0</span> words <span id="char_count" class="fw-bold">0</span> characters
                    </div>
                </div>
        </div>

    </div>
    <div class="col-md-4">
        <div class="d-flex justify-content-between mb-3 mt-4">
            <button class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-floppy-disk"></i> Draft</button>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Publish</button>
          </div>
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Category Summary
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                      Hello

                  </div>
                </div>
              </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Category Image
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
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
                                  <input type="hidden" name="cat_image" value="{{ old('cat_image', $category->cat_image ?? '') }}">
                                  <div class="no-avatar rounded-circle">
                                    <span><i class="fa fa-plus"></i></span>
                                  </div>
                                </div>
                              </div>
                              <!-- choose media -->
                            </div>
                            @error('cat_image')
                                    <div class="form-text text-danger">{{ $message }} </div>
                            @enderror
                      </div>
                      <!-- image and gallery end-->
                    </div>
                  </div>
                </div>
                @include('modules.global.seo', ['seo' => $category->seo ?? null])
              </div>



    </div>

    </div>
