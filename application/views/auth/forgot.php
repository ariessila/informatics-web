
<div class="container">
  <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
    <?=form_open('auth/forgot', array('class' => 'col s12'))?>
      <?=($this->session->flashdata('failed') ? '<div><b>'.$this->session->flashdata('failed').'</b></div>' : '')?>
      <div class='row'>
        <div class='input-field col s12'>
          <input class='validate' type='email' name='email' id='email' required/>
          <label for='email'>Enter your Email</label>
          <?=form_error("email")?>
        </div>
      </div>
      <br />
      <center>
        <div class='row'>
          <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Submit</button>
        </div>
      </center>
    </form>
  </div>
</div>
      