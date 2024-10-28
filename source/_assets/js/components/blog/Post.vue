

<template>
  <a :href="'/news/'+post.filename+'/'" class="hover:shadow-post transition-fast pt-3 pb-6 px-3 cursor-pointer transform hover:-translate-y-1">
    <div class="w-full overflow-hidden rounded-lg aspect-video">
      <img v-if="post.cover_image !== ''" :src="post.cover_image" :alt="post.title" class="w-full h-full object-center object-cover group-hover:opacity-75 transition">
      <img v-else src="/assets/img/post-cover-image-1.png" :alt="post.title" class="w-full h-full object-center object-cover group-hover:opacity-75 transition">
    </div>
    <div v-if="!hideCategories" class="flex items-center">
      <p class="text-xs uppercase tracking-md mb-1 pt-4 text-brand-dark text-opacity-50 mr-2" v-for="category in post.categories">{{ category }}</p>
    </div>
    <p class="text-brand-dark text-xl font-bold pb-1" :class="{'pt-3':hideCategories}">{{ post.title }}</p>
    <p class="text-brand-grey line-clamp-3">{{ post.content.replace(/[^\w\s]/gi, '').replaceAll('ltpgt', '') }}</p>
  </a>
</template>

<script>

export default {
  props: {
    post: {
      type: Object,
      required: true,
    },
    hideCategories: {
      type: Boolean
    }
  },
  data() {
    return {
    }
  },
}
</script>
