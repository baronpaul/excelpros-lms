<!-- start Sign-in Modal -->
<div id="loginModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Sign-in into your account</h4>
    </div>

    <form action="{{ route('login') }}" method="post" id="loginForm">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="row gap-20">

                <div  id="error_msg_wrap">
                    
                </div>
                
                
                <div class="col-sm-12 col-md-12">
        
                    <div class="form-group"> 
                        <label>Email</label>
                        <input name="email" id="email" class="form-control" placeholder="user@domain.com" type="text"> 
                    </div>
                
                </div>
                
                <div class="col-sm-12 col-md-12">
                
                    <div class="form-group"> 
                        <label>Password</label>
                        <input name="password" id="password" class="form-control" placeholder="password" type="password"> 
                    </div>
                
                </div>
                
                <div class="col-sm-6 col-md-6">
                    <div class="checkbox-block"> 
                        <input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
                        <label class="" for="remember_me_checkbox">Remember me</label>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-6">
                    <div class="login-box-link-action">
                        <a data-toggle="modal" href="#forgotPasswordModal">Forgot password?</a> 
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-12">
                    <div class="login-box-box-action">
                        No account? <a data-toggle="modal" href="#registerModal">Register</a>
                    </div>
                </div>
                
            </div>
        </div>
        
        <div class="modal-footer text-center">
            <button type="submit" class="btn btn-primary" id="submit_btn">Log-in</button>
            <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>
        </div>
    </form>
    
</div>
<!-- end Sign-in Modal -->