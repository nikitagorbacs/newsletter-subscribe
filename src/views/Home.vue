<template>
  <div id="home">
    <div class="main">
      <div class="header">
        <div class="desktop-logo"><img src="../assets/img/logo_pineapple.svg" alt="logo"></div>
        <div class="mobile-logo"><img src="../assets/img/logo.svg" alt="logo"></div>
        <ul class="nav-menu">
          <li><a href="#">About</a></li>
          <li><a href="#">How it works</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div class="content">
        <div v-if="!submited">
            <Form @submited="checkIfSubmited"/>
        </div>
        <div v-if="submited">
            <Success />
        </div>
        <div class="line"></div>
        <div class="social-icons">
            <a href="#" class="icon facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="icon instagram">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="icon twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="icon youtube">
                <i class="fab fa-youtube"></i>
            </a>
        </div>
      </div>
    </div>
    <div class="right-background"></div>
  </div>
</template>

<script>
import Form from '../components/Form.vue';
import Success from '../components/Success.vue';
export default {
  name: 'Home',
  components: {
    Form,
    Success
  },
  data() {
    return {
      data: null,
      submited: false
    }
  },
  methods: {
    checkIfSubmited(value){
      this.submited = value
    }
  },
}
</script>

<style lang="sass">
  @import '@/assets/style/sass/_variables.sass'
  *
    font-family: Arial
    font-style: normal
    font-weight: normal
  .right-background
    position: absolute
    width: 1240px
    min-height: 1080px
    left: 680px
    background: url('../assets/img/image_summer.png') no-repeat
  .main
    position: absolute
    top: 0px
    left: 0px
    width: 680px
    height: 1080px
    background: linear-gradient(180deg, #FFFFFF 0%, #F2F5FA 100%)
  .header
    position: relative
    width: 482px
    height: 40px
    margin-top: 100px
    margin-left: 100px
    display: flex

  .nav-menu
    list-style: none
    display: flex
    justify-content: space-between
    width: 249px
    margin-left: 113px
    a
      text-decoration: none
      width: 42px
      height: 26px
      color: $text-color
      font-size: 16px
      line-height: 26px

  .desktop-logo
    float: left

  .mobile-logo
    display: none

  .line
    position: relative
    width: 400px
    height: 1px
    margin-left: 140px
    margin-top: 50px
    background: #E3E3E4

  .social-icons
    position: relative
    display: flex
    justify-content: space-between
    width: 244px
    height: 46px
    margin-left: 218px
    margin-top: 50px

  .icon
    width: 46px
    height: 46px
    border: 2px solid #E3E3E4
    box-sizing: border-box
    border-radius: 50%
    &:hover
      box-shadow: 0px 20px 40px rgba(19, 24, 33, 0.3)
    i
      position: relative
      top: 50%
      left: 50%
      transform: translate(-50%,-50%)
      color: #131821
      opacity: 0.3
    &:hover i, &:active a
      color: #FFFFFF
      opacity: 1

  .facebook
    &:hover
      background: #4267B2
    &:active
      background: #2F4A80

  .instagram
    &:hover
      background: #C13584
    &:active
      background: #8F2762

  .twitter
    &:hover
      background: #1DA1F2
    &:active
      background: #177FBF

  .youtube
    &:hover
      background: #FF0000
    &:active
      background: #CC0000

  @media screen and (max-width: 375px)
    .main
      max-width: 375px
    .header
      width: 335px
      height: 66px
      margin-top: 0px
      margin-left: 0px
      margin-right: 0px
      padding: 10px 20px 16px 20px
    .right-background
      max-width: 375px
      height: 746px
      left: 0px
      top: 66px
      background-position: center
    .desktop-logo
      display: none
    .mobile-logo
      float: left
      width: 25px
      height: 40px
      display: inline-flex
    .nav-menu
      padding: 0px
      width: 206px
      margin-left: 104px
      a
        font-size: 14px
        line-height: 24px
    .content
      box-sizing: border-box
      position: absolute
      z-index: 1
      background: linear-gradient(180deg, #FFFFFF 0%, #F2F5FA 100%)
      width: 335px
      height: 371px
      left: 20px
      top: 254px
      padding: 30px 20px
    .line
      width: 295px
      height: 1px
      margin-left: 0px
      margin-top: 20px
    .social-icons
      margin-top: 20px
      margin-left: 33px
      width: 214px
      height: 46px
</style>
