<template>
  <div class="container">
    <!-- <img :src="freelancerCard.image" alt=""> -->

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
          <span><h3>{{ freelancerCard.name }}</h3></span>
          <span><h3>{{ freelancerCard.lastname }}</h3></span>
        </h5>
        <p class="card-text">{{ freelancerCard.description_job }}</p>
        <a href="#" class="btn btn-primary">Vai al profilo</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "FreelancerCard",

  props: {
    "freelancerCard": Object,
  }
}
</script>

<style scoped lang="scss">

</style>