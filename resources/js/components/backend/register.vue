<template>
  <div class="register-box offset-4">
    <div class="register-logo">
      <a href="../../index2.html"><b>Admin</b>Register</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form @submit.prevent="store()">
          <div class="input-group mb-3">
            <input type="text" v-model="form.name" class="form-control" placeholder="Full name" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" v-model="form.email"  class="form-control" placeholder="Email" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="number" v-model="form.phn"  class="form-control" placeholder="phone number" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" v-model="form.address"  class="form-control" placeholder="enter address" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input
             v-model="form.password"
              type="password"
              class="form-control"
              placeholder="Password"
            />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input
              v-model="form.re_password"
              type="password"
              class="form-control"
              placeholder="Retype password"
            />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input
                  type="checkbox"
                  id="agreeTerms"
                  name="terms"
                  value="agree"
                />
                <label for="agreeTerms">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">
                Register
              </button>
            </div>
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            Sign up using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign up using Google+
          </a>
        </div>

        <a href="login.html" class="text-center">I already have a membership</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name:"register",
    data(){
        return{
            form: new Form({
                name:"",
                email:"",
                phn:"",
                address:"",
                password:"",
                re_password:"",
            })
        }
    },
    methods:{
        store(){
            this.form.post('api/store')
            then((res)=>{
                console.log(res.data.data);
            })
        }
    }
};
</script>

<style>
</style>