<template>
  <div>
    <section class="border border-brand-grey-250 rounded relative sm:w-52">
      <div class="flex items-center justify-between px-8 py-6 cursor-pointer" @click="showDropdown = !showDropdown">
        <p class="uppercase text-brand-dark text-opacity-50 tracking-sm text-sm mr-4">Sort<span v-if="sortBy">: {{sortBy}}</span></p>
        <svg class="transform transition-fast" :class="{'-rotate-180':showDropdown, 'rotate-0':!showDropdown}" xmlns="http://www.w3.org/2000/svg" width="7.835" height="4.48" viewBox="0 0 7.835 4.48">
          <path id="Icon_ionic-ios-arrow-down" data-name="Icon ionic-ios-arrow-down" d="M10.106,14.376l2.962-2.965a.558.558,0,0,1,.791,0,.565.565,0,0,1,0,.793L10.5,15.563a.559.559,0,0,1-.772.016l-3.38-3.373a.56.56,0,0,1,.791-.793Z" transform="translate(-6.188 -11.246)" fill="#01182f" opacity="0.498"/>
        </svg>
      </div>

      <Transition>
      <div class="absolute z-20 top-20 left-0 right-0 grid py-4 rounded-md border-brand-grey bg-white shadow-dropdown"  v-if="showDropdown">
        <div class="flex items-center cursor-pointer px-8 py-2 hover:bg-brand-grey-100 transition-fast w-full" v-for="category in sortByItems" @click="sort(category)">
          <p class="text-brand-dark text-sm">{{ category }}</p>
        </div>
      </div>
      </Transition>
    </section>

    <section>

    </section>
  </div>
</template>

<script>

export default {
  data() {
    return {
      sortBy: '',
      sortByItems: [
          'A - Z',
          'Z - A',
          'LATEST'
      ],
      showDropdown: false,
    }
  },
  methods: {
    sort(sortBy) {
      this.sortBy = sortBy;
      this.$emit('sort', this.sortBy)
    },

    hide: function() {
      this.showDropdown = false
    }
  },
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