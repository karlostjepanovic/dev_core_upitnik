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
        <div class="wrap section">
            <div class="title-section">
                <div class="title">{{ this.schoolClass.name }}</div>
            </div>
            <form @submit.prevent="updateSchoolClass">
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
                        Spremi promjene
                    </button>
                </div>
            </form>
        </div>
        <div class="wrap">
            <div class="title-section">
                <div class="subtitle">Brisanje razrednog odjela</div>
            </div>
            <div class="section">
                <p>Želite li obrisati razredni odjel? Brisanje je moguće jedino ako za taj razred ne postoje vezani podatci.</p>
            </div>
            <button type="button" class="button red ghost" @click="deleteSchoolClass">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" />
                </svg>
                Obriši razredni odjel
            </button>
        </div>
    </div>
</template>

<script>
import MainTemplate from "../../../Shared/MainTemplate.vue";

export default {
    name: "Show",
    layout: MainTemplate,
    data() {
        return {
            formData:  this.$inertia.form({
                name: this.schoolClass.name,
            })
        }
    },
    methods: {
        updateSchoolClass() {
            this.formData.post(`/school/${this.school.id}/set-class/${this.schoolClass.id}/update`);
        },
        deleteSchoolClass() {
            this.formData.post(`/school/${this.school.id}/set-class/${this.schoolClass.id}/destroy`);
        }
    },
    props: {
        school: Object,
        schoolClass: Object
    },
}
</script>

<style scoped>

</style>
