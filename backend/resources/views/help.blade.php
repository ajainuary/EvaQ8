@extends('app')
@section('title', 'Request Help')
@section('content')
<div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>EvaQ8</h2>
        <p class="lead">Are you stuck in a disaster? fill this form to ask for assistance.</p>
      </div>
        <div class="col-md-8 order-md-1">
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="phone_number">Contact No.</label>
              <input type="text" class="form-control" id="phone_number" placeholder="We can reach you for assistance">
              <div class="invalid-feedback">
                Please enter a valid contact no. for updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="latitude">Latitude</label>
              <input type="text" class="form-control" id="latitude" name="latitude" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="logtitude">Longtitude</label>
              <input type="text" class="form-control" id="longtitude" name="logtitude">
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="safe">
              <label class="custom-control-label" for="safe">Are you safe? or do you require urgent help?</label>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 EvaQ8</p>
      </footer>
@endsection