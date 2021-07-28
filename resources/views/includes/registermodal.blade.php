<!-- start Register Modal -->
<div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Create your account for free</h4>
    </div>

    <form action="{{ route('register') }}" method="POST">
        {{ csrf_field() }}
        <div class="modal-body">
        
            <div class="row gap-20">
            
                <div class="col-sm-12 col-md-12">
        
                    <div class="form-group"> 
                        <label>First Name</label>
                        <input name="firstname" class="form-control" placeholder="First Name" type="text" required> 
                    </div>
                
                </div>

                <div class="col-sm-12 col-md-12">
        
                    <div class="form-group"> 
                        <label>Last Name</label>
                        <input name="lastname" class="form-control" placeholder="Last Name" type="text" required> 
                    </div>
                
                </div>
                
                <div class="col-sm-12 col-md-12">
        
                    <div class="form-group"> 
                        <label>Email Address</label>
                        <input name="email" class="form-control" placeholder="Enter your email address" type="email" required> 
                    </div>
                
                </div>
                
                <div class="col-sm-12 col-md-12">
                
                    <div class="form-group"> 
                        <label>Password</label>
                        <input name="password" class="form-control" placeholder="Min 8 and Max 20 characters" type="password" required> 
                    </div>
                
                </div>
                
                <div class="col-sm-12 col-md-12">
                
                    <div class="form-group"> 
                        <label>Password Confirmation</label>
                        <input name="password-confirm" class="form-control" placeholder="Re-type password again" type="password"> 
                    </div>
                </div>

                <div class="col-sm-12 col-md-12">
                    <div class="form-group"> 
                        <label>Address</label>
                        <input name="address" class="form-control" placeholder="Enter your address" type="text" required> 
                    </div>
                </div>

                <div class="col-sm-12 col-md-12">
                    <div class="form-group"> 
                        <label>City</label>
                        <input name="city" class="form-control" placeholder="Enter your city" type="text" required> 
                    </div>
                </div>

                <div class="col-sm-12 col-md-12">
                    <div class="form-group"> 
                        <label>State</label>
                        <select name="state_id" class="form-control" required>
                            <option >Select state</option>
                            @php
                                $states = DB::table('states')->get();
                            @endphp
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">
                                    {{ $state->state_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12">
                    <div class="form-group"> 
                        <label>Date</label>
                        <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" required autofocus>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-12">
                    <div class="checkbox-block"> 
                        <input id="register_accept_checkbox" name="register_accept_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
                        <label class="" for="register_accept_checkbox" required>
                            By register, I read &amp; accept <a href="#">the terms</a>
                        </label>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-12">
                    <div class="login-box-box-action">
                        Already have account? <a data-toggle="modal" href="#loginModal">Log-in</a>
                    </div>
                </div>
                
            </div>
        
        </div>
        
        <div class="modal-footer text-center">
            <button type="submit" class="btn btn-primary">Register</button>
            <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>
        </div>
    </form>
    
</div>
<!-- end Register Modal -->