<?php
// Primitive Form Submission utilizing Alpine.js. Success and error slots accept
// HTML. Form is a unique identifier for the form. Form can be the Bind
// form id or it can be a Hubspot (v2) form submission endpoint.
?>

@props([
    'success' => null,
    'error' => null,
    'form'
])

<div x-data="contactForm()">
    <div x-show="success" x-cloak>{{$success}}</div>
    <div x-show="error" x-cloak>{{$error}}</div>

    <form method="post" id="contact-form" x-ref="contactForm" x-on:submit.prevent='send()'>
        <input type="hidden" name="form" value="{{$form}}" />

        <input autocomplete="disabled" type="text" name="primitive_bot_check" style="position:absolute;opacity:0;z-index:-9;left:-9999px"/>

        <div x-show="!success && !loading">{{$slot}}</div>

        <div
            x-show="loading"
            class="primitive-loading" x-cloak>
            Sending...
        </div>
    </form>
</div>

@push('scripts')
<script>
    const VIEW = `https://myprimitive.cloud/api/forms/view`
    const ENDPOINT = 'https://myprimitive.cloud/api/forms/store'
    axios.post(VIEW, { form: '{{$form}}' });

    function contactForm() {
        return {
            fields: {},
            success: false,
            error: false,
            loading: false,
            hubspotEndpoint: '',
            form: '{{$form}}',

            send() {
                this.success = false
                this.error = false
                this.loading = true

                let form =  this.$refs.contactForm
                let data = new FormData(form)
                let inputs = form.elements
                let fields = {}

                let hubspotData = "";

                for (var i = 0; i < inputs.length; i++) {
                    if (inputs[i].type !== "hidden" && inputs[i].name !== "") {
                        if (inputs[i].type === "checkbox" || inputs[i].type === "radio") {
                            if(inputs[i].checked) {
                                fields[inputs[i].name] ? fields[inputs[i].name] += ',' + inputs[i].value : fields[inputs[i].name] = inputs[i].value
                            }
                        } else {
                            fields[inputs[i].name] = inputs[i].value
                            if(i  > 1) {
                                hubspotData = this.hubspotData + "&" + inputs[i].name + "=" + inputs[i].value;
                            }
                        }
                    }
                }

                data.append('fields', JSON.stringify(fields))

                if(!this.form.includes('hubspot')) {
                    console.log('here')
                    axios.post(ENDPOINT, data)
                        .then(response => {
                            this.success = true
                            this.loading = false
                        })
                        .catch(error => {
                            this.error = true
                            this.loading = false
                        });
                } else {
                    this.hubspotEndpoint = this.form
                    axios.post(this.hubspotEndpoint, hubspotData)
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

    }
</script>
@endpush