@extends('public.layouts.master')

@section('title', 'Select your healthcare - Chikitzo')


@section('content')
<div id="page">
	<!--==================================Header Open=================================-->
	<header class="">


		
		<div class="md-overlay"></div> <!-- Overlay for Popup -->
							<div id="menu">
								<ul>
									<li><a href="/">Home</a>
									</li>
									@if (Auth::guest())
									<li><a href="/signin">Sign In</a> / <a href="/signup">Sign Up</a></li>
									</li>
									@else 
									@if(Sentinel::findById(Auth::user()->id)->inRole('user'))
									<li><a href="/user/dashboard">Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('healthcare'))
									<li><a href="/healthcare/dashboard">  Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('admin'))
									<li><a href="/admin/dashboard">  Dashboard</a></li>
									</li>
									@endif
									@endif

								</ul>
							</div>
		<div class="lp-menu-bar  lp-menu-bar-color">
			<div class="container">
					<div class="row">
						<div class="col-md-4 col-xs-6 lp-logo-container">
							<div class="lp-logo">
								<a href="/">
									<h2 class="main-logo"><i class="fa fa-heartbeat" aria-hidden="true"></i> Chikitzo</h2>
								</a>
							</div>
						</div>
						<div class="col-xs-6 mobile-nav-icon">
							<a href="#menu" class="nav-icon">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>s
						</div>
						<div class="col-md-8 col-xs-12 lp-menu-container">
							<div class="pull-right lp-add-listing-btn">
							<ul>

									<li><a href="/add-health-care"><i class="fa fa-plus"></i> Add your health care service</a></li>
								</ul>
							</div>
							<div class="lp-menu pull-right menu">
								<ul>
									@if (Auth::guest())
									<li><a href="/signin"><i class="fa fa-user user-plus-icon"></i>  Login</a> / <a href="/signup"><i class="fa fa-user-plus user-plus-icon"></i>  Register</a></li>
									@else 
									@if(Sentinel::findById(Auth::user()->id)->inRole('user'))
									<li><a href="/user/dashboard"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('healthcare'))
									<li><a href="/healthcare/dashboard"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('admin'))
									<li><a href="/admin/dashboard"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									</li>
									@endif
									@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
		</div><!-- ../menu-bar -->
		<div class="page-heading listing-page archive-page ">
			<div class="page-heading-inner-container text-center">
				<h1>{{$type_sel['name']}}</h1>
				<ul class="breadcrumbs">
					<li><a href="/">Home</a></li>
					<li><span>{{$type_sel['name']}}</span></li>
				</ul>
			</div>
			<div class="page-header-overlay"></div>
		</div><!-- ../Home Search Container -->
	</header>
	<!--==================================Header Close=================================-->

	<!--==================================Section Open=================================-->
	<section>
		<div class="container page-container">
			<div class="row">
				<div class="col-md-12 search-row margin-top-subtract-35  margin-bottom-35">
					<form class="form-inline clearfix">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon lp-border "><i class="fa fa-crosshairs"></i></div>
									<div class="ui-widget border-dropdown">
									  <select class="comboboxs state">
											
											<option value="{{$state_sel['id']}}">{{$state_sel['name']}}</option>
										@foreach ($states as $state)
										<option value="{{$state['id']}}">{{$state['name']}}</option>
										@endforeach
									  </select>
									</div>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon lp-border"><i class="fa fa-crosshairs"></i></div>
									<div class="ui-widget border-dropdown">
									  <select class="comboboxs city-filter">
											<option value="{{$city_sel['id']}}">{{$city_sel['name']}}</option>
										@foreach ($cities as $city)
										<option value="{{$city['id']}}">{{$city['name']}}</option>
										@endforeach
									  </select>
									</div>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon lp-border"><i class="fa fa-list"></i></div>
									<div class="ui-widget comboboxCategory border-dropdown">
									  <select id="comboboxCategory" class="hospital-type">
										<option value="{{$type_sel['id']}}">{{$type_sel['name']}}</option>
										@foreach ($types as $type)
										<option value="{{$type['id']}}">{{$type['name']}}</option>
										@endforeach
										 </select>
									</div>

							</div>
						</div>
						<div class="form-group margin-right-0">
							<div class="input-group margin-right-0">
								<div class="input-group-addon lp-border"><i class="fa fa-tag"></i></div>
									<select data-placeholder="Tags" class="chosen-select tag-select-one" multiple >

										@foreach ($fecilities as $fecility)
										<option value="{{$fecility['id']}}">{{$fecility['name']}}</option>
										@endforeach
									
									</select>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="LPtagsContainer "></div>
				</div>
			</div>
			<!-- <div class="row listing-page-result-row margin-bottom-25">
				<div class="col-md-4 col-sm-4 text-left">
					<p>10 Results</p>
				</div>
				<div class="col-md-4 col-sm-4  text-center">
					<p class="view-on-map">
						

					</p>
				</div>
				<div class="col-md-4 col-sm-4  text-right">
					<p>Showing all Hospital Listings <a href="/listing.html#" class="achor-color">Reset</a></p>
				</div>
			</div> -->
			<div class="mobile-map-space">

					<!-- Popup Open -->

					<div class="md-modal md-effect-3 mobilemap" id="modal-4">
						<div class="md-content mapbilemap-content">
							<div id='map' class="listingmap"></div>
							<a class="md-close mapbilemap-close"><i class="fa fa-close"></i></a>
						</div>
					</div>
					<!-- Popup Close -->
					<div class="md-overlay md-overlayi"></div> <!-- Overlay for Popup -->
			</div>
					<div class="row lp-list-page-grid">
						
						@foreach ($healthcare as $health)
						<div class="col-md-3 col-sm-6 lp-grid-box-contianer"  data-title="Photography" data-reviews="4" data-number="+007-123-4567-89" data-email="jhonruss@example.com" data-website="www.example.com" data-price="$20/h" data-pricetext="Text about your price" data-description="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi archeum" data-userimage="images/user-thumb-94x94.png" data-username="Jhon Russel" data-userlisting="14"  data-fb="www.facebook.com" data-gplus="www.plus.google.com" data-linkedin="www.linkedin.com" data-instagram="www.instagram.com" data-twitter="www.twitter.com" data-lattitue="51.514070" data-longitute="-0.142292"  data-id="10"  data-posturl="/healthcare/{{ $health['id'] }}/{{ urlencode($health['name']) }}" data-authorurl="author.html">
							<div class="lp-grid-box lp-border lp-border-radius-8">
								<div class="lp-grid-box-thumb-container">
									<div class="lp-grid-box-thumb">
										<a href="/healthcare/{{ $health['id'] }}/{{ urlencode($health['name']) }}">
										<img src="images/grid/{{ $health['pro_pic'] }}" alt="grid-3" />
									</a>
									</div><!-- ../grid-box-thumb -->

								</div>
								<div class="lp-grid-box-description ">
									<h4 class="lp-h4">
										<a href="/healthcare/{{ $health['id'] }}/{{ urlencode($health['name']) }}">
											{{ $health['name'] }}
										</a>
									</h4>
									<p>
										<i class="fa fa-map-marker"></i>
										<span>{{ $health['city'][0]['name'] }}</span>
									</p>
									<ul class="lp-grid-box-price">
										<li class="category-cion"><a href="/healthcare/{{ $health['id'] }}/{{ urlencode($health['name']) }}">
											<!-- 5 Star Hotel icon by Icons8 -->
<img class="icon icons8-5-Star-Hotel" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACWUlEQVRoQ+1ZvXnbMBB95zKN5REwQZQJAk0QuwxZRJnAHsEj2BNYKciUsScQNrAzAUZI0qQ0/IEy80E0IQIgKOhTwE68H9w7HN7hKMLAw79LrlXEZyb6VFPL25hoEEgt1w2Qgi16gSSW7wTCKznHCT5BYU7AuVZWwD0IT3jGQ2OcUC5K9tRNqnVHeC1XBHwxDRTwTRRsqd+lljsD0YqLWmrk71+Nfq4LNjcdpJabsew8I7ySvwjqz6a06FSU7Mw0Ti13AsJ/yBn+4kqU7LoppUpe4x1uxAX73fxOLHcqreawA5cAzokwG2K2fciVgk7gPYBbp8POK7kkwt0+ggtdQyl8FSVbWUtL7wQRHl/p9hYKqz70oQGMsWuqhLCkTaVAKXwwY9s67C2lKr19Bbsas/BUtryWNxqM2Qr0WttANEsRZl20UwUV4retGn1mTBbdArKopdLO1wUbvLqEBBHLpi9OJyC8ko9E2GqGbVD66iIKdtHpL5PqBwNpDW0Z7e7gvvTNdZ12xFZyh/T+/wRyDKWlp8OPfUCUwoMoWTOztM+illPrv2FXp9KKRZux/ASzVqwAYvkJBpL7iGULYvWd3EdsmTyE906sta8rh2+fCimtqfuCr//cR2K1gCh+ch85psPeOwLneaTzTSBGQnIf+ffxIc8j4UwcTL/hS05jGQwkzyN5HtlkwIeWvej3EOYOG0AvIGPmBZcMj/HvCmT0vDAAZLR/JyC+JOpT276+R5WW72IZiGPGghuio3/z26/XtT+G/+M+I74ZSqW/63OQlQZTBWtbt/t3xgvz/SNvFqVEmwAAAABJRU5ErkJggg==" alt="hotels">
										</a></li>
										<li><span>Price on call / email</span></li>
									</ul>
								</div><!-- ../grid-box-description-->
								<div class="lp-grid-box-bottom">
									<div class="pull-left">
									@if(count($health['rating']) > 0)
										@for($i=0;$i<$health['rating'][0]['rating'];$i++)
										<i class="fa fa-star"></i>
										@endfor
										@for($k=$i;$k<5;$k++)
										<i class="fa fa-star-o"></i>
										@endfor
										<span class="rating-ratio">{{$health['rating'][0]['rating']}}</span>
								  @else
								   <span class="rating-ratio">Never rated</span>
								  @endif
									</div>
									<div class="pull-right">
										@for($i=0;$i<$health['price'];$i++)
										<i class="fa fa-usd price-usd"></i>
										@endfor
										</a>
									</div>
									<div class="clearfix"></div>
								</div><!-- ../grid-box-bottom-->
							</div><!-- ../grid-box -->
						</div>
						@endforeach
						




					</div>
		</div>
	</section>
	
@endsection