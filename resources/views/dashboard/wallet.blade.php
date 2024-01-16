@extends('layouts.dashboard_main')
@section('title')
My Wallet
@endsection
@section('content')

<div class="page-title-area page-title-bg1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="service-card-one bg-white center">
                                <div class="icon">
                                    <i class="bx bx-laptop"></i>
                                    <i class='bx bxs-badge-check check-icon'></i>
                                </div>
                                <h3>
                                    <a href="javascript:void()">Naira Wallet</a>
                                </h3>
                                <p>₦{{number_format($wallet->naira_wallet), 2}}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="service-card-one bg-white center">
                                <div class="icon">
                                    <i class="bx bx-conversation"></i>
                                    <i class='bx bxs-badge-check check-icon'></i>
                                </div>
                                <h3>
                                    <a href="javascript:void()">LAT wallet</a>
                                </h3>
                                <p>{{number_format($wallet->lat_wallet), 2}} LAT</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shape-img2"><img src="/assets/img/shape/2.svg" alt="image"></div>
    <div class="shape-img3"><img src="/assets/img/shape/3.svg" alt="image"></div>
    <div class="shape-img4"><img src="/assets/img/shape/4.png" alt="image"></div>
    <div class="shape-img5"><img src="/assets/img/shape/5.png" alt="image"></div>
    <div class="shape-img7"><img src="/assets/img/shape/7.png" alt="image"></div>
    <div class="shape-img8"><img src="/assets/img/shape/8.png" alt="image"></div>
    <div class="shape-img9"><img src="/assets/img/shape/9.png" alt="image"></div>
    <div class="shape-img10"><img src="/assets/img/shape/10.png" alt="image"></div>
</div>
<!-- End Page Title Area -->
                        <div class="col-lg-6 col-md-6 mx-auto">
                            <div class="faq-accordion">
                                <ul class="accordion">
                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class="fas fa-plus"></i>
                                            What is LAT?
                                        </a>
                                        <p class="accordion-content">
                                            LAT means Lillyadd Token
                                        </p>
                                    </li>
                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class="fas fa-plus"></i>
                                            What is the value of LAT?
                                        </a>
                                        <p class="accordion-content">
                                            1LAT = 1Naira
                                        </p>
                                    </li>
                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class="fas fa-plus"></i>
                                            How can I withdraw my LAT?
                                        </a>
                                        <p class="accordion-content">
                                            Your LAT would be converted in bits (depending on the number of views you have) to Naira for every <strong>3  promotions/tasks</strong> you perform(Max of 100 LAT).
                                            And the Naira can then be withdrawn to your personal account.
                                        </p>
                                    </li>
                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class="fas fa-plus"></i>
                                            Why was there a reduction in my LAT wallet?
                                        </a>
                                        <p class="accordion-content">
                                            For every <strong>3 Promotions/tasks</strong> you perform, an amount of LAT would be moved from your LAT wallet to your Naira wallet(Max of 100 LAT).
                                        </p>
                                    </li>
                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class="fas fa-plus"></i>
                                            What other benefit do I gain with LAT?
                                        </a>
                                        <p class="accordion-content">
                                            You can also use your LAT to promote your business or brand on LILLYADD. Minimum of 12,000LAT.
                                        </p>
                                    </li>
                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class="fas fa-plus"></i>
                                            Can I earn more LAT?
                                        </a>
                                        <p class="accordion-content">
                                            Yes, You can earn more LAT. Some promotions/tasks you perform would make you earn LAT.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>

