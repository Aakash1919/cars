@extends('layouts.load')

@section('content')

            <div class="content-area">

              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error')
                      <form id="geniusformdata" action="{{route('admin-plan-create')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="title" placeholder="Enter Title" required="" value="">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Currency *</h4>
                                <p class="sub-heading">(In English)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="currency" placeholder="Enter Currency" value="" required="">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Currency Code *</h4>
                                <p class="sub-heading">(In English)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="currency_code" placeholder="Enter Currency Code" value="" required="">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Price </h4>
                                <p class="sub-heading">(In English)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="price" placeholder="Enter Price" value="">
                            <p class="mb-0"><small>** Leave this field blank if it is Free</small></p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Days </h4>
                                <p class="sub-heading">(In English)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="number" class="input-field" name="days" placeholder="Enter Days" value="">
                            <p class="mb-0"><small>** Leave this field blank if it is available for infinite days.</small></p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Type *</h4>
                                <p class="sub-heading">(In English)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <select class="input-field" name="type" required="">
                              <option value="" disabled selected>Select a type</option>
                              <option value="normal">Normal</option>
                              <option value="featured">Featured</option>
                            </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Details *</h4>
                                <p class="sub-heading">(In English)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <textarea name="details" class="input-field" rows="8" cols="80" placeholder="Enter Details Here"></textarea>
                          </div>
                        </div>

                        <br>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">Submit</button>
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection
