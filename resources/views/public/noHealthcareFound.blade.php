@extends('public.layouts.master')

@section('title', 'Select your healthcare - Chikitzo')


@section('content')
<div id="page">
	<!--==================================Header Open=================================-->
	<header class="">


		
		<div class="md-overlay"></div> <!-- Overlay for Popup -->
							<div id="menu">
								@include('public.layouts.headerMob')
							</div>
		<div class="lp-menu-bar  lp-menu-bar-color">
			<div class="container">
					<div class="row">
						@include('public.layouts.logo')
						
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
									<select data-placeholder="Tags" class="chosen-select tag-select-one fec-types" multiple >

										
									
									</select>
							</div>
						</div>
					</form>
					<input class="selected-types" value="[]" type="hidden" />
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
						
						

						<div align="center"> No Healthcare Found </div>


					</div>
		</div>
	</section>
	
@endsection