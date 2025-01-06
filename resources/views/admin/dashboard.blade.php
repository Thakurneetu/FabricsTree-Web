@extends('layouts.admin')

@section('content')
  <div class="body flex-grow-1">
    <div class="container-lg px-4">
      <div class="row g-4 mb-4">

        <div class="col-sm-6 col-xl-3">
          <div class="card text-white bg-primary">
            <div class="card-body d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">26</div>
                <div>Customers</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3">
          <div class="card text-white bg-warning">
            <div class="card-body d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">26</div>
                <div>Manufacturers</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3">
          <div class="card text-white bg-secondary">
            <div class="card-body d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">26</div>
                <div>Products</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3">
          <div class="card text-white bg-success">
            <div class="card-body d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">26</div>
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
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Customer One</td>
                    <td>7645674568</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Customer Two</td>
                    <td>7645674568</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Customer Three</td>
                    <td>7645674568</td>
                  </tr>
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
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Manufacturer One</td>
                    <td>7645674568</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Manufacturer Two</td>
                    <td>7645674568</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Manufacturer Three</td>
                    <td>7645674568</td>
                  </tr>
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
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Product One</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Product Two</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Product Three</td>
                  </tr>
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
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Product One</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Product Two</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Product Three</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection
