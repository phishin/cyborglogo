<template>
  <div>
    <section id="posts" class="flex md:flex-row flex-col items-center justify-between">
      <p class="font-serif text-4xl text-brand-dark md:pb-0 pb-6">Most Recent Newsletters</p>
      <div class="flex sm:flex-row flex-col items-center">
        <sort @sort="sort"></sort>
      </div>
    </section>

    <section class="grid lg:grid-cols-3 sm:grid-cols-2 gap-8 py-20">
      <post :hide-categories="true" v-for="post in paginatedPosts.slice(0, 3)" :post="post" :key="post.filename"></post>
    </section>

    <section class="py-16 border border-brand-grey-250 rounded-12">
      <div class="flex md:flex-row flex-col items-center justify-between md:w-4/5 w-mobile mx-auto">
        <p class="font-serif text-4xl text-brand-dark md:pb-0 pb-6 md:text-left text-center">Subscribe to Our Monthly Newsletter</p>
          <div class="md:w-1/2 w-full">
            <subscribe-form form="form-id-here"></subscribe-form>
          </div>
      </div>
    </section>

    <section class="py-20 grid lg:grid-cols-3 sm:grid-cols-2 gap-8" v-if="paginatedPosts.length > 3">
      <post v-for="post in paginatedPosts.slice(3)" :post="post" :key="post.filename"></post>
    </section>

    <section class="flex items-center justify-between w-full">
      <a v-if="page > 1" href="#posts" class="cursor-pointer text-brand-dark tracking-lg transition-fast flex items-center" @click="handlePrevious()">
        <svg class="mr-3 transform rotate-180" xmlns="http://www.w3.org/2000/svg" width="6.306" height="11.029" viewBox="0 0 6.306 11.029">
          <path id="Icon_ionic-ios-arrow-down" data-name="Icon ionic-ios-arrow-down" d="M11.7,15.651l4.17-4.173a.785.785,0,0,1,1.113,0,.8.8,0,0,1,0,1.116l-4.725,4.728a.787.787,0,0,1-1.087.023L6.417,12.6A.788.788,0,1,1,7.53,11.481Z" transform="translate(-11.246 17.216) rotate(-90)" fill="#01182f"/>
        </svg>
        PREVIOUS PAGE
      </a>
      <a v-if="page < pages" href="#posts" class="cursor-pointer text-brand-dark tracking-lg transition-fast flex items-center ml-auto" @click="handleNext()">
        NEXT PAGE
        <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="6.306" height="11.029" viewBox="0 0 6.306 11.029">
          <path id="Icon_ionic-ios-arrow-down" data-name="Icon ionic-ios-arrow-down" d="M11.7,15.651l4.17-4.173a.785.785,0,0,1,1.113,0,.8.8,0,0,1,0,1.116l-4.725,4.728a.787.787,0,0,1-1.087.023L6.417,12.6A.788.788,0,1,1,7.53,11.481Z" transform="translate(-11.246 17.216) rotate(-90)" fill="#01182f"/>
        </svg>
      </a>
    </section>
  </div>
</template>

<script>

import Categories from "./filters/Categories";
import Sort from "./filters/Sort";
import Post from "./Post";
import PrimitiveForm from "../PrimitiveForm";
import SubscribeForm from "./SubscribeForm";
export default {
  components: {SubscribeForm, PrimitiveForm, Post, Sort, Categories},
  props: {
    posts: {
      type: Array,
      required: true
    },

    perPage: {
      type: Number,
      required: true
    }
  },
  data() {
    return {
      sortBy: '',

      page: 1,
      newsletters: [],
    }
  },
  methods: {
    sort(sortBy) {
      this.sortBy = sortBy;
      this.page = 1;
    },

    handleNext() {
      this.page++
    },

    handlePrevious() {
      this.page--
    }
  },
  mounted() {
    this.newsletters = this.posts.filter( post => post.categories.includes('newsletter'))
  },
  computed: {
    showablePosts: function() {
      switch (this.sortBy) {
        case "A - Z":
          this.newsletters.sort(function(a, b) {
            let textA = a.title.toUpperCase();
            let textB = b.title.toUpperCase();
            return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
          });
          break;
        case "Z - A":
          this.newsletters.sort(function(a, b) {
            let textA = b.title.toUpperCase();
            let textB = a.title.toUpperCase();
            return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
          });
          break;
        case 'LATEST':
          this.newsletters.sort((a, b) => new Date(b.date) - new Date(a.date))
      }

      return this.newsletters;
    },

    paginatedPosts: function() {
      return this.showablePosts.slice((this.page * this.perPage) - this.perPage, this.perPage * this.page)
    },

    pages: function() {
      return Math.ceil(this.showablePosts.length / this.perPage)
    }
  }
}
</script>


<style scoped lang="scss">
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>