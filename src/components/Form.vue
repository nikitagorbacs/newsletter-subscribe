<template>
  <h1>Subscribe to newsletter</h1>
  <p class="subheading">Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>
    <form
    method="post" 
    novalidate="true"
    @change="formValidation"
    >
    <div class="input-box">
        <input 
        class="input-field" 
        type="email" 
        placeholder="Type your email address here…" 
        v-model="email"
        />
        <input 
        type="submit" 
        class="submit-field"
        value="&#8594;"
        @click.prevent="submitForm"
        :class="{active: email && emailError == '' && checked}"
        />
    </div>
    <!-- <div v-for="error in errors" :key="error">
        <p class="error">{{ error }}</p>
    </div> -->
      <p v-if="emailError != ''" class="error"> {{ emailError }} </p>
      <p v-if="!checked" class="error"> {{ checkError }} </p>
    <div class="tos">
        <input type="checkbox" id="check" name="check" @click="checked = !checked">
        <div class="checkmark" name="checkmark"></div>
        <label for="check" class="tos-label">I agree to <a href="#">terms of service</a></label>
    </div>
    {{ submited }}
  </form>
</template>

<script>
import axios from 'axios'
    export default {
        data() {
            return {
                email: '',
                submited: false,
                emailError: '',
                checkError: '',
                checked: false
            }
        },
        methods: {
            submitForm(){
              if (!this.checked) {
                this.checkError = 'You must accept terms and conditions';
              }
              if(this.emailError == '' && this.checked){
                  axios
                  .post('http://localhost:8081/magebit-test-assignment/api/create.php', {
                      email: this.email
                  })
                  .then(response => {
                      this.submited = true
                      this.$emit('submited', this.submited)
                  })
              }
            },
            validEmail(email) {
              let reg = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
              return reg.test(email);
            }, 
            formValidation(e){
              //Check if email and checkbox are valid
              if(this.email == '') {
                this.emailError = 'Email address is required';
              }
              else if(!this.validEmail(this.email)){
                this.emailError = 'Please enter a valid email address';
              } else if(this.email.slice(-2) == 'co') {
                this.emailError = 'We are not accepting subscriptions from Colombia emails';
              } else {
                this.emailError = '';
              }
              e.preventDefault();     
            },
        },
    }
</script>

<style lang="sass" scoped>
  @import '@/assets/style/sass/_variables.sass'

  h1
    position: relative
    height: 44px
    margin-left: 140px
    margin-top: 234px
    font-family: Georgia
    font-size: 32px
    line-height: 44px

  .subheading
    position: relative
    width: 400px
    height: 56px
    margin-left: 140px
    margin-top: 15px
    font-size: 16px
    line-height: 28px
    color: $text-color

  .input-box
    position: relative
    display: flex
    width: 663px
    height: 70px
    margin-left: 100px
    margin-top: 50px

  .input-field
    width: 580px
    padding: 23px 44px
    font-size: 16px
    line-height: 24px
    border: 1px solid #E3E3E4
    box-sizing: border-box
    border-left: 4px solid $ui-color
    border-right: none
    &::placeholder
      color: $text-color

  .submit-field
    z-index: 1
    width: 83px
    background: #FFFFFF
    border: 1px solid #E3E3E4
    box-sizing: border-box
    border-left: none
    font-family: FontAwesome
    font-size: 24px
    color: rgba(19, 24, 33, 0.3)
    cursor: pointer

  .tos
    position: relative
    margin-left: 140px
    margin-top: 53px
    width: 400px
    height: 28px
    display: flex
    font-size: 16px
    line-height: 28px

  input[type="checkbox"]
    appearance: none
    -webkit-appearance: none
    background: #FFFFFF
    border: 1px solid #E3E3E4
    box-sizing: border-box
    border-radius: 3px
    width: 26px
    height: 26px
    transform: translateY(-1px) 
    display: flex
    align-items: center
    justify-content: center
    cursor: pointer
    &::after
      content: "\f00c"
      font-size: 12px
      font-family: FontAwesome
      color: #FFFFFF
    &:checked 
      background: $ui-color
      border: none

  .tos-label
    margin-left: 15px
    font-size: 16px
    color: $text-color
    a
      text-decoration-line: underline
      color: $heading-color
      &:hover
        color: $ui-color
      &:active
        color: #233759

  .error 
    position: relative
    margin-top: 5px
    color: red
    margin-left: 140px

  .active
    color: $ui-color

  @media screen and (max-width: 375px)
    h1
      margin-top: 0px
      margin-left: 0px
      font-size: 24px
      line-height: 34px
      height: 34px
    .subheading
      margin-bottom: 0px
      height: 52px
      width: 295px
      margin-top: 10px
      margin-left: 0px
      font-size: 14px
      line-height: 26px
    .input-box
      width: 295px
      height: 60px
      margin-top: 20px
      margin-left: 0px
    .input-field
      width: 256px
      padding: 18px 10px 18px 19px
    .submit-field
      width: 39px
    .tos
      width: 295px
      margin-left: 0px
      margin-top: 20px
</style>