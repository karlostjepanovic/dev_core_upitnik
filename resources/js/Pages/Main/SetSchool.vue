<template>
    <MainTemplate>
        <div class="title-section">
            <div class="title">Odaberite školu</div>
        </div>
        <div class="table-wrap" v-if="schools.length">
            <table>
                <thead>
                <tr>
                    <th>Škola</th>
                    <th>Adresa</th>
                    <th>Mjesto</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="school in schools" :key="school.id" class="hover">
                    <td>{{ school.name }}</td>
                    <td>{{ school.address }}</td>
                    <td>{{ school.place }}</td>
                    <td>
                        <div class="link" @click="setSchool(school.id)">Odaberi školu</div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="txt-bold" v-else>Trenutno ne postoji ni jedna škola za odabir!</div>
    </MainTemplate>
</template>

<script>
import MainTemplate from "../../Shared/MainTemplate.vue";
export default {
    name: "SetSchool",
    components: {MainTemplate},
    methods: {
        setSchool(id) {
            this.$inertia.post(`/set-school/${id}`);
        }
    },
    props: {
        schools: Array
    }
}
</script>

<style scoped>

</style>
