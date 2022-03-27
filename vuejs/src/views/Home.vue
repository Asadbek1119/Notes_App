<template>
  <div class="home">
    <notes />
  </div>
</template>

<script>
// @ is an alias to /src
import Notes from "../components/Notes";
export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: 'Home',
  components: {
    Notes
  }
}
</script>