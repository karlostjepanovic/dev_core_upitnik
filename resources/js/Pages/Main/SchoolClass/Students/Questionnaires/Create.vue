<template>
    <MainTemplate>
        <StudentDetailsComponent/>
        <div class="title-section">
            <Link class="button blue ghost" :href="`/school/${this.school.id}/school-class/${this.schoolClass.id}/student/${this.student.id}/show`">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,7V11H5.83L9.41,7.41L8,6L2,12L8,18L9.41,16.58L5.83,13H21V7H19Z" />
                </svg>
                Odustani
            </Link>
        </div>
        <div class="wrap">
            <div class="title-section">
                <div class="title">Dodaj upitnik</div>
            </div>
            <form @submit.prevent="addQuestionnaire">
                <div class="form-section">
                    <div class="form-control">
                        <label for="questionnaire" class="required">Upitnik:</label>
                    </div>
                    <div class="form-control">
                        <div class="field">
                            <select
                                class="input blue"
                                :class="{'invalid' : formData.errors && formData.errors.questionnaire}"
                                id="questionnaire"
                                v-model="formData.questionnaire">
                                <option value="null">--- odaberite upitnik ---</option>
                                <option v-for="questionnaire in questionnaires" :value="questionnaire.id">{{ questionnaire.name + '  - ' + questionnaire.type + ' (' +questionnaire.target_group_value + ')'}}</option>
                            </select>
                        </div>
                        <div class="error" v-if="formData.errors && formData.errors.questionnaire">{{formData.errors.questionnaire}}</div>
                    </div>
                </div>
                <div class="form-section">
                    <button
                        type="submit"
                        class="blue">
                        Dodaj
                    </button>
                </div>
            </form>
        </div>
    </MainTemplate>
</template>

<script>
import MainTemplate from "@/Shared/MainTemplate.vue";
import StudentDetailsComponent from "@/Shared/StudentDetailsComponent.vue";
export default {
    name: "Create",
    components: {StudentDetailsComponent, MainTemplate},
    data() {
        return {
            formData: this.$inertia.form({
                questionnaire: null,
            }),
        }
    },
    methods: {
        addQuestionnaire() {
            this.formData.post(`/school/${this.school.id}/school-class/${this.schoolClass.id}/student/${this.student.id}/add-questionnaire`);
        }
    },
    props: {
        school: Object,
        schoolClass: Object,
        student: Object,
        questionnaires: Array,
    }

}
</script>

<style scoped>

</style>
