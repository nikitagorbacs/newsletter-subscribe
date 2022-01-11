<template>
    <div class="success-message">
      <img src="../assets/img/ic_success.svg" alt="">
      <h2>Thanks for subscribing!</h2>
      <p class="subheading">You have successfully subscribed to our email listing. Check your email for the discount code.</p>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="sass" scoped>
  @import '@/assets/style/sass/_variables.sass'
  .success-message
    position: relative
    margin-top: 129px
    margin-left: 140px
    width: 400px
    height: 220px
  h2
    position: relative
    font-family: Georgia
    font-size: 32px
    line-height: 44px
    margin-top: 30px
    color: $heading-color

  .subheading
    margin-top: 20px
    font-size: 16px
    line-height: 28px
    color: $text-color

  @media screen and (max-width: 375px)
    .success-message
      margin-top: 0px
      margin-left: 0px
      width: 295px
      height: 205px

    h2
      font-size: 24px
      line-height: 34px
      margin-top: 39px

    .subheading
      width: 295px
      margin-top: 10px
      font-size: 14px
      line-height: 26px
    
</style>