@extends('layouts.user')

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
					</div>
    </div>
    <div class="content-area">
    @if (empty(Auth::user()->current_plan))
    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
									<div class="d-flex align-items-center">
										<div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
										</div>
										<div class="ms-3">
											<h6 class="mb-0 text-dark">{{ $langg->lang135 }}. <strong>{{ $langg->lang136 }}</strong> {{ $langg->lang137 }}</h6>
											<div class="text-dark"><a class="text-danger" href="{{ route('user-package') }}">{{ $langg->lang138 }}</a></div>
										</div>
									</div>
			</div>
    @endif  
    <div class="row row-cols-1 row-cols-md-4 row-cols-xl-5">
					
          <div class="col">
						<div class="card radius-10 bg-info bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">{{ $langg->lang78 }}!</p>
										<h4 class="my-1 text-white"><a href="{{ route('user.car.index', 'featured') }}" class="link">{{ \App\Models\Car::where('user_id', Auth::user()->id)->count() }}</a></h4>
									</div>
									<div class="text-white ms-auto font-35"><i class="fadeIn animated bx bx-car"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
          <div class="col">
						<div class="card radius-10 bg-danger bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">{{ $langg->lang79 }}!</p>
										<h4 class="my-1 text-white"><a href="{{ route('user.car.index', 'featured') }}" class="link">{{ \App\Models\Car::where('user_id', Auth::user()->id)->where('featured', 1)->count() }}</a></h4>
									</div>
									<div class="text-white ms-auto font-35"><i class="fadeIn animated bx bx-car"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
          <div class="col">
						<div class="card radius-10 bg-success bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Notifications</p>
										<h4 class="my-1 text-white">8569</h4>
									</div>
									<div class="text-white ms-auto font-35"><i class="bx bx-comment-detail"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
          <div class="col">
						<div class="card radius-10 bg-warning bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-dark">Your Current Package</p>
										<h4 class="text-dark my-1">
                      @if (empty(Auth::user()->current_plan))
                      <p class="text-secondary mb-1">No Plan subscribed yet</p>
                    @else
                      <p class="text-secondary mb-1">{{ get_plan_name(Auth::user()->current_plan) }}</p>
                    @endif

                    </h4>
									</div>
									<div class="text-dark ms-auto font-35"><i class="bx bx-user-pin"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
      </div>    
        <div class="row row-cards-one">
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
                                          <table id="poproducts" class="table table-sm mb-0" cellspacing="0" width="100%" role="grid">
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
                                                       echo '<span class="badge rounded-pill bg-info text-dark">'.$langg->lang88 .'</span>';
                                                     } else {
                                                       echo '<span class="badge rounded-pill bg-danger text-dark">'.$langg->lang89 .'</span>';
                                                     }
                                                     @endphp
                                                   </td>
                                                   <td>
                                                     <div class="action-list"><a href="{{ route('user.car.edit',$car->id)  }}" class="btn btn-info btn-sm px-2 edit"> <i class="fas fa-edit"></i>{{$langg->lang90}}</a></div>
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
