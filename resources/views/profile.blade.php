@extends('layouts.app')
@section('title')
Profile - {{auth()->user()->firstName}} {{auth()->user()->lastName}}
@endsection
@section('content')
<div class="container">
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-xl-4">
      
              <div class="card" style="border-radius: 15px;">
                <div class="card-body text-center">
                  <div class="mt-3 mb-4">
                    <!--<img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                      class="rounded-circle img-fluid" style="width: 100px;" />-->
                      <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                      </svg>
                  </div>
                  <h4 class="mb-2">{{auth()->user()->firstName}} {{auth()->user()->lastName}}</h4>
                  @if (auth()->user()->hasRole('admin'))
                  <p class="text-muted mb-4">@admin <span class="mx-2">|</span> <a
                    href="#!"></a></p>
                <div class="mb-4 pb-2">
                 
                  @elseif (auth()->user()->hasRole('instructor'))
                  <p class="text-muted mb-4">@instructor <span class="mx-2">|</span> <a
                    href="#!"></a></p>
                <div class="mb-4 pb-2">
                 
                  @else
                  <p class="text-muted mb-4">@student <span class="mx-2">|</span> <a
                    href="#!"></a></p>
                    @endif
                <div class="mb-4 pb-2">
                  
                    <button type="button" class="btn btn-outline-primary btn-floating">
                      <i class="fab fa-facebook-f fa-lg"></i>
                    </button>
                    <button type="button" class="btn btn-outline-primary btn-floating">
                      <i class="fab fa-twitter fa-lg"></i>
                    </button>
                    <button type="button" class="btn btn-outline-primary btn-floating">
                      <i class="fab fa-skype fa-lg"></i>
                    </button>
                  </div>
                  <!--<button type="button" class="btn btn-primary btn-rounded btn-lg">
                    Message now
                  </button>-->
                  <!--<div class="d-flex justify-content-between text-center mt-5 mb-2">
                    <div>
                      <p class="mb-2 h5">8471</p>
                      <p class="text-muted mb-0">Wallets Balance</p>
                    </div>
                    <div class="px-3">
                      <p class="mb-2 h5">8512</p>
                      <p class="text-muted mb-0">Income amounts</p>
                    </div>
                    <div>
                      <p class="mb-2 h5">4751</p>
                      <p class="text-muted mb-0">Total Transactions</p>
                    </div>
                  </div>-->
                </div>
                
              </div>
      
            </div>
          </div>
        </div>
      </section>
</div>
@endsection