@extends('layouts.frontend')
@section('css')

@endsection
@section('front')
    <div class="breadcrumb" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>


    <div class="body-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <!-- checkout-step-01  -->
                    <div class="panel">
                        <!-- panel-body  -->

                        <div class="row">

                            <!-- Checkout-Form -->
                            <div class="container wrapper">
                                <div class="row cart-head">
                                    <div class="container">
                                        <div class="row">
                                            <p></p>
                                        </div>

                                        <div class="row">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row cart-body">
                                    <form class="form-horizontal" method="post" action="{{route('user.order.save')}}" >
                                        @csrf
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                                            <!--REVIEW ORDER-->
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    Review Order <div class="pull-right"><small><a class="afix-1" href="#">Edit Cart</a></small>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <?php
                                                    $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                                                    $counts = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                                                    $sub = \Gloudemans\Shoppingcart\Facades\Cart::content()->sum('price');
                                                    ?>
                                                    @if($counts > 0)
                                                        @foreach($carts as $crt)
                                                            <div class="form-group">
                                                                <div class="col-sm-3 col-xs-3">
                                                                    <img class="img-responsive" src="{{asset($crt->options->image)}}" style="height: 100px;width: 100px;" />
                                                                </div>
                                                                <div class="col-sm-6 col-xs-6">
                                                                    <div class="col-xs-12">{{$crt->name}}</div>
                                                                    <div class="col-xs-12"><small>Quantity:<span>{{$crt->qty}}</span></small></div>
                                                                </div>
                                                                <div class="col-sm-3 col-xs-3 text-right">
                                                                    <h6><span>$</span>{{$crt->subTotal()}}</h6>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <hr />
                                                            </div>
                                                        @endforeach
                                                    @endif


                                                    <div class="form-group">
                                                        <div class="col-xs-12">
                                                            <strong>Subtotal</strong>
                                                            <div class="pull-right"><span>$</span><span>{{\Gloudemans\Shoppingcart\Facades\Cart::subTotal()}}</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <hr />
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-12">
                                                            <strong>Order Total</strong>
                                                            <div class="pull-right"><span>$</span><span>{{\Gloudemans\Shoppingcart\Facades\Cart::subTotal()}}</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--REVIEW ORDER END-->
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                                            <!--SHIPPING METHOD-->
                                            <div class="panel panel-info">
                                                <div class="panel-heading">Address</div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <h4>Shipping Address</h4>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12 col-xs-12">
                                                            <strong>Name:</strong>
                                                            <?php
                                                            $name=\Gloudemans\Shoppingcart\Facades\Cart::subtotal();
                                                            $result = str_replace(',', '', $name);
                                                            ?>
                                                            <input type="text" name="name" class="form-control" value="" />
                                                            <input type="hidden" name="total_amount" class="form-control totalamount" value="{{$result}}" />
                                                        </div>
                                                        <div class="span1"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-xs-12">
                                                            <strong>Email:</strong>
                                                            <input type="text" name="first_name" class="form-control email" value="" />
                                                        </div>
                                                        <div class="span1"></div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <strong>Phone:</strong>
                                                            <input type="text" name="last_name" class="form-control phone" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12"><strong>Country:</strong></div>
                                                        <div class="col-md-12">
                                                            <select name="country" class="form-control">
                                                                <option value="Afghanistan">Afghanistan</option>
                                                                <option value="Åland Islands">Åland Islands</option>
                                                                <option value="Albania">Albania</option>
                                                                <option value="Algeria">Algeria</option>
                                                                <option value="American Samoa">American Samoa</option>
                                                                <option value="Andorra">Andorra</option>
                                                                <option value="Angola">Angola</option>
                                                                <option value="Anguilla">Anguilla</option>
                                                                <option value="Antarctica">Antarctica</option>
                                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                                <option value="Argentina">Argentina</option>
                                                                <option value="Armenia">Armenia</option>
                                                                <option value="Aruba">Aruba</option>
                                                                <option value="Australia">Australia</option>
                                                                <option value="Austria">Austria</option>
                                                                <option value="Azerbaijan">Azerbaijan</option>
                                                                <option value="Bahamas">Bahamas</option>
                                                                <option value="Bahrain">Bahrain</option>
                                                                <option value="Bangladesh">Bangladesh</option>
                                                                <option value="Barbados">Barbados</option>
                                                                <option value="Belarus">Belarus</option>
                                                                <option value="Belgium">Belgium</option>
                                                                <option value="Belize">Belize</option>
                                                                <option value="Benin">Benin</option>
                                                                <option value="Bermuda">Bermuda</option>
                                                                <option value="Bhutan">Bhutan</option>
                                                                <option value="Bolivia">Bolivia</option>
                                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                                <option value="Botswana">Botswana</option>
                                                                <option value="Bouvet Island">Bouvet Island</option>
                                                                <option value="Brazil">Brazil</option>
                                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                                <option value="Bulgaria">Bulgaria</option>
                                                                <option value="Burkina Faso">Burkina Faso</option>
                                                                <option value="Burundi">Burundi</option>
                                                                <option value="Cambodia">Cambodia</option>
                                                                <option value="Cameroon">Cameroon</option>
                                                                <option value="Canada">Canada</option>
                                                                <option value="Cape Verde">Cape Verde</option>
                                                                <option value="Cayman Islands">Cayman Islands</option>
                                                                <option value="Central African Republic">Central African Republic</option>
                                                                <option value="Chad">Chad</option>
                                                                <option value="Chile">Chile</option>
                                                                <option value="China">China</option>
                                                                <option value="Christmas Island">Christmas Island</option>
                                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                                <option value="Colombia">Colombia</option>
                                                                <option value="Comoros">Comoros</option>
                                                                <option value="Congo">Congo</option>
                                                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                                <option value="Cook Islands">Cook Islands</option>
                                                                <option value="Costa Rica">Costa Rica</option>
                                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                                <option value="Croatia">Croatia</option>
                                                                <option value="Cuba">Cuba</option>
                                                                <option value="Cyprus">Cyprus</option>
                                                                <option value="Czech Republic">Czech Republic</option>
                                                                <option value="Denmark">Denmark</option>
                                                                <option value="Djibouti">Djibouti</option>
                                                                <option value="Dominica">Dominica</option>
                                                                <option value="Dominican Republic">Dominican Republic</option>
                                                                <option value="Ecuador">Ecuador</option>
                                                                <option value="Egypt">Egypt</option>
                                                                <option value="El Salvador">El Salvador</option>
                                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                <option value="Eritrea">Eritrea</option>
                                                                <option value="Estonia">Estonia</option>
                                                                <option value="Ethiopia">Ethiopia</option>
                                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                                <option value="Faroe Islands">Faroe Islands</option>
                                                                <option value="Fiji">Fiji</option>
                                                                <option value="Finland">Finland</option>
                                                                <option value="France">France</option>
                                                                <option value="French Guiana">French Guiana</option>
                                                                <option value="French Polynesia">French Polynesia</option>
                                                                <option value="French Southern Territories">French Southern Territories</option>
                                                                <option value="Gabon">Gabon</option>
                                                                <option value="Gambia">Gambia</option>
                                                                <option value="Georgia">Georgia</option>
                                                                <option value="Germany">Germany</option>
                                                                <option value="Ghana">Ghana</option>
                                                                <option value="Gibraltar">Gibraltar</option>
                                                                <option value="Greece">Greece</option>
                                                                <option value="Greenland">Greenland</option>
                                                                <option value="Grenada">Grenada</option>
                                                                <option value="Guadeloupe">Guadeloupe</option>
                                                                <option value="Guam">Guam</option>
                                                                <option value="Guatemala">Guatemala</option>
                                                                <option value="Guernsey">Guernsey</option>
                                                                <option value="Guinea">Guinea</option>
                                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                                <option value="Guyana">Guyana</option>
                                                                <option value="Haiti">Haiti</option>
                                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                                <option value="Honduras">Honduras</option>
                                                                <option value="Hong Kong">Hong Kong</option>
                                                                <option value="Hungary">Hungary</option>
                                                                <option value="Iceland">Iceland</option>
                                                                <option value="India">India</option>
                                                                <option value="Indonesia">Indonesia</option>
                                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                                <option value="Iraq">Iraq</option>
                                                                <option value="Ireland">Ireland</option>
                                                                <option value="Isle of Man">Isle of Man</option>
                                                                <option value="Israel">Israel</option>
                                                                <option value="Italy">Italy</option>
                                                                <option value="Jamaica">Jamaica</option>
                                                                <option value="Japan">Japan</option>
                                                                <option value="Jersey">Jersey</option>
                                                                <option value="Jordan">Jordan</option>
                                                                <option value="Kazakhstan">Kazakhstan</option>
                                                                <option value="Kenya">Kenya</option>
                                                                <option value="Kiribati">Kiribati</option>
                                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                                <option value="Kuwait">Kuwait</option>
                                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                                <option value="Latvia">Latvia</option>
                                                                <option value="Lebanon">Lebanon</option>
                                                                <option value="Lesotho">Lesotho</option>
                                                                <option value="Liberia">Liberia</option>
                                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                                <option value="Liechtenstein">Liechtenstein</option>
                                                                <option value="Lithuania">Lithuania</option>
                                                                <option value="Luxembourg">Luxembourg</option>
                                                                <option value="Macao">Macao</option>
                                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                                <option value="Madagascar">Madagascar</option>
                                                                <option value="Malawi">Malawi</option>
                                                                <option value="Malaysia">Malaysia</option>
                                                                <option value="Maldives">Maldives</option>
                                                                <option value="Mali">Mali</option>
                                                                <option value="Malta">Malta</option>
                                                                <option value="Marshall Islands">Marshall Islands</option>
                                                                <option value="Martinique">Martinique</option>
                                                                <option value="Mauritania">Mauritania</option>
                                                                <option value="Mauritius">Mauritius</option>
                                                                <option value="Mayotte">Mayotte</option>
                                                                <option value="Mexico">Mexico</option>
                                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                                <option value="Monaco">Monaco</option>
                                                                <option value="Mongolia">Mongolia</option>
                                                                <option value="Montenegro">Montenegro</option>
                                                                <option value="Montserrat">Montserrat</option>
                                                                <option value="Morocco">Morocco</option>
                                                                <option value="Mozambique">Mozambique</option>
                                                                <option value="Myanmar">Myanmar</option>
                                                                <option value="Namibia">Namibia</option>
                                                                <option value="Nauru">Nauru</option>
                                                                <option value="Nepal">Nepal</option>
                                                                <option value="Netherlands">Netherlands</option>
                                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                                <option value="New Caledonia">New Caledonia</option>
                                                                <option value="New Zealand">New Zealand</option>
                                                                <option value="Nicaragua">Nicaragua</option>
                                                                <option value="Niger">Niger</option>
                                                                <option value="Nigeria">Nigeria</option>
                                                                <option value="Niue">Niue</option>
                                                                <option value="Norfolk Island">Norfolk Island</option>
                                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                                <option value="Norway">Norway</option>
                                                                <option value="Oman">Oman</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Palau">Palau</option>
                                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                                <option value="Panama">Panama</option>
                                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                                <option value="Paraguay">Paraguay</option>
                                                                <option value="Peru">Peru</option>
                                                                <option value="Philippines">Philippines</option>
                                                                <option value="Pitcairn">Pitcairn</option>
                                                                <option value="Poland">Poland</option>
                                                                <option value="Portugal">Portugal</option>
                                                                <option value="Puerto Rico">Puerto Rico</option>
                                                                <option value="Qatar">Qatar</option>
                                                                <option value="Reunion">Reunion</option>
                                                                <option value="Romania">Romania</option>
                                                                <option value="Russian Federation">Russian Federation</option>
                                                                <option value="Rwanda">Rwanda</option>
                                                                <option value="Saint Helena">Saint Helena</option>
                                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                <option value="Saint Lucia">Saint Lucia</option>
                                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                                <option value="Samoa">Samoa</option>
                                                                <option value="San Marino">San Marino</option>
                                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                <option value="Senegal">Senegal</option>
                                                                <option value="Serbia">Serbia</option>
                                                                <option value="Seychelles">Seychelles</option>
                                                                <option value="Sierra Leone">Sierra Leone</option>
                                                                <option value="Singapore">Singapore</option>
                                                                <option value="Slovakia">Slovakia</option>
                                                                <option value="Slovenia">Slovenia</option>
                                                                <option value="Solomon Islands">Solomon Islands</option>
                                                                <option value="Somalia">Somalia</option>
                                                                <option value="South Africa">South Africa</option>
                                                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                                <option value="Spain">Spain</option>
                                                                <option value="Sri Lanka">Sri Lanka</option>
                                                                <option value="Sudan">Sudan</option>
                                                                <option value="Suriname">Suriname</option>
                                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                                <option value="Swaziland">Swaziland</option>
                                                                <option value="Sweden">Sweden</option>
                                                                <option value="Switzerland">Switzerland</option>
                                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                                <option value="Tajikistan">Tajikistan</option>
                                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                                <option value="Thailand">Thailand</option>
                                                                <option value="Timor-leste">Timor-leste</option>
                                                                <option value="Togo">Togo</option>
                                                                <option value="Tokelau">Tokelau</option>
                                                                <option value="Tonga">Tonga</option>
                                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                                <option value="Tunisia">Tunisia</option>
                                                                <option value="Turkey">Turkey</option>
                                                                <option value="Turkmenistan">Turkmenistan</option>
                                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                                <option value="Tuvalu">Tuvalu</option>
                                                                <option value="Uganda">Uganda</option>
                                                                <option value="Ukraine">Ukraine</option>
                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="United States">United States</option>
                                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                                <option value="Uruguay">Uruguay</option>
                                                                <option value="Uzbekistan">Uzbekistan</option>
                                                                <option value="Vanuatu">Vanuatu</option>
                                                                <option value="Venezuela">Venezuela</option>
                                                                <option value="Viet Nam">Viet Nam</option>
                                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                                <option value="Western Sahara">Western Sahara</option>
                                                                <option value="Yemen">Yemen</option>
                                                                <option value="Zambia">Zambia</option>
                                                                <option value="Zimbabwe">Zimbabwe</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12"><strong>Address:</strong></div>
                                                        <div class="col-md-12">
                                                            <textarea type="text" name="address" class="form-control address" value="" ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12"><strong>City:</strong></div>
                                                        <div class="col-md-12">
                                                            <input type="text" name="city" class="form-control city" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12"><strong>State:</strong></div>
                                                        <div class="col-md-12">
                                                            <input type="text" name="state" class="form-control state" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                                        <div class="col-md-12">
                                                            <input type="text" name="zip_code" class="form-control zip" value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--SHIPPING METHOD END-->
                                            <!--CREDIT CART PAYMENT-->
                                            <div class="panel panel-info">
                                                <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-xs-12">
                                                            <strong>Card Name</strong>
                                                            <input type="text" class="form-control" id="billing-name" name="name" placeholder="Card Name" autocomplete="off" autofocus>
                                                        </div>
                                                        <div class="span1"></div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <strong>Card Number</strong>
                                                            <input type="tel" class="form-control" name="cardNumber" placeholder="Valid Card Number" autocomplete="off" required autofocus
                                                            />
                                                        </div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <strong>Expiration Date</strong>
                                                            <input type="tel" class="form-control" name="cardExpiry" placeholder="MM / YYYY" autocomplete="off" required
                                                            />
                                                        </div>
                                                        <div class="span1"></div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <strong>Card CVC</strong>
                                                            <input type="tel" class="form-control" name="cardCVC" placeholder="CVC" autocomplete="off" required
                                                            />
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <span>Pay secure using your credit card.</span>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <ul class="cards">
                                                                <li class=" hand"> <img src="assets/images/payments/1.png" alt=""> </li>
                                                                <li class=" hand"> <img src="assets/images/payments/2.png" alt=""> </li>
                                                                <li class="hand"> <img src="assets/images/payments/4.png" alt=""> </li>
                                                                <li class="hand"> <img src="assets/images/payments/3.png" alt=""> </li>
                                                            </ul>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 m-t-10">
                                                            <button type="submit" class="btn btn-primary">Place Order</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--CREDIT CART PAYMENT END-->
                                        </div>

                                    </form>
                                </div>
                                <div class="row cart-footer">

                                </div>
                            </div>

                            <!-- ./Checkout-Form -->


                        </div>

                        <!-- panel-body  -->

                    </div><!-- row -->


                </div><!-- /.row -->
            </div><!-- /.checkout-box -->

        </div><!-- /.container -->
    </div>

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('assets/stripe/payvalid.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/stripe/paymin.js') }}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ asset('assets/stripe/payform.js') }}"></script>
    <script type="text/javascript" src="https://rawgit.com/jessepollak/card/master/dist/card.js"></script>
    <script>
        (function ($) {
            $(document).ready(function () {
                var card = new Card({
                    form: '#payment-form',
                    container: '.card-wrapper',
                    formSelectors: {
                        numberInput: 'input[name="cardNumber"]',
                        expiryInput: 'input[name="cardExpiry"]',
                        cvcInput: 'input[name="cardCVC"]',
                        nameInput: 'input[name="name"]'
                    }
                });
            });
        })(jQuery);
    </script>
@endsection
