<template>
    <MainTemplate>
        <div class="title-section">
            <div class="title">Odaberite razredni odjel</div>
        </div>
        <div class="title-section">
            <Link class="button blue" :href="`/school/${this.school.id}/create`">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                </svg>
                Dodaj razredni odjel
            </Link>
        </div>
        <div class="table-wrap" v-if="schoolClasses.length">
            <table>
                <thead>
                    <tr>
                        <th>Razred</th>
                        <th>Broj učenika</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="schoolClass in schoolClasses" :key="schoolClass.id" class="hover">
                        <td>{{ schoolClass.name }}</td>
                        <td>0</td>
                        <td>
                            <div class="link" @click="setSchoolClass(schoolClass.id)">Odaberi razred</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="txt-bold" v-else>Trenutno ne postoji ni jedan razredni odjel za odabir!</div>
    </MainTemplate>
</template>

<script>
import MainTemplate from "../../Shared/MainTemplate.vue";
import EditObject from "../../Shared/EditObject.vue";

export default {
    name: "SetSchool",
    components: {EditObject, MainTemplate},
    methods: {
        setSchoolClass(id) {
            this.$inertia.post(`/school/${this.school.id}/set-class/${id}`);
        }
    },
    props: {
        school: Object,
        schoolClasses: Array
    }
}
</script>

<style scoped>

</style>
