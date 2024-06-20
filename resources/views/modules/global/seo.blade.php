<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="seoHeading">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#seoCollapse" aria-expanded="false" aria-controls="seoCollapse">
                SEO Meta Configuration
            </button>
        </h2>
        <div id="seoCollapse" class="accordion-collapse collapse show" aria-labelledby="seoHeading" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="mb-4" id="section-10">
                    <div class="mb-4">
                        <label for="meta_title" class="form-label">{{ __('Meta Title') }}</label>
                        <input type="text" value="{{ old('meta_title', $seo->meta_title ?? '') }}" name="meta_title" id="meta_title"
                            placeholder="{{ __('Type meta title') }}" class="form-control @error('meta_title') is-invalid

                            @enderror">
                            @error('meta_title')
                            <div class="form-text text-danger" id="slugHelpBlock">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="meta_keywords" class="form-label">{{ __('Meta Keywords') }}</label>
                        <input type="text" value="{{ old('meta_keywords', $seo->meta_keywords ?? '') }}" name="meta_keywords" id="meta_keywords"
                            placeholder="{{ __('Type meta keywords') }}" class="form-control">
                        <span class="fs-6 text-muted">
                            {{-- {{ __('Set a meta tag title. Recommended to be simple and unique.') }} --}}
                        </span>
                    </div>

                    <div class="mb-4">
                        <label for="meta_description"
                            class="form-label">{{ __('Meta Description') }}</label>
                        <textarea class="form-control" name="meta_description" id="meta_description" rows="4"
                            placeholder="{{ __('Type your meta description') }}">{{ old('meta_description', $seo->meta_description ?? '') }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">{{ __('Meta Image') }}</label>
                        <div class="tt-image-drop rounded">
                            <span class="fw-semibold">{{ __('Choose Meta Image') }}</span>
                            <!-- choose media -->
                            <div class="tt-product-thumb show-selected-files mt-3">
                                <div class="avatar avatar-xl cursor-pointer choose-media"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                    onclick="showMediaManager(this)" data-selection="single">
                                    <input type="hidden" name="meta_image" value="{{ old('meta_image', $seo->meta_image ?? '') }}">
                                    <div class="no-avatar rounded-circle">
                                        <span><i class="fa fa-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- choose media -->
                        </div>

                    </div>
            </div>
            </div>
        </div>
    </div>
</div>
