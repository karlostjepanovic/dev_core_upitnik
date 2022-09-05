<template>
    <div>
        <div class="title-section">
            <Link class="button blue ghost" :href="`/school/${this.school.id}/set-class`">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,7V11H5.83L9.41,7.41L8,6L2,12L8,18L9.41,16.58L5.83,13H21V7H19Z" />
                </svg>
                Odustani
            </Link>
        </div>
        <div class="wrap">
            <div class="title-section">
                <div class="title">Novi razredni odjel</div>
            </div>
            <form @submit.prevent="createSchoolClass">
                <div class="form-section">
                    <div class="form-control">
                        <label for="name" class="required">Naziv:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <input type="text"
                                   class="blue"
                                   :class="{'invalid' : formData.errors && formData.errors.name}"
                                   id="name"
                                   v-model="formData.name">
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.name">{{formData.errors.name}}</div>
                    </div>
                </div>
                <div class="form-section">
                    <button
                        type="submit"
                        class="blue">
                        Spremi razredni odjel
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import MainTemplate from "../../../Shared/MainTemplate.vue";

export default {
    name: "Create",
    layout: MainTemplate,
    data() {
        return {
            formData:  this.$inertia.form({
                name: null,
            })
        }
    },
    methods: {
        createSchoolClass() {
            this.formData.post(`/school/${this.school.id}/create`);
        }
    },
    props: {
        school: Object,
    },
}
</script>

<style scoped>

</style>
