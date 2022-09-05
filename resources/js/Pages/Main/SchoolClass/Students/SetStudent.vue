<template>
    <MainTemplate>
        <div class="title-section">
            <div class="title">Odaberite učenika</div>
        </div>
        <div class="title-section">
            <Link class="button blue" :href="`/school/${this.school.id}/school-class/${this.schoolClass.id}/create`">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                </svg>
                Dodaj učenika
            </Link>
        </div>
        <div class="table-wrap" v-if="students.length">
            <table>
                <thead>
                    <tr>
                        <th>Ime i prezime</th>
                        <th>Korisničko ime</th>
                        <th>Adresa e-pošte</th>
                        <th>OIB</th>
                        <th>Provedeni testovi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="student in students" :key="student.id" class="hover">
                        <td>{{ student.firstname + ' ' + student.lastname }}</td>
                        <td>{{ student.username }}</td>
                        <td>{{ student.email }}</td>
                        <td>{{ student.oib }}</td>
                        <td>{{ student.my_done_questionnaires.length }}</td>
                        <td>
                            <div class="link" @click="setStudent(student.pivot.id)">Odaberi učenika</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="txt-bold" v-else>Trenutno ne postoji ni jedan učenik za odabir!</div>
    </MainTemplate>
</template>

<script>
import EditObject from "../../../../Shared/EditObject.vue";
import MainTemplate from "../../../../Shared/MainTemplate.vue";

export default {
    name: "SetStudent",
    components: {EditObject, MainTemplate},
    methods: {
        setStudent(id) {
            this.$inertia.post(`/school/${this.school.id}/school-class/${this.schoolClass.id}/set-student/${id}`);
        }
    },
    props: {
        school: Object,
        schoolClass: Object,
        students: Array
    }
}
</script>

<style scoped>

</style>
