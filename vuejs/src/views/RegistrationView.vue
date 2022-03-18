<template>
  <div class="form-wrapper">
    <h3>Register and create notes</h3>
    <form @submit.prevent="register" action="">
      <div v-if="errors" class="errors">
        <p v-for="(error, field) in errors" :key="field">
          {{error[0]}}
        </p>
      </div>
      <input type="text" v-model="form.username" placeholder="Your username"><br>
      <input type="password" v-model="form.password" placeholder="Your password"><br>
      <input type="password" v-model="form.password_repeat" placeholder="Repeat password"><br>
      <button>Register</button>
      <router-link to="/login" class="link">Click here to login</router-link>
    </form>
  </div>
</template>

<script>

export default {

  name: "RegistrationView",
  data() {
    return {
      form: {
        username: '',
        password: '',
        password_repeat: ''
      },
      errors: null
    }
  },
}
</script>

<style lang="scss" scoped>

</style>