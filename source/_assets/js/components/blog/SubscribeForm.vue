<template>
  <div>
    <slot name="success" v-if="success"></slot>
    <slot name="error" v-if="error"></slot>

    <form method="post" id="contact-form" ref="contactForm" @submit.prevent="send()">
      <input type="hidden" name="form" :value="form" />
      <input autocomplete="disabled" type="text" name="primitive_bot_check" style="position:absolute;opacity:0;z-index:-9;left:-9999px"/>
      <div>
        <div class="grid form-container overflow-hidden transition-fast" :class="{'success':success}">
          <div v-if="!success">
            <label for="email" class="text-brand-dark text-xs tracking-sm uppercase pb-2">Email address</label>
            <div class="relative grid">
              <input class="border border-brand-grey-250 h-12 rounded-5 px-2" type="email" id="email" name="email" required>
              <div class="absolute right-4 top-0 bottom-0 grid place-items-center">
                  <button v-if="!loading && !success" aria-label="submit" class="">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M262.62 336L342 256l-79.38-80M330.97 256H170"/><path d="M256 448c106 0 192-86 192-192S362 64 256 64 64 150 64 256s86 192 192 192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                  </button>
                  <div v-else-if="loading">
                    <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin h-6 w-6" viewBox="0 0 512 512"><path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path d="M341.54 197.85l-11.37-13.23a103.37 103.37 0 1022.71 105.84" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/><path d="M367.32 162a8.44 8.44 0 00-6 2.54l-59.54 59.54a8.61 8.61 0 006.09 14.71h59.54a8.62 8.62 0 008.62-8.62v-59.56a8.61 8.61 0 00-8.68-8.63z"/></svg>
                  </div>
              </div>
            </div>
          </div>

          <Transition>
          <div class="success-message" v-if="success">
            <div class="svg-placeholder">
              <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="52.644" height="52.644" viewBox="0 0 52.644 52.644">
                <path id="Icon_awesome-check-circle" data-name="Icon awesome-check-circle" d="M53.206,26.884A26.322,26.322,0,1,1,26.884.563,26.322,26.322,0,0,1,53.206,26.884ZM23.84,40.821,43.369,21.292a1.7,1.7,0,0,0,0-2.4l-2.4-2.4a1.7,1.7,0,0,0-2.4,0L22.639,32.416,15.2,24.98a1.7,1.7,0,0,0-2.4,0l-2.4,2.4a1.7,1.7,0,0,0,0,2.4L21.438,40.821a1.7,1.7,0,0,0,2.4,0Z" transform="translate(-0.563 -0.563)" fill="#389d26"/>
              </svg>
            </div>
            <div class="text">
              <p class="title">Thank You!</p>
              <p class="text">YOU HAVE BEEN SUCCESSFULLY SUBSCRIBED</p>
            </div>
          </div>
          </Transition>
        </div>
      </div>
    </form>
  </div>
</template>

<script>

const ENDPOINT = `https://myprimitive.cloud/api/forms/store`
//const ENDPOINT = `http://cms-api.test/api/forms/store`
const VIEW = `https://myprimitive.cloud/api/forms/view`

export default {
  props: {
    form: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      fields: {},
      success: false,
      error: false,
      loading: false
    }
  },
  mounted() {
    axios.post(VIEW, { form: this.form })
  },
  methods: {
    send() {

      this.loading = true
      this.success = false
      this.error = false

      let form = this.$refs.contactForm
      let data = new FormData(form)
      let inputs = form.elements
      let fields = {}

      for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].type !== "hidden" && inputs[i].name !== "") {
          if (inputs[i].type === "checkbox" || inputs[i].type === "radio") {
            if(inputs[i].checked) {
              fields[inputs[i].name] ? fields[inputs[i].name] += ',' + inputs[i].value : fields[inputs[i].name] = inputs[i].value
            }
          } else {
            fields[inputs[i].name] = inputs[i].value
          }
        }
      }

      data.append('fields', JSON.stringify(fields))

      axios.post(ENDPOINT, data)
          .then(response => {
            this.success = true
            this.loading = false
          })
          .catch(error => {
            this.error = true
            this.loading = false
          });

    }
  }
}
</script>

<style scoped lang="scss">
.form-container {
  border: 1px solid rgba(0,0,0,0);
  border-radius: 5px;
  padding: 1rem 2.25rem;
}

.success {
  border: 1px solid #389D26;
}

.success-message {
  display: flex;
  align-items: center;
  .svg-placeholder {
    width: 52px;
    height: 52px;
    margin-right: 20px;
  }
  .title, .text {
    color: #389D26;
  }
  .title {
    font-weight: bold;
    font-size: 18px;
  }
  .text {
    font-size: 12px;
    letter-spacing: 2.4px;
  }
}

.v-enter-active,
.v-leave-active {
  transition: 1s ease;
  transform: translateY(50px);
}

.v-enter-to,
.v-leave-from {
  opacity: 1;
  transform: translateY(0);
}
</style>