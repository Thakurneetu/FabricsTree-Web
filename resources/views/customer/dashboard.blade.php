<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                @session('success')
                    <div class="alert alert-success" role="alert"> 
                    {{ $value }}
                    </div>
                @endsession

                <a href="{{ route('customer.logout')}}" ><button class="btn btn-outline-success login" type="button" >Logout</button></a>
                </div>
            </div>
        </div>
    </div>
</div>