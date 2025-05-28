@extends('layouts.admin')

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="row g-4 mb-4">

        <div class="col-sm-6 col-xl-3">
          <div class="card text-white bg-primary">
            <div class="card-body d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">{{$customers_count}}</div>
                <div>Customers</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3">
          <div class="card text-white bg-warning">
            <div class="card-body d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">{{$manufacturers_count}}</div>
                <div>Manufacturers</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3">
          <div class="card text-white bg-secondary">
            <div class="card-body d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">{{$products_count}}</div>
                <div>Products</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3">
          <div class="card text-white bg-success">
            <div class="card-body d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">{{$orders_count}}</div>
                <div>Orders</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              Top 10 Active Buyers
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Orders</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($topCustomers as $key => $user)
                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->orders_count}}</td>
                  </tr>
                  @empty
                  <tr colspan="3">
                  <th colspan="3" scope="row" class="text-center">No Data Found!</th>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              Top 10 Active Manufacturers
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Orders</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($topManufacturers as $key => $user)
                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->manufacturer_orders_count}}</td>
                  </tr>
                  @empty
                  <tr>
                    <th colspan="3" scope="row" class="text-center">No Data Found!</th>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              Top 10 Selling Products
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Sold</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($topProducts as $key => $product)
                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$product->title}}</td>
                    <td>{{$product->order_products_count}}</td>
                  </tr>
                  @empty
                  <tr>
                    <th colspan="2" scope="row" class="text-center">No Data Found!</th>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              Top 10 Least Selling Products
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Sold</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($topLeastProducts as $key => $product)
                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$product->title}}</td>
                    <td>{{$product->order_products_count}}</td>
                  </tr>
                  @empty
                  <tr>
                    <th colspan="2" scope="row" class="text-center">No Data Found!</th>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection
