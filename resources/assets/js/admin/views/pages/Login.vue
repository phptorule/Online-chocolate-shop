<template>
    <div class="app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-group">
                        <div class="card p-4">
                            <div class="card-body">
                                <h1>Login</h1>
                                <p class="text-muted">Sign In to your account</p>
                                <form v-on:submit.prevent = "handleLogin">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-addon"><i class="icon-user"></i></span>
                                            <input type="text" class="form-control" placeholder="Email" v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }">
                                        </div>
                                        <small id="emailHelp" class="form-text text-danger" v-if="form.errors.has('email')" v-html="form.errors.get('email')"></small>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                                            <input type="password" class="form-control" placeholder="Password" v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }">
                                        </div>
                                        <small id="emailHelp" class="form-text text-danger" v-if="form.errors.has('password')" v-html="form.errors.get('password')"></small>
                                    </div>
                                    <div class="input-group mb-5" v-if="form.errors.any()">
                                        <div class="alert alert-danger" role="alert">
                                            {{ form.errors.message }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary px-4">Login</button>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="button" class="btn btn-link px-0">Forgot password?</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                            <div class="card-body text-center">
                                <div>
                                    <h2>Sign up</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <button type="button" class="btn btn-primary active mt-3">Register Now!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { clientId, clientSecret } from "../../../env";
export default {
  name: "Login",
  data() {
    return {
      form: new Form({
        email: "",
        password: ""
      })
    };
  },
  methods: {
    handleLogin() {
        let data = this;
        this.$auth.login({
            data: {email: this.form.email, password: this.form.password}
        }).catch(function(error) {
            data.error = 'E-mail or password is incorrect';
        });
    }
  }
};
</script>
