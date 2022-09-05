<template>
    <MainTemplate>
        <StudentDetailsComponent/>
        <div class="title-section">
            <Link class="button blue" :href="`/school/${this.school.id}/school-class/${this.schoolClass.id}/student/${this.student.id}/add-questionnaire`">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                </svg>
                Dodaj upitnik
            </Link>
        </div>
        <div class="table-wrap" v-if="studentQuestionnaires.length">
            <table>
                <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Vrsta</th>
                        <th>Bodovi</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="studentQuestionnaire in studentQuestionnaires" :key="studentQuestionnaire.id" class="hover">
                        <td>{{ studentQuestionnaire.questionnaire.name }}</td>
                        <td>{{ studentQuestionnaire.questionnaire.type }}</td>
                        <td>0</td>
                        <td>
                            <div class="link" @click="setStudentQuestionnaire(studentQuestionnaire.id)">Pregledaj</div>
                        </td>
                        <td>
                            <EditObject :id="studentQuestionnaire.id" path="show"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="txt-bold" v-else>Trenutno ne postoji ni jedan upitnik za prikaz!</div>
    </MainTemplate>
</template>

<script>
import MainTemplate from "@/Shared/MainTemplate.vue";
import StudentDetailsComponent from "@/Shared/StudentDetailsComponent.vue";
import EditObject from "@/Shared/EditObject.vue";
export default {
    name: "Show",
    components: {EditObject, StudentDetailsComponent, MainTemplate},
    methods: {
        setStudentQuestionnaire(id) {
            this.$inertia.post(`/school/${this.school.id}/school-class/${this.schoolClass.id}/student/${this.student.id}/set-questionnaire/${id}`);
        }
    },
    props: {
        school: Object,
        schoolClass: Object,
        student: Object,
        studentQuestionnaires: Array
    }
}
</script>

<style scoped>

</style>
