      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
          <?=form_open('auth/login', array('class' => 'col s12'))?>
            <?=($this->session->flashdata('failed') ? '<div><b>'.$this->session->flashdata('failed').'</b></div>' : '')?>
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='username' id='username' required/>
                <label for='username'>Enter your username</label>
                <?=form_error("username")?>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' required/>
                <label for='password'>Enter your password</label>
                <?=form_error("password")?>
              </div>
              <div class="col s12">
                  <label style='float: left;'>
                    <input type="checkbox"  name="remember_me" />
                    <span style="font-size: .8rem;">Remember me</span>
                  </label>
                  <label style='float: right;'>
                    <a class='pink-text' href='<?=site_url('auth/forgot')?>'><b>Forgot Password?</b></a>
                  </label>
              </div>
              
              <!-- <label style='float: right;'>
								<a class='pink-text' href='#!'><b>Forgot Password?</b></a>
							</label> -->
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
              </div>
            </center>
          </form>
        </div>
      </div>
      <a href="#!">Create account</a>
