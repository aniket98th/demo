

<!-- begin:: Root -->
<div class="kt-grid kt-grid--hor kt-grid--root">

	<!-- begin:: Page -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

		@include('partials.keen._aside.base')
		<!-- begin:: Wrapper -->
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

			@include('partials.keen._header.base')
			<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

				@include('partials.keen._subheader.subheader-v1')

			    @yield('content')

			</div>

			@include('partials.keen._footer.base')
		</div>

		<!-- end:: Wrapper -->
	</div>

	<!-- end:: Page -->
</div>

<!-- end:: Root -->

<!-- begin:: Topbar Offcanvas Panels -->

@include('partials.keen._topbar.offcanvas.quick-actions')

<!-- end:: Topbar Offcanvas Panels -->

@include('partials.keen._quick-panel')

@include('partials.keen._scrolltop')

{{--
	Bharat: we don't need the demo toolbar in our app.

	@include('partials.keen._toolbar')
--}}

@include('partials.keen._demo-panel')