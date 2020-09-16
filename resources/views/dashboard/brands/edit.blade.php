@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{route('admin.dashboard')}}">{{__('admin/shipping.main')}} </a>
                                </li>

                                <li class="breadcrumb-item active"><a
                                        href="{{route('admin.brands')}}">{{__('admin/brands.brands')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/categories.edit')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"
                                        id="basic-layout-form"> {{__('admin/brands.brandEdit')}} </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('admin.brands.update',$brands->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="id" value="{{$brands -> id}}">

                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img src="{{$brands->photo}}"
                                                         alt="{{__('admin/brands.brandPhoto')}}"
                                                         class="rounded-circle height-150"
                                                    >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>{{__('admin/brands.brandPhoto')}}</label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file"
                                                           id="file"
                                                           name="photo"
                                                           value="{{$brands->photo}}"
                                                    >
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>


                                            <div class="form-body">

                                                <h4 class="form-section"><i
                                                        class="ft-home"></i> {{__('admin/brands.brandData')}}
                                                </h4>
                                                {{--
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-12">
                                                                                                            <div class="form-group">
                                                                                                                <label
                                                                                                                    for="projectinput1"> {{__('admin/categories.parent')}} </label>

                                                                                                                <select name="parent_id"
                                                                                                                        id="parent_id"
                                                                                                                        class="form-control">
                                                                                                                    <optgroup label="{{__('admin/categories.mainCategories')}}">
                                                                                                                        @if($categories && $categories->count()>0)
                                                                                                                            @foreach($categories as $cat)
                                                                                                                                <option @if($category->parent_id == $cat->id) selected @endif
                                                                                                                                    value="{{$cat->id}}">{{$cat->name}}</option>
                                                                                                                            @endforeach
                                                                                                                        @endif
                                                                                                                    </optgroup>
                                                                                                                </select>
                                                                                                                @error("parent_id")
                                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                                                @enderror
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                --}}

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1"> {{__('admin/categories.catName')}} </label>
                                                            <input type="text"
                                                                   value="{{$brands->name}}"
                                                                   id="name"
                                                                   class="form-control"
                                                                   placeholder=""
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="margin-top: 15px">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox"
                                                                   id="switcheryColor4"
                                                                   class="switchery"
                                                                   placeholder=""
                                                                   name="is_active"
                                                                   data-color="success"
                                                                   @if($brands->is_active == 1) checked @endif
                                                            >
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">{{__('admin/categories.status')}}</label>
                                                            @error("is_active")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>


                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i>{{__('admin/categories.cancel')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>{{__('admin/categories.save')}}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@stop