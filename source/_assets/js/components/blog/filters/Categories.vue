<template>
  <div>
    <div class="border border-brand-grey-250 rounded relative sm:w-52">

      <div class="flex items-center justify-between px-8 py-6 cursor-pointer" @click="showDropdown = !showDropdown">
        <p class="uppercase text-brand-dark text-opacity-50 tracking-sm text-sm mr-4">Categories</p>
        <svg class="transform transition-fast" :class="{'-rotate-180':showDropdown, 'rotate-0':!showDropdown}" xmlns="http://www.w3.org/2000/svg" width="7.835" height="4.48" viewBox="0 0 7.835 4.48">
          <path id="Icon_ionic-ios-arrow-down" data-name="Icon ionic-ios-arrow-down" d="M10.106,14.376l2.962-2.965a.558.558,0,0,1,.791,0,.565.565,0,0,1,0,.793L10.5,15.563a.559.559,0,0,1-.772.016l-3.38-3.373a.56.56,0,0,1,.791-.793Z" transform="translate(-6.188 -11.246)" fill="#01182f" opacity="0.498"/>
        </svg>
      </div>

      <Transition>
      <div class="absolute z-20 top-20 left-0 right-0 grid gap-2 px-8 py-4 rounded-md border-brand-grey bg-white shadow-dropdown" v-if="showDropdown">
        <div class="flex items-center cursor-pointer" v-for="category in categories" @click="handleClick(category)">
          <div class="w-4 h-4 rounded border mr-4 transition-fast grid place-content-center" :class="{'border-brand-dark':activeCategories.includes(category), 'border-brand-grey-250':!activeCategories.includes(category)}">
            <svg :class="{'opacity-100':activeCategories.includes(category), 'opacity-0':!activeCategories.includes(category)}" class="transition-fast" xmlns="http://www.w3.org/2000/svg" width="4.928" height="3.675" viewBox="0 0 4.928 3.675">
              <path id="Icon_awesome-check" data-name="Icon awesome-check" d="M1.674,8.18l-1.6-1.6a.246.246,0,0,1,0-.348l.348-.348a.246.246,0,0,1,.348,0L1.848,6.96,4.159,4.649a.246.246,0,0,1,.348,0L4.856,5a.246.246,0,0,1,0,.348L2.022,8.18A.246.246,0,0,1,1.674,8.18Z" transform="translate(0 -4.577)" fill="#01182f"/>
            </svg>
          </div>
          <p class="text-brand-dark text-sm capitalize">{{ category.replaceAll('-', ' ') }}</p>
        </div>
      </div>
      </Transition>

    </div>
  </div>
</template>

<script>

export default {

  props: {
    categories: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      activeCategories: [],
      showDropdown: false,
    }
  },
  methods: {
    handleClick(category) {
      if (!this.activeCategories.includes(category)) {
        this.activeCategories.push(category)
      } else {
        let indexOfCategory = this.activeCategories.indexOf(category);
        if (indexOfCategory !== -1) {
          this.activeCategories.splice(indexOfCategory, 1);
        }
      }

      this.$emit('category-clicked', this.activeCategories);
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