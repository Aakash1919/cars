@extends('layouts.user')

@section('content')

    <div class="content-area">
      <div class="row">
        <div class="col-lg-12">
          @if (empty(Auth::user()->current_plan))
            <div class="alert alert-warning" role="alert">
              <p class="mb-0">{{ $langg->lang135 }}. <strong>{{ $langg->lang136 }}</strong> {{ $langg->lang137 }}. <a class="text-danger" href="{{ route('user-package') }}">{{ $langg->lang138 }}</a>.</p>
            </div>
          @endif
        </div>
      </div>
        <div class="row row-cards-one">
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="mycard bg1">
                        <div class="left">
                            <h5 class="title">{{ $langg->lang78 }}! </h5>
                            <span class="number">{{ \App\Models\Car::where('user_id', Auth::user()->id)->count() }}</span>
                            <a href="{{ route('user.car.index') }}" class="link">{{ $langg->lang1000 }}</a>
                        </div>
                        <div class="right d-flex align-self-center">
                            <div class="icon">
                                <i class="fas fa-images"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="mycard bg2">
                        <div class="left">
                            <h5 class="title">{{ $langg->lang79 }}!</h5>
                            <span class="number">{{ \App\Models\Car::where('user_id', Auth::user()->id)->where('featured', 1)->count() }}</span>
                            <a href="{{ route('user.car.index', 'featured') }}" class="link">{{ $langg->lang1000 }}</a>
                        </div>
                        <div class="right d-flex align-self-center">
                            <div class="icon">
                                <i class="fas fa-marker"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="mycard bg4">
                        <div class="left">
                            <h5 class="title">{{ $langg->lang80 }}!</h5>
                            <span class="number">{{ !empty($user->socialsetting) ? ($user->socialsetting->f_status + $user->socialsetting->i_status + $user->socialsetting->g_status + $user->socialsetting->t_status + $user->socialsetting->l_status + $user->socialsetting->d_status) : 0 }}</span>
                            <a href="{{ route('user-social-index') }}" class="link">{{ $langg->lang1000 }}</a>
                        </div>
                        <div class="right d-flex align-self-center">
                            <div class="icon">
                                <i class="fa fa-link" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                  <div class="row row-cards-one">
                     <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                           <h5 class="card-header">{{ $langg->lang81 }}</h5>
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
                                                  <th>{{ $langg->lang82 }}</th>
                                                  <th>{{ $langg->lang83 }}</th>
                                                  <th>{{ $langg->lang84 }}</th>
                                                  <th>{{ $langg->lang85 }}</th>
                                                  <th>{{ $langg->lang86 }}</th>
                                                  <th>{{ $langg->lang87 }}</th>
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
                                                       echo '<span class="badge badge-success">'.$langg->lang88 .'</span>';
                                                     } else {
                                                       echo '<span class="badge badge-danger">'.$langg->lang89 .'</span>';
                                                     }
                                                     @endphp
                                                   </td>
                                                   <td>
                                                     <div class="action-list"><a href="{{ route('user.car.edit',$car->id)  }}" class="edit"> <i class="fas fa-edit"></i>{{$langg->lang90}}</a></div>
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

            </div>
    </div>

@endsection
