<template>
  <div class="container">
    <div class="card cust-card row">
      <div class="card-body p-0">
        <div class="top"></div>
          <h3 class="card-title d-flex align-items-center name ml-4 mr-3 p-4" >{{ userReview.author_name }}</h3>
           <div class="stars">
              <i
                v-for="(i, index) in 5" :key="`full${index}`"
                :class="i < userReview.vote ? 'fas fa-star' : 'far fa-star' ">
              </i>
          </div>

          <p class="card-text pl-4 pr-4">{{ userReview.text }}</p>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Review",

  props: {
    "userReview": Object,
  }
}
</script>

<style scoped lang="scss">

</style>