<div class="content">
<div class="container-fluid">

    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">@yield('content-title')</h4>
            <div class="category">@yield('content-subtitle')</div>
        </div>
        <div class="card-content">
            <div class="row">
					
					@yield('content-content')

            </div>
       </div>

    </div>

    @yield('content-content-blank')



</div>
</div>