<!-- Start Checkout Area -->
<section class="checkout-area ptb-100">
    <div class="container">
        <!-- <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="user-actions">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Returning customer? <a href="#">Click here to login</a></span>
                </div>
            </div>
        </div> -->

        <div>
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-5">
                    <div class="billing-details">
                        <h3 class="title">Bank Details</h3>
                        <div class="row">

                            <form  method="POST" action="{{route('bank.update')}}">
                                 {{csrf_field()}}
                                 @if(Session::has('successbank'))
                                 <div class="col-md-12">
                                    <div class="alert alert-success no-b">
                                       <span class="text-semibold"></span> {{ Session::get('successbank')}}
                                       <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    </div>
                                 </div>
                                 @endif
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label>Bank Name<span class="required"></span></label>
                                    <div >
                                    <select name="account_bank" class="form-control selected_item">
                                        <option value="" selected>--Select Bank-- </option>

                                            <option value="Access Bank"> Access Bank</option>

                                            <option value="Access Bank (Diamond)"> Access Bank (Diamond)</option>

                                            <option value="ALAT by WEMA"> ALAT by WEMA</option>

                                            <option value="ASO Savings and Loans"> ASO Savings and Loans</option>

                                            <option value="CEMCS Microfinance Bank"> CEMCS Microfinance Bank</option>

                                            <option value="Citibank Nigeria"> Citibank Nigeria</option>

                                            <option value="Ecobank Nigeria"> Ecobank Nigeria</option>

                                            <option value="Ekondo Microfinance Bank"> Ekondo Microfinance Bank</option>

                                            <option value="Fidelity Bank"> Fidelity Bank</option>

                                            <option value="First Bank of Nigeria"> First Bank of Nigeria</option>

                                            <option value="First City Monument Bank"> First City Monument Bank</option>

                                            <option value="Globus Bank"> Globus Bank</option>

                                            <option value="Guaranty Trust Bank"> Guaranty Trust Bank</option>

                                            <option value="Heritage Bank"> Heritage Bank</option>

                                            <option value="Jaiz Bank"> Jaiz Bank</option>

                                            <option value="Keystone Bank"> Keystone Bank</option>

                                            <option value="Kuda Bank"> Kuda Bank</option>

                                            <option value="Parallex Bank"> Parallex Bank</option>

                                            <option value="Polaris Bank"> Polaris Bank</option>

                                            <option value="Providus Bank"> Providus Bank</option>

                                            <option value="Rubies MFB"> Rubies MFB</option>

                                            <option value="Sparkle Microfinance Bank"> Sparkle Microfinance Bank</option>

                                            <option value="Stanbic IBTC Bank"> Stanbic IBTC Bank</option>

                                            <option value="Standard Chartered Bank"> Standard Chartered Bank</option>

                                            <option value="Sterling Bank"> Sterling Bank</option>

                                            <option value="Suntrust Bank"> Suntrust Bank</option>

                                            <option value="TAJ Bank"> TAJ Bank</option>

                                            <option value="Titan Bank"> Titan Bank</option>

                                            <option value="Union Bank of Nigeria"> Union Bank of Nigeria</option>

                                            <option value="United Bank For Africa"> United Bank For Africa</option>

                                            <option value="Unity Bank"> Unity Bank</option>

                                            <option value="VFD"> VFD</option>

                                            <option value="Wema Bank"> Wema Bank</option>

                                            <option value="Zenith Bank"> Zenith Bank</option>

                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label>Account Name <span class="required"></span></label>
                                    <input type="text" class="form-control" name="account_name" value="{{Auth::user()->account_name}}">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Account Number <span class="required"></span></label>
                                    <input type="number" class="form-control"  name="account_number"  value="{{Auth::user()->account_number}}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <button class="default-btn order-btn" type="submit">Update Bank Information </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="order-details">
                        <div class="payment-box">
                            <div class="payment-method">
                                <p>
                                    <input type="radio"  name="radio" checked>

                                    <label for="lat-transfer">Available to send: {{number_format(Auth::user()->wallet->lat_wallet), 2}} LAT</label>
                                    Minimum transfer is 500LAT with 10% fees.`
                                </br>
                                You can share your LAT to your friends using this platform
                                </p>
                                <div class="row">

                                <form  method="POST" action="{{route('send.lat')}}">
                                 {{csrf_field()}}
                                 @if(Session::has('success'))
                                 <div class="col-md-12">
                                    <div class="alert alert-success no-b">
                                       <span class="text-semibold"></span> {{ Session::get('success')}}
                                       <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    </div>
                                 </div>
                                 @endif
                                 @if(Session::has('error'))
                                 <div class="col-md-12">
                                    <div class="alert alert-danger no-b">
                                       <span class="text-semibold"></span> {{ Session::get('error')}}
                                       <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    </div>
                                 </div>
                                 @endif
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>Amount to send <span class="required"></span></label>
                                            <input type="number" class="form-control" placeholder="Enter amount"  name="amount" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>Username or Email to send<span class="required"></span></label>
                                            <input type="email" class="form-control" placeholder="Enter E-mail" name="email"  required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="default-btn order-btn">Send LAT</button>
                        </form>
                        </div>
                        </div>
                        <div class="payment-box">
                            <div class="payment-method">
                                <p>
                                    <input type="radio" id="direct-bank-transfer" name="radio-group" checked>
                                    <label for="direct-bank-transfer">Available to withdraw: ₦{{number_format(Auth::user()->wallet->naira_wallet)}}</label>
                                <br>
                                    Kindly crosscheck your account details before making withdrawals.
                                    Minimum withdrawal is 1,000Naira.
                                </p>

                                <form  method="POST" action="{{route('withdraw.money')}}">
                                 {{csrf_field()}}
                                 @if(Session::has('walletwithdraw'))
                                 <div class="col-md-12">
                                    <div class="alert alert-success no-b">
                                       <span class="text-semibold"></span> {{ Session::get('walletwithdraw')}}
                                       <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    </div>
                                 </div>
                                 @endif
                                 @if(Session::has('danger'))
                                 <div class="col-md-12">
                                    <div class="alert alert-danger no-b">
                                       <span class="text-semibold"></span> {{ Session::get('danger')}}
                                       <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    </div>
                                 </div>
                                 @endif
                                <div class="row">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>Amount to withdraw <span class="required"></span></label>
                                            <input type="number" class="form-control" placeholder="Enter amount" name="amount">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="default-btn order-btn">Make withdrawal </button>
                        </div>
                      </form>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 mt-3">
                    <div class="order-details">
                        <h3 class="title">Your Withdrawals</h3>

                        <div class="order-table table-responsive">
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Reference</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date Requested</th>
                                        <th scope="col">Date Paid</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($debit_wallet_transactions) < 1)
                                    <tr>
                                        <p>No record currently available</p>
                                    </tr>
                                    @else
                                    @foreach($debit_wallet_transactions as $key=>$state)

                                        <tr>
                                            <td>{{++$key}}</td>

                                            <td>₦{{number_format($state->amount)}}</td>
                                            <td>{{$state->reference}}</td>
                                                <td>
                                                @if($state->status == 0)
                                                    <span

                                                         class= "unit-amount text-white badge badge-warning"
                                                    >Pending
                                                    </span>
                                                    @else
                                                    <span

                                                        class= "unit-amount text-white badge badge-success"
                                                   >Paid
                                                   </span>
                                                    @endif
                                                </td>

                                                <td>{{ date('M j, Y h:ia', strtotime($state->created_at)) }}</td>
                                                <td>{{ date('M j, Y h:ia', strtotime($state->updated_at)) }}</td>
                                            </tr>
                                            @endforeach
                                          @endif

                                    </tbody>

                            </table>
                            {{ $debit_wallet_transactions->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 mt-3">
                    <div class="order-details">
                        <h3 class="title">Your Transfer History</h3>

                        <div class="order-table table-responsive">
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Receiver</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($gifts_sent) < 1)
                                    <tr>
                                        <p>No record currently available</p>
                                    </tr>
                                    @else
                                    @foreach($gifts_sent as $key=>$state)

                                        <tr>
                                            <td>{{++$key}}</td>

                                            <td>{{number_format($state->amount)}} LAT</td>
                                            <td>{{ $state->receiver->username }}</td>
                                                <td>

                                                    <span

                                                         class= "unit-amount text-white badge badge-success"
                                                    >Success
                                                    </span>

                                                </td>

                                                <td>{{ date('M j, Y h:ia', strtotime($state->created_at)) }}</td>

                                            </tr>
                                            @endforeach
                                          @endif

                                    </tbody>

                            </table>
                            {{-- {{ $gifts_sent->links() }} --}}
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <div class="col-lg-12 col-md-12 mt-3">
                    <div class="order-details">
                        <h3 class="title">LAT Received </h3>

                        <div class="order-table table-responsive">
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Sender</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($gifts_received) < 1)
                                    <tr>
                                        <p>No record currently available</p>
                                    </tr>
                                    @else
                                    @foreach($gifts_received as $key=>$state)

                                        <tr>
                                            <td>{{++$key}}</td>

                                            <td>{{number_format($state->amount)}} LAT</td>
                                            <td>{{ $state->initiator->username }}</td>
                                                <td>

                                                    <span

                                                         class= "unit-amount text-white badge badge-success"
                                                    >Success
                                                    </span>

                                                </td>

                                                <td>{{ date('M j, Y h:ia', strtotime($state->created_at)) }}</td>

                                            </tr>
                                            @endforeach
                                          @endif

                                    </tbody>

                            </table>
                            {{-- {{ $gifts_received->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Checkout Area -->



@endsection
