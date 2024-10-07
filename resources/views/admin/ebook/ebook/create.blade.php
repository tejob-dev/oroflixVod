@extends('layouts.master')
@section('title',__('Ebook Create'))
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Ebook Create') }}</li>
                    </ol>
                </div>    
    </div>
@endsection
@section('maincontent')
<div class="contentbar">   
  @if ($errors->any())  
    <div class="alert alert-danger" role="alert">
      @foreach($errors->all() as $error)     
        <p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      @endforeach  
    </div>
  @endif  
  <div class="ebook-create-block">
    <div class="card dashboard-card m-b-30">
      <div class="card-header">
        <h5 class="box-tittle">{{ __('Ebook Adding Form') }}</h5>
        <div>
          <div class="widgetbar">
              <a href="{{ route('ebook') }}" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back")}}</a>
            </div>
        </div>
      </div>
    </div>
    <form action="{{route('ebook.store')}}" class="form" method="POST" novalidate enctype="multipart/form-data">
                     @csrf
    <div class="row">
      <div class="col-lg-5 col-xl-3">
        <div class="card m-b-30">
          <div class="card-header">
            <h5 class="box-tittle">Ebook Form</h5>
          </div>
          <div class="card-body">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link mb-2 show active" data-toggle="pill" href="#v-pills-basic" role="tab" aria-selected="true"><i class="feather icon-anchor mr-2"></i>Basic</a>
              <a class="nav-link mb-2" id="v-pills-ebook-file-tab" data-toggle="pill" href="#v-pills-ebook-file" role="tab" aria-controls="v-pills-ebook-file" aria-selected="false"><i class="feather icon-file-text mr-2"></i>Ebook files</a>
              <a class="nav-link mb-2" id="v-pills-finish-tab" data-toggle="pill" href="#v-pills-finish" role="tab" aria-controls="v-pills-finish" aria-selected="false"><i class="feather icon-check-square mr-2"></i>Finish</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-7 col-xl-9">
        <div class="tab-content" id="v-pills-tabContent">

          <div class="tab-pane fade active show" id="v-pills-basic" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                <div class="card m-b-30">
                  <div class="card-header">
                    <h5 class="card-box">Add a new ebook</h5>
                  </div>
                  <div class="card-body">

                      <div class="row">
                        <div class="col-lg-6 col-md-6 mb-2">
                          <div class="form-group">
                            <label for="exampleInputTitle">Title <sup class="redstar">*</sup></label>
                            <input type="type" class="form-control" name="title" id="exampleInputTitle" aria-describedby="TitleHelp" value="{{ (old('title')) }}" placeholder="Enter Title">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-2">
                          <div class="form-group">
                            <label for="exampleFormControlCategory">Category <sup class="redstar">*</sup></label>
                            <select class="form-control" name="category_id" id="exampleFormControlCategory">
                            <option value="">Select Genre</option>
                                @if(isset($category))
                                @foreach($category as $key => $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                                @endif
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-4">
                          <div class="form-group">
                            <label for="exampleInputTit1e">{{ __('Detail') }}: <sup class="redstar">*</sup></label>
                            <textarea id="detail" name="detail" rows="2" class="form-control">{{ (old('detail')) }}</textarea>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-2">
                          <div class="form-group">
                            <label for="exampleInputName">Publication Name <sup class="redstar">*</sup></label>
                            <input type="text" class="form-control" name="publication" id="exampleInputName" value="{{ (old('publication')) }}" aria-describedby="NameHelp" placeholder="Enter Publication Name">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-2">
                          <div class="form-group">
                            <label for="exampleInputEdition">Edition <sup class="redstar">*</sup></label>
                            <input type="text" class="form-control" name="edition" id="exampleInputEdition" value="{{ (old('edition')) }}" aria-describedby="EditionHelp" placeholder="Enter Edition">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-2">
                          <div class="form-group">
                            <label for="exampleInputBanner">Ebook Banner</label>
                              <div class="input-group mb-3 text-left">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupFilebanner01">Upload</span>
                                </div>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="inputGroupFile01" name="banner" accept="image/*" aria-describedby="inputGroupFilebanner01">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-2">
                          <div class="form-group">
                            <label for="exampleInputThumbnail">Ebook Thumbnail</label>
                              <div class="input-group mb-3 text-left">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupFileThumbnail01">Upload</span>
                                </div>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="inputGroupFile02" name="thumbnali" accept="image/*" aria-describedby="inputGroupFileThumbnail01">
                                  <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    <!-- </form> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="tab-pane fade" id="v-pills-ebook-file" role="tabpanel" aria-labelledby="v-pills-ebook-file-tab">
            <div class="row">
              <div class="col-lg-12">
                <div class="card m-b-30">
                  <div class="card-header">
                    <h5 class="card-box">Ebook Files</h5>
                  </div>
                  <div class="card-body">
                    <!-- <form> -->
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="exampleInputPreview">Ebook Preview file</label>
                            <p>
                              <small class="text-primary">
                                <i class="feather icon-help-circle"></i> {{ __("Accept only PDF") }}
                              </small>
                            </p>
                              <div class="input-group mb-3 text-left">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupFilePreview01">Upload</span>
                                </div>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="inputGroupFile03" name="files" accept="application/pdf" aria-describedby="inputGroupFilePreview01">
                                  <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="exampleInputComplete">Ebook Complete file</label>
                              <p>
                                <small class="text-primary">
                                  <i class="feather icon-help-circle"></i> {{ __("Accept only PDF") }}
                                </small>
                              </p>
                              <div class="input-group mb-3 text-left">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupFileComplete01">Upload</span>
                                </div>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="inputGroupFile04" name="all_file" accept="application/pdf" aria-describedby="inputGroupFileComplete01">
                                  <label class="custom-file-label" for="inputGroupFile04">Choose file</label>

                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    <!-- </form> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-finish" role="tabpanel" aria-labelledby="v-pills-finish-tab">
            <div class="row">
              <div class="col-lg-12">
                <div class="card m-b-30">
                  <div class="card-header">
                    <h5 class="card-box">Finish</h5>
                  </div>
                  <div class="card-body text-center">
                    <img src="{{ url('admin_assets/images/finish.png') }}" class="img-fluid mb-3" alt="">
                    <h2 class="finish-heading">Thank You !</h2>
                    <p class="mb-4">You are just one click away</p>
                    <!-- <a href="" type="submit" class="btn btn-primary" title="submit">Submit</a> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>

    </div>
    </form> 
  </div>
</div>



    <!-- Code -->



  @endsection
  @section('script')
  <script>
    $('#paid1').on('change', function() {

      if ($('#paid1').is(':checked')) {
        $('#pricebox1').show('fast');

        $('#priceMain').prop('required', 'required');

      } else {
        $('#pricebox1').hide('fast');

        $('#priceMain').removeAttr('required');
      }

    });
  </script>
  @endsection
