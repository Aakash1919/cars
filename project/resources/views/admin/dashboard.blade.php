@extends('layouts.admin')

@section('content')

  <div class="content-area">
      <div class="row row-cards-one">
              <div class="col-md-12 col-lg-6 col-xl-4">
                  <div class="mycard bg1">
                      <div class="left">
                          <h5 class="title">Total members! </h5>
                          <span class="number">{{ \App\Models\User::where('status', 1)->count() }}</span>
                          <a href="{{ route('admin-user-index') }}" class="link">View All</a>
                      </div>
                      <div class="right d-flex align-self-center">
                          <div class="icon">
                              <i class="fas fa-users"></i>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-4">
                  <div class="mycard bg2">
                      <div class="left">
                          <h5 class="title">Total Cars Active!</h5>
                          <span class="number">{{ \App\Models\Car::where('status', 1)->count() }}</span>
                          <a href="{{ route('admin-plan-index') }}" class="link">View All</a>
                      </div>
                      <div class="right d-flex align-self-center">
                          <div class="icon">
                              <i class="fa fa-tasks" aria-hidden="true"></i>
                          </div>
                      </div>
                  </div>
              </div>
             
              <div class="col-md-12 col-lg-6 col-xl-4">
                  <div class="mycard bg6">
                      <div class="left">
                          <h5 class="title">Total Transactions!</h5>
                          <span class="number">${{ \App\Models\Payment::where('status', 0)->sum('amount') }}</span>
                          <a href="{{ route('admin-cat-index') }}" class="link">View All</a>
                      </div>
                      <div class="right d-flex align-self-center">
                          <div class="icon">
                              <i class="fas fa-tags"></i>
                          </div>
                      </div>
                  </div>
              </div>
             
          </div>


          <div class="row row-cards-one">
             <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                   <h5 class="card-header">Recently Added Cars</h5>
                   <div class="card-body">
                      <div class="table-responsiv  dashboard-home-table">
                         <div id="poproducts_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row btn-area">
                               <div class="col-sm-4"></div>
                               <div class="col-sm-4"></div>
                            </div>
                            <div class="row">
                               <div class="col-sm-12">
                                  <table id="poproducts" class="table table-hover dt-responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%" role="grid">
                                     <thead>
                                        <tr role="row">
                                          <th>Title</th>
                                          <th>Brand</th>
                                          <th>Model</th>
                                          <th>Year</th>
                                          <th>Featured</th>
                                          <th>Actions</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                       @foreach ($cars as $key => $car)
                                         <tr>
                                           <td>{{ strlen($car->title) > 20 ? substr($car->title, 0, 20) . '...' : $car->title }}</td>
                                           <td>{{ $car->brand->name }}</td>
                                           <td>{{ $car->brand_model->name }}</td>
                                           <td>{{ $car->year }}</td>
                                           <td>
                                             @php
                                             if ($car->featured == 1) {
                                               echo '<span class="badge badge-success">Yes</span>';
                                             } else {
                                               echo '<span class="badge badge-danger">No</span>';
                                             }
                                             @endphp
                                           </td>
                                           <td>
                                             <div class="action-list"><a href="{{ route('admin.car.edit',$car->id)  }}" class="edit"> <i class="fas fa-edit"></i>Edit</a></div>
                                           </td>
                                         </tr>
                                       @endforeach
                                     </tbody>
                                  </table>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-12 col-md-5"></div>
                               <div class="col-sm-12 col-md-7"></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
  </div>

@endsection